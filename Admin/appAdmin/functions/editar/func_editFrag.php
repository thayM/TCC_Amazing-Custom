<?php
require "../../../../lib/conn.php";
$erro = 0;

foreach ($_POST as $index => $post) {
    if(isset($post) && $post != ""){
        $$index = trim(strip_tags($post));
    }else{
        $erro = 1;
    }
}
$id = $_GET['id'];
if ($erro==1){

}else{
    $sqlInsert='UPDATE fragrancia SET nome_frag= :nome, desc_frag= :descricao WHERE cod_frag = :id';
    echo $sqlInsert;
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $newNome__frag);
    $stmt->bindValue(":descricao", $newDesc__frag);
    $stmt->bindValue(":id", $id);
    $stmt->execute();
}
?>
<meta http-equiv="refresh" content="0; url=../../cadFragrancia">    
