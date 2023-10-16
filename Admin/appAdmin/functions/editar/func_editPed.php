<?php

require '../../../../lib/conn.php';

$sqlUpdate = "UPDATE PEDIDO SET fkcod_cli = :cliente, frete = :frete, valor = :valor, data_ped = :CURDATE(), valor_total = :valor_total, estado_pedido = :estado_pedido WHERE cod_ped = :cod_ped";
$stmt = $conn->prepare($sqlUpdate);
$stmt->bindValue(":cliente", $cliente);
$stmt->bindValue(":frete", $frete);
$stmt->bindValue(":valor", $valor);
$stmt->bindValue(":valor_total", $valor+$frete);
$stmt->bindValue(":estado_pedido",$estado_pedido);
$stmt->execute();
?>