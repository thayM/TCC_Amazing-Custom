<?php
require "../../../../lib/conn.php";
$id = $_GET['id'];   
$sqlDelete = "DELETE FROM cliente WHERE cod_cli = :id";
$stmt = $conn->prepare($sqlDelete);
$stmt->bindValue(":id", $id);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../../listagemCli.php">