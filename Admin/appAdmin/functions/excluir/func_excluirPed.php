<?php
require '../../../../lib/conn.php';
$id = $_GET['id'];  

$sqlDelete = "DELETE FROM pedido WHERE cod_ped = :id";
$stmt = $conn->prepare($sqlDelete);
$stmt->bindValue(":id", $id);
$stmt->execute();

$sqlSelectPedPro = "SELECT fkcod_prod FROM pedido_produto WHERE fkcod_ped = :id";
$sqlPedido_produto = $conn->prepare($sqlSelectPedPro);
$sqlPedido_produto->bindValue(":id", $id); 
$sqlPedido_produto->execute();
$codProd = $sqlPedido_produto->fetch(PDO::FETCH_OBJ);
$codProd = $codProd->fkcod_prod;

$sqlDeletePP = "DELETE FROM pedido_produto WHERE fkcod_ped = :id";
$stmt = $conn->prepare($sqlDeletePP);
$stmt->bindValue(":id", $id);
$stmt->execute();

?>
<meta http-equiv="refresh" content="0; url=../../home.php">