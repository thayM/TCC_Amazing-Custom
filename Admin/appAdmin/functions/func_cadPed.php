<?php
require '../../../lib/conn.php';

extract($_POST);

// $sqlSelect = "SELECT cod_cli FROM CLIENTE WHERE cod_cli = :cod_cli";
// $client = $conn->prepare($sqlSelect);
// $client->bindValue(":cod_cli", $cliente);
// $client->execute();

// $sqlClientes = $conn->query("SELECT * FROM CLIENTE");
// $clientes = $sqlClientes->fetchAll(PDO::FETCH_OBJ);
// var_dump($client);
// do{
//     $alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
//     $codRastreamento ="AC";
//     $codRastreamento .= str_pad(rand(0,99999), 5, "0", STR_PAD_LEFT);
//     $codRastreamento .= $alfabeto[rand(0,25)] . $alfabeto[rand(0,25)];

//     $sqlSelect = "SELECT * FROM PEDIDO WHERE cod_rastreamento = " . $codRastreamento;
//     $pedido = $conn->query($sqlSelect);
// }while($pedido);

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