<?php
require '../../../../lib/conn.php';
$id = $_GET['id'];  
extract($_POST);

$sqlUpdade = "UPDATE pedido SET estado_pedido = :status WHERE cod_ped = :id";
$stmt = $conn->prepare($sqlUpdade);
$stmt->bindValue(":status", $status);
$stmt->bindValue(":id", $id);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../../home.php">