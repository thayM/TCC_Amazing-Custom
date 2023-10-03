<?php
require '../../../lib/conn.php';

extract($_POST);

// $sqlSelect = "SELECT cod_cli FROM CLIENTE WHERE cod_cli = :cod_cli";
// $client = $conn->prepare($sqlSelect);
// $client->bindValue(":cod_cli", $cliente);
// $client->execute();
$produtos = json_decode($_GET["produtos"]);
foreach ($produtos as $key => $value) {

    $sqlSelect = "SELECT * FROM produto WHERE fkcod_frag = :codFrag AND fkcod_modelo = :codModelo";
    $produto = $conn->prepare($sqlSelect);
    $produto->bindValue(":codModelo",$value[0]);
    $produto->bindValue(":codFrag",$value[1]);
    $produto->execute();
    var_dump($produto->rowCount());
    if($produto->rowCount()==0){
        $sqlInsert = "INSERT INTO produto VALUES(0, :codFrag, :codModelo)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bindValue(":codModelo",$value[0]);
        $stmt->bindValue(":codFrag",$value[1]);
        $stmt->execute();
        $produto->execute();
    }
}

$sqlInsert = "INSERT INTO PEDIDO VALUES(0, :cliente,:rastreamento, :frete, :valor, :data_ped, 100, :estado_pedido)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":cliente", $cliente);
$stmt->bindValue(":rastreamento", $codRastreamento);
$stmt->bindValue(":frete", $frete);
$stmt->bindValue(":valor", $valor);
$stmt->bindValue(":data_ped", $data_ped);
$stmt->bindValue(":estado_pedido", $estado_pedido);
$stmt->execute();
var_dump($stmt); 

var_dump($_POST);
?>
<!-- <meta http-equiv="refresh" content="0; url=../cadPedido.php"> -->