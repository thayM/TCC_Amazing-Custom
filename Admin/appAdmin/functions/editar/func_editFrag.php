<?php
require "../../../../lib/conn.php";

$errors = [];

foreach($_POST as $indice => $valor){
    $valores = strip_tags($valor);
    if(empty($valor) || empty($valores)){
    $errors[$indice] = "O campo ".str_replace('New__frag', '', $indice)." é obrigatório*";
    }
}


session_start();
extract($_POST);
$id = $_GET['id'];

if(count($errors) == 0) {
    $sqlInsert='UPDATE fragrancia SET nome_frag= :nome, desc_frag= :descricao WHERE cod_frag = :id';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $nomeNew__frag);
    $stmt->bindValue(":descricao", $descricaoNew__frag);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
}else{
    $_SESSION['errors'] = $errors; 
    $_SESSION['idFrag'] = $id;
    $_SESSION['nomeFrag'] = $nomeNew__frag;
    $_SESSION['descFrag'] = $descricaoNew__frag;
}
header('Location: ../../cadFragrancia.php');
?>
<!-- <meta http-equiv="refresh" content="0; url=../../cadFragrancia">     -->
