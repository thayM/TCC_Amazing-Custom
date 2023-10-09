<?php
require "../../../../lib/conn.php";
$id = $_GET['id'];  
echo $id;
$sqlSelect = "SELECT nomeArq_modelo FROM modelo WHERE cod_modelo = :id";
$stmt = $conn->prepare($sqlSelect);
$stmt->bindValue(":id", $id);
$stmt->execute();
$nomeArq = $stmt->fetch(PDO::FETCH_OBJ);
echo $nomeArq->nomeArq_modelo;
$enderecoArq ="../../../../upload/".$nomeArq->nomeArq_modelo;

unlink( $enderecoArq);

$sqlDelete = "DELETE FROM modelo WHERE cod_modelo = :id";
$stmt = $conn->prepare($sqlDelete);
$stmt->bindValue(":id", $id);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../../cadModelo">