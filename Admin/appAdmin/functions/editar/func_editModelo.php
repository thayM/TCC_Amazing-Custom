<?php
require '../../../../lib/conn.php';
extract($_POST);

$remodelagemNewValorModelo = str_replace('.', '', $newValor__Modelo);
$newValorModeloNum = (float)(str_replace(',', '.', $remodelagemNewValorModelo ));
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


?>
<meta http-equiv="refresh" content="0; url=../../cadModelo">