<?php
require '../../../lib/conn.php';


if(isset($_FILES['file'])){
    
    $arr_file_types = ['image/png','image/jpg', 'image/jpeg'];
    // if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    //     echo "false";
    //     return;
    // }
    if (!file_exists('../../../upload')) {
        mkdir('../../../upload', 0777);
    }
    
    $filename = time().'_'.$_FILES['file']['name'];
    
    if(move_uploaded_file($_FILES['file']['tmp_name'], '../../../upload/'.$filename)){
    
    extract($_POST);
    $remodelagemValorModelo = str_replace('.', '', $valor__Modelo);
    $valorModeloNum = (float)(str_replace(',', '.', $remodelagemValorModelo));
    $sqlInsert='INSERT INTO MODELO VALUES(0, :nome, :valor, :nomeArq)';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $nome__Modelo);
    $stmt->bindValue(":valor", $valorModeloNum );
    $stmt->bindValue(":nomeArq", $filename);
    $stmt->execute();
    };
}


?>
<meta http-equiv="refresh" content="0; url=../cadModelo">