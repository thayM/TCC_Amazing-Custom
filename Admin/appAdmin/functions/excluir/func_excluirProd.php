<?php
require '../../../../lib/conn.php';
$id_produto = $_GET['idProd'];
$id_pedido = $_GET['idPed'];
$valor = $_GET['valor'];

$sqlProd = "DELETE FROM pedido_produto WHERE fkcod_prod = :cod";
$smtmProd = $conn->prepare($sqlProd);
$smtmProd->bindValue(":cod", $id_produto);
$smtmProd->execute();

$sqlUpdate = "UPDATE pedido SET valor = :valor WHERE cod_ped = :id";
$stmtClie = $conn->prepare($sqlUpdate);
$stmtClie->bindValue(":valor", $valor);
$stmtClie->bindValue(":id", $id_pedido);
$stmtClie->execute();
?>

<meta http-equiv="refresh" content="0; url=../../editPedido.php?id=<?=$id_pedido?>">