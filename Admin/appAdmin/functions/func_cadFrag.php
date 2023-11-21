<?php
require '../../../lib/conn.php';
extract($_POST);
session_start();
$_SESSION['valores'] = $_POST;

$errors = [];
foreach($_POST as $indice => $valor){
    $valores = strip_tags($valor);
    if(empty($valor) || empty($valores)){
    $errors[$indice] = "O campo ".str_replace('__frag', '', $indice)." é obrigatório*";
    }
}

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
