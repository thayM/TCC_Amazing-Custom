<?php
require '../../../../lib/conn.php';
extract($_POST);

$produtos = json_decode($_GET["produtos"]);
$id_pedido = $produtos[0][3];

$tamanhoArray= count($produtos);
$sqlSelect = "SELECT cod_cli FROM cliente WHERE nome = :nome";
$sqlCliente = $conn->prepare($sqlSelect);
$sqlCliente->bindValue(":nome", $cliente); 
$sqlCliente->execute();
$codCliente = $sqlCliente->fetch(PDO::FETCH_OBJ);
$codCliente = $codCliente->cod_cli;

$sqlUpdate = "UPDATE pedido SET fkcod_cli = :cliente, frete = :frete, valor = :valor, data_ped = :data_ped, valor_total = :valor_total, estado_pedido = :status WHERE cod_ped = :id";
$stmtClie = $conn->prepare($sqlUpdate);
$stmtClie->bindValue(":cliente", $codCliente);
$stmtClie->bindValue(":frete", $frete);
$stmtClie->bindValue(":valor", $valor);
$stmtClie->bindValue(":data_ped", $data_ped);
$stmtClie->bindValue(":valor_total", $valor+$frete);
$stmtClie->bindValue(":status", $status);
$stmtClie->bindValue(":id", $id_pedido);
$stmtClie->execute();

$sqlProdutoID = "SELECT fkcod_prod FROM pedido_produto WHERE fkcod_ped = :pedido_id";
$stmtProdutoID = $conn->prepare($sqlProdutoID);
$stmtProdutoID->bindValue(":pedido_id", $id_pedido);
$stmtProdutoID->execute();
$produto_ids = $stmtProdutoID->fetchAll(PDO::FETCH_OBJ);
$posicao = 0;

$sqlLinhas = "SELECT * FROM pedido_produto WHERE fkcod_ped = :id";
$stmtLinhas = $conn->prepare($sqlLinhas);
$stmtLinhas->bindValue(":id", $id_pedido);
$stmtLinhas->execute();
$qtdLinhas = $stmtLinhas->fetchAll(PDO::FETCH_OBJ);

while ($posicao <= count($qtdLinhas)-1) {
    $sqlModelo = "SELECT cod_modelo FROM modelo WHERE nome_modelo = :modelo";
    $stmtModelo = $conn->prepare($sqlModelo);
    $stmtModelo->bindValue(":modelo", $produtos[$posicao][0]);
    $stmtModelo->execute();
    $codModelo = $stmtModelo->fetch(PDO::FETCH_OBJ);
    
    $sqlFragrancia = "SELECT cod_frag FROM fragrancia WHERE nome_frag = :fragrancia";
    $stmtFragrancia = $conn->prepare($sqlFragrancia);
    $stmtFragrancia->bindValue(":fragrancia",  $produtos[$posicao][1]);
    $stmtFragrancia->execute();
    $codFragrancia = $stmtFragrancia->fetch(PDO::FETCH_OBJ);
    
    $sqlSelect = "SELECT * FROM produto WHERE fkcod_frag = :codFrag AND fkcod_modelo = :codModelo";
    $produto = $conn->prepare($sqlSelect);
    $produto->bindValue(":codModelo",$codModelo->cod_modelo);
    $produto->bindValue(":codFrag",$codFragrancia->cod_frag);
    $produto->execute();
    
    if($produto->rowCount()==0){
        $sqlInsert = "INSERT INTO produto VALUES(0, :codFrag, :codModelo)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bindValue(":codModelo",$codModelo->cod_modelo);
        $stmt->bindValue(":codFrag",$codFragrancia->cod_frag);
        $stmt->execute();
        $produto->execute();
    }
    $codProd = $produto->fetch(PDO::FETCH_OBJ);
    $codProd = $codProd->cod_prod;

    $sqlUpdateQuantidade = "UPDATE pedido_produto SET qtd_prod = :quantidade, fkcod_prod = :produto_id where fkcod_ped = :cod_pedido AND fkcod_prod = :cod_prod";
    $stmtUpdateQuantidade = $conn->prepare($sqlUpdateQuantidade);
    $stmtUpdateQuantidade->bindValue(":quantidade",$produtos[$posicao][2]);
    $stmtUpdateQuantidade->bindValue(":cod_pedido", $id_pedido);
    $stmtUpdateQuantidade->bindValue(":produto_id", $codProd);
    $stmtUpdateQuantidade->bindValue(":cod_prod", $qtdLinhas[$posicao]->fkcod_prod);
    $stmtUpdateQuantidade->execute();
    $posicao++;
}

$a = $posicao;
while ($a <= $tamanhoArray-1) {
        $sqlModelo = "SELECT cod_modelo FROM modelo WHERE nome_modelo = :modelo";
        $stmtModelo = $conn->prepare($sqlModelo);
        $stmtModelo->bindValue(":modelo", $produtos[$a][0]);
        $stmtModelo->execute();
        $codModelo = $stmtModelo->fetch(PDO::FETCH_OBJ);
        $codModelo = $codModelo->cod_modelo;

        $sqlFragrancia = "SELECT cod_frag FROM fragrancia WHERE nome_frag = :fragrancia";
        $stmtFragrancia = $conn->prepare($sqlFragrancia);
        $stmtFragrancia->bindValue(":fragrancia",  $produtos[$a][1]);
        $stmtFragrancia->execute();
        $codFragrancia = $stmtFragrancia->fetch(PDO::FETCH_OBJ);
        $codFragrancia = $codFragrancia->cod_frag;

        $sqlSelect = "SELECT * FROM produto WHERE fkcod_frag = :codFrag AND fkcod_modelo = :codModelo";
        $produto = $conn->prepare($sqlSelect);
        $produto->bindValue(":codModelo",$codModelo);
        $produto->bindValue(":codFrag",$codFragrancia);
        $produto->execute();
        if($produto->rowCount()==0){
            $sqlInsert = "INSERT INTO produto VALUES(0, :codFrag, :codModelo)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bindValue(":codModelo",$codModelo);
            $stmt->bindValue(":codFrag",$codFragrancia);
            $stmt->execute();
            $produto->execute();
        }
        $codProd = $produto->fetch(PDO::FETCH_OBJ);
        $codProd = $codProd->cod_prod;

        $sqlSelect = "SELECT * FROM modelo WHERE cod_modelo = :cod_modelo";
        $modelo = $conn->prepare($sqlSelect);
        $modelo->bindValue(":cod_modelo", $codModelo);
        $modelo->execute();
        $valor = $modelo->fetch(PDO::FETCH_OBJ);
        $valor = $valor->valor_modelo;

        $sqlInsert = "INSERT INTO pedido_produto VALUES(:cod_ped, :cod_prod, :sub_total, :qtd_prod)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bindValue(":cod_ped", $id_pedido);
        $stmt->bindValue(":cod_prod", $codProd);
        $stmt->bindValue(":sub_total", ($produtos[$a][2]*$valor));
        $stmt->bindValue(":qtd_prod", $produtos[$a][2]);
        $stmt->execute();
        $a++;
}
?>
<meta http-equiv="refresh" content="0; url=../../home.php">