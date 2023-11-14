<?php
require '../../../../lib/conn.php';
$id_produto = $_GET['id'];

$sqlProd = "DELETE FROM pedido_produto WHERE fkcod_prod = :cod";
$smtmProd = $conn->prepare($sqlProd);
$smtmProd->bindValue(":cod", $id_produto);
$smtmProd->execute();
?>

<meta http-equiv="refresh" content="0; url=../../editPedido.php">