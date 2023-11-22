<?php
require '../../../lib/conn.php';
extract($_POST);
require 'validacao/validate_modelo.php';

session_start();
if(count($errors) == 0) {
    if (!file_exists('../../../upload')) {
        mkdir('../../../upload', 0777);
    }
    $filename = time().'_'.$_FILES['file']['name'];
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], '../../../upload/'.$filename)){

    $remodelagemValorModelo = str_replace('.', '', $valor__Modelo);
    $valorModeloNum = (float)(str_replace(',', '.', $remodelagemValorModelo));
    $sqlInsert='INSERT INTO MODELO VALUES(0, :nome, :valor, :nomeArq)';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $nome__Modelo);
    $stmt->bindValue(":valor", $valorModeloNum );
    $stmt->bindValue(":nomeArq", $filename);
    $stmt->execute();
    };
}else{
    $_SESSION['errors'] = $errors;
    $_SESSION['nome'] = $nome__Modelo;
    $_SESSION['valor'] = $valor__Modelo;

}

header('Location: ../cadModelo.php');
?>
