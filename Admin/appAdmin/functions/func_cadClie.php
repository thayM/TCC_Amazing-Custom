<?php
require '../../../lib/conn.php';
extract($_POST);
session_start();
$_SESSION['valores'] = $_POST;

$errors = [];
foreach($_POST as $indice => $valor){
  if(empty($valor) && $indice != 'telefone_opcional' && $indice != 'complemento'){
    $errors[$indice] = "O campo $indice é obrigatório*";
  }
}

if(!$errors['email'] && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $erro = "E-mail deve ser no formato nome@domínio";
}

if(!$errors['cep'] && strlen($cep) < 9) {
  $errors['cep'] = "O cep deve ter 8 caracteres.*";
}

if(!$errors['telefone'] && strlen($telefone) < 14) {
  $errors['telefone'] = "O telefone deve ter 11 caracteres.*";
}

if(!empty($telefone_opcional) && strlen($telefone_opcional) < 14) {
  $errors['telefone_opcional'] = "O telefone deve ter 11 caracteres.*";
}

if(!$errors['uf'] && strlen($uf) != 2 || is_numeric($uf)) {
  $errors['uf'] = "UF inválida*";
}

if(count($errors) == 0) {
$tel = $telefone."/".$telefone2;

$sqlInsert='INSERT INTO endereco VALUES(0,:cep,:logradouro,:num,:cidade,:bairro,:uf,:complemento)';
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":cep", $cep);
$stmt->bindValue(":logradouro", $logradouro);
$stmt->bindValue(":num", $numero);
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

header('Location: ../listagemCli.php');
} else {
  $_SESSION['errors'] = $errors; 
  header('Location: ../cadCliente.php');
}
?>