<?php
require '../../../lib/conn.php';
extract($_POST);

var_dump($_POST);
$tel = $telefone."/".$telefone2;

$sqlInsert='INSERT INTO endereco VALUES(0,:cep,:logradouro,:num,:cidade,:bairro,:uf,:complemento)';
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":cep", $cep);
$stmt->bindValue(":logradouro", $logradouro);
$stmt->bindValue(":num", $num);
$stmt->bindValue(":cidade", $cidade);
$stmt->bindValue(":bairro", $bairro);
$stmt->bindValue(":uf", $uf);
$stmt->bindValue(":complemento", $complemento);
$stmt->execute();

$codEnd = $conn->lastInsertId();


$sqlInsert='INSERT INTO cliente VALUES(0, :idEnd, :nome, "123",:tel,:email)';
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":idEnd", $codEnd);
$stmt->bindValue(":tel", $tel);
$stmt->bindValue(":email", $email);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../listagemCli.php">
