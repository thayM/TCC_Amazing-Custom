<?php
require '../../../../lib/conn.php';
extract($_POST);

var_dump($_POST);
$idCli = $_GET["idCli"];
$idEnd = $_GET["idEnd"];
$tel = $telefone."/".$telefone2;

$sqlUpdate='UPDATE endereco SET cep = :cep, logradouro = :logradouro,num = :num,cidade = :cidade, bairro = :bairro,uf = :uf ,complemento = :complemento WHERE cod_endereco = :id';
$stmt = $conn->prepare($sqlUpdate);
$stmt->bindValue(":cep", $cep);
$stmt->bindValue(":logradouro", $logradouro);
$stmt->bindValue(":num", $num);
$stmt->bindValue(":cidade", $cidade);
$stmt->bindValue(":bairro", $bairro);
$stmt->bindValue(":uf", $uf);
$stmt->bindValue(":complemento", $complemento);
$stmt->bindValue(":id", $idEnd);
$stmt->execute();


$sqlUpdate='UPDATE cliente SET nome=:nome, tel = :tel, email = :email where cod_cli = :id';
$stmt = $conn->prepare($sqlUpdate);
$stmt->bindValue(":nome", $nome);
$stmt->bindValue(":tel", $tel);
$stmt->bindValue(":email", $email);
$stmt->bindValue(":id", $idCli);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../../listagemCli.php">