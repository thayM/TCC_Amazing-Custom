<?php
require '../../../../lib/conn.php';

$sqlDelete = "DELETE FROM PEDIDO WHERE cod_ped = :cod_ped";
$stmt = $conn->prepare($sqlDelete);
$stmt->bindValue(":cod_ped", $cod_ped);
$stmt->execute();

?>