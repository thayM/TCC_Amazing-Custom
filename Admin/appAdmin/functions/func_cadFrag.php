<?php
require '../../../lib/conn.php';
extract($_POST);
require 'validacao/validate_frag.php';
session_start();
$_SESSION['valores'] = $_POST;


if(count($errors) == 0) {
    $sqlInsert='INSERT INTO fragrancia VALUES(0, :nome, :descricao)';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $nome__frag);
    $stmt->bindValue(":descricao", $descricao__frag);
    $stmt->execute();
}else{
    $_SESSION['errors'] = $errors; 
}
header('Location: ../cadFragrancia.php');
?>
