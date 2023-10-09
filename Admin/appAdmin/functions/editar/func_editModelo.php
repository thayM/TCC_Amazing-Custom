<?php
require '../../../../lib/conn.php';
extract($_POST);
var_dump($_POST);
var_dump($_FILES);
echo floatval($newValor__Modelo);
$id = $_GET['id'];

if($_FILES['file']['name'] != ""){
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
    echo $sqlInsert;
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $newNome__Modelo);
    $stmt->bindValue(":valor", floatval($newValor__Modelo));
    $stmt->bindValue(":arqNome", $filename);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    echo "estou ali!";
    }
}else{
    $sqlInsert='UPDATE modelo SET nome_modelo= :nome, valor_modelo= :valor WHERE cod_modelo = :id';
    echo $sqlInsert;
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $newNome__Modelo);
    $stmt->bindValue(":valor", floatval($newValor__Modelo));
    $stmt->bindValue(":id", $id);
    $stmt->execute();
    echo "estou aqui!";
}


?>
<!-- <meta http-equiv="refresh" content="0; url=../../cadModelo"> -->