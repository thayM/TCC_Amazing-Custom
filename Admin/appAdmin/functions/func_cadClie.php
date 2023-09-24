<?php
require '../../../lib/conn.php';
extract($_POST);
$tel = $telefone."/".$telefone2;
$endereco = $cep.".".$logradouro.",".$num.".".$bairro.".".$cidade."-".$uf.".".$complemento;

$sqlInsert='INSERT INTO cliente VALUES(0, :nome, 123,:tel,:endereco,:email)';
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":tel", $tel);
$stmt->bindValue(":endereco", $endereco);
$stmt->bindValue(":email", $email);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../cadCliente.php">
