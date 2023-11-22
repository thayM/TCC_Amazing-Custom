<?php
require '../../../../lib/conn.php';

extract($_POST);
session_start();
$remodelagemNewValorModelo = str_replace('.', '', $newValor__Modelo);
$newValorModeloNum = (float)(str_replace(',', '.', $remodelagemNewValorModelo ));
$id = $_GET['id'];

require '../validacao/validate_newModelo.php';

echo count($errors);
if (count($errors) == 0) {
    

if($_FILES['file']['error'] == 0){
    $sqlSelect = "SELECT nomeArq_modelo FROM modelo WHERE cod_modelo = :id";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $nomeArq = $stmt->fetch(PDO::FETCH_OBJ);
    $enderecoArq = "../../../../upload/".$nomeArq->nomeArq_modelo;
    unlink( $enderecoArq);

    $arr_file_types = ['image/png','image/jpg', 'image/jpeg'];
    // if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    //     echo "false";
    //     return;
    // }
    
    $filename = time().'_'.$_FILES['file']['name'];
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], '../../../../upload/'.$filename)){
    $sqlInsert='UPDATE modelo SET nome_modelo= :nome, valor_modelo= :valor, nomeArq_modelo = :arqNome  WHERE cod_modelo = :id';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $newNome__Modelo);
    $stmt->bindValue(":valor", $newValorModeloNum);
    $stmt->bindValue(":arqNome", $filename);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    }
}else{
    $sqlInsert='UPDATE modelo SET nome_modelo= :nome, valor_modelo= :valor WHERE cod_modelo = :id';
    echo $sqlInsert;
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $newNome__Modelo);
    $stmt->bindValue(":valor", floatval($newValor__Modelo));
    $stmt->bindValue(":id", $id);
    $stmt->execute();
}
}else{
    $sqlSelect = "SELECT nomeArq_modelo FROM modelo WHERE cod_modelo = :id";
    $stmt = $conn->prepare($sqlSelect);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    $nomeArq = $stmt->fetch(PDO::FETCH_OBJ);
    $nomeArq = $nomeArq->nomeArq_modelo;
    $_SESSION['errors'] = $errors;
    $_SESSION['nome'] = $newNome__Modelo ?? null;
    $_SESSION['valor'] = $newValor__Modelo ?? null;
    $_SESSION['file'] = $nomeArq;
    $_SESSION['id'] = $id;
    
}
var_dump($_SESSION);
header('Location: ../../cadModelo.php');
?>
