<?php
require '../../../../lib/conn.php';
extract($_POST);
require '../validacao/validate_cliente.php';

session_start();
$_SESSION['valores'] = $_POST;

$idCli = $_GET["idCli"];
if (count($errors) == 0) {
  var_dump($_POST);
  $idEnd = $_GET["idEnd"];
  $tel = $telefone . "/" . $telefone_opcional;

  $sqlUpdate = 'UPDATE endereco SET cep = :cep, logradouro = :logradouro,num = :num,cidade = :cidade, bairro = :bairro,uf = :uf ,complemento = :complemento WHERE cod_endereco = :id';
  $stmt = $conn->prepare($sqlUpdate);
  $stmt->bindValue(":cep", $cep);
  $stmt->bindValue(":logradouro", $logradouro);
  $stmt->bindValue(":num", $numero);
  $stmt->bindValue(":cidade", $cidade);
  $stmt->bindValue(":bairro", $bairro);
  $stmt->bindValue(":uf", $uf);
  $stmt->bindValue(":complemento", $complemento);
  $stmt->bindValue(":id", $idEnd);
  $stmt->execute();

  $sqlUpdate = 'UPDATE cliente SET nome=:nome, tel = :tel, email = :email where cod_cli = :id';
  $stmt = $conn->prepare($sqlUpdate);
  $stmt->bindValue(":nome", $nome);
  $stmt->bindValue(":tel", $tel);
  $stmt->bindValue(":email", $email);
  $stmt->bindValue(":id", $idCli);
  $stmt->execute();

  header('Location: ../../listagemCli.php');
} else {
  $_SESSION['errors'] = $errors;
  header("Location: ../../editCliente.php?id=$idCli");
}
?>