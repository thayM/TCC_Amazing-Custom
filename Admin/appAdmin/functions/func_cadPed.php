<?php
require '../../../lib/conn.php';
extract($_POST);

$sqlSelect = "SELECT * FROM cliente WHERE nome = :nome";
$sqlCliente = $conn->prepare($sqlSelect);
$sqlCliente->bindValue(":nome", $cliente); 
$sqlCliente->execute();
$codCliente = $sqlCliente->fetch(PDO::FETCH_OBJ);
$codCliente = $codCliente->cod_cli;


$sqlInsert = "INSERT INTO PEDIDO VALUES(0, :cliente, :frete, :valor, CURDATE(), :valor_total, :estado_pedido)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":cliente", $codCliente);
$stmt->bindValue(":frete", $frete);
$stmt->bindValue(":valor", $valor);
$stmt->bindValue(":valor_total", $valor+$frete);
$stmt->bindValue(":estado_pedido", $estado_pedido);
$stmt->execute();

$codPed = $conn->lastInsertId();

$produtos = json_decode($_GET["produtos"]);

foreach ($produtos as $key => $value) {

    $sqlSelect = "SELECT * FROM modelo WHERE nome_modelo = :modelo";
    $modelo = $conn->prepare($sqlSelect);
    $modelo->bindValue(":modelo", $value[0]);
    $modelo->execute();
    $codModelo = $modelo->fetch(PDO::FETCH_OBJ);
    $codModelo = $codModelo->cod_modelo;

    $sqlSelect = "SELECT * FROM fragrancia WHERE nome_frag = :frag";
    $fragrancia = $conn->prepare($sqlSelect);
    $fragrancia->bindValue(":frag", $value[1]);
    $fragrancia->execute();
    $codFragrancia = $fragrancia->fetch(PDO::FETCH_OBJ);
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
    $stmt->bindValue(":cod_ped", $codPed);
    $stmt->bindValue(":cod_prod", $codProd);
    $stmt->bindValue(":sub_total", ($value[2]*$valor));
    $stmt->bindValue(":qtd_prod", $value[2]);
    $stmt->execute();
}
?>
<meta http-equiv="refresh" content="0; url=../home.php">