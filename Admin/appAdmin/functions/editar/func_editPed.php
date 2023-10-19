<?php

require '../../../../lib/conn.php';
extract($_POST);
$id = $_GET['id'];

$sqlSelect = "SELECT cod_cli FROM cliente WHERE nome = :nome";
$sqlCliente = $conn->prepare($sqlSelect);
$sqlCliente->bindValue(":nome", $cliente); 
$sqlCliente->execute();
$codCliente = $sqlCliente->fetch(PDO::FETCH_OBJ);
$codCliente = $codCliente->cod_cli;

// $sqlSelectPedPro = "SELECT fkcod_prod FROM pedido_produto WHERE fkcod_ped = :id";
// $sqlPedido_produto = $conn->prepare($sqlSelectPedPro);
// $sqlPedido_produto->bindValue(":id", $id); 
// $sqlPedido_produto->execute();
// $codPedido_produto = $sqlPedido_produto->fetch(PDO::FETCH_OBJ);
// $codPedido_produto = $codPedido_produto->fkcod_prod;

// $sqlSelectFrag = "SELECT fkcod_frag FROM produto WHERE cod_prod = :id";
// $sqlFrag = $conn->prepare($sqlSelectFrag);
// $sqlFrag->bindValue(":id", $id); 
// $sqlFrag->execute();
// $codFrag = $sqlFrag->fetch(PDO::FETCH_OBJ);
// $codFrag = $codFrag->fkcod_frag;

// $sqlSelectModelo = "SELECT fkcod_modelo FROM produto WHERE cod_prod = :id";
// $sqlModelo = $conn->prepare($sqlSelectModelo);
// $sqlModelo->bindValue(":id", $id); 
// $sqlModelo->execute();
// $codModelo = $sqlModelo->fetch(PDO::FETCH_OBJ);
// $codModelo = $codModelo->fkcod_modelo;


var_dump($_POST);

$sqlUpdate = "UPDATE PEDIDO SET fkcod_cli = :cliente, frete = :frete, valor = :valor, data_ped = :data_ped, valor_total = :valor_total, estado_pedido = :status WHERE cod_ped = :id";
$stmt = $conn->prepare($sqlUpdate);
$stmt->bindValue(":cliente", $codCliente);
$stmt->bindValue(":frete", $frete);
$stmt->bindValue(":valor", $valor);
$stmt->bindValue(":data_ped", $data_ped);
$stmt->bindValue(":valor_total", $valor+$frete);
$stmt->bindValue(":status", $status);
$stmt->bindValue(":id", $id);
$stmt->execute();


// UPDATE FRAG E MODELO
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