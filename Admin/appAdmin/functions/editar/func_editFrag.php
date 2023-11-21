<?php
require "../../../../lib/conn.php";
require '../validacao/validate_frag.php';

session_start();
extract($_POST);
$id = $_GET['id'];

if(count($errors) == 0) {
    $sqlInsert='UPDATE fragrancia SET nome_frag= :nome, desc_frag= :descricao WHERE cod_frag = :id';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $newNome__frag);
    $stmt->bindValue(":descricao", $newDesc__frag);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
}else{
    $_SESSION['errors'] = $errors; 
    $_SESSION['idFrag'] = $id;
    $_SESSION['nomeFrag'] = $newNome__frag;
    $_SESSION['descFrag'] = $newDesc__frag;
}
header('Location: ../../cadFragrancia.php');
?>
<!-- <meta http-equiv="refresh" content="0; url=../../cadFragrancia">     -->
