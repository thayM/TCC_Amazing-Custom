<?php
require '../../../../lib/conn.php';
$id = $_GET['id'];  

$sqlDelete = "DELETE FROM pedido WHERE cod_ped = :id";
$stmt = $conn->prepare($sqlDelete);
$stmt->bindValue(":id", $id);
$stmt->execute();

?>