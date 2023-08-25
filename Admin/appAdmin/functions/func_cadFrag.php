<?php
require '../../../lib/conn.php';
extract($_POST);
$sqlInsert='INSERT INTO fragrancia VALUES(0, :nome, :descricao)';
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":nome", $nome__frag);
$stmt->bindValue(":descricao", $desc__frag);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../cadFragrancia">
