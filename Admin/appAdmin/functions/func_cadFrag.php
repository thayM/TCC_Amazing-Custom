<?php
require '../../../lib/conn.php';

foreach ($_POST as $index => $post) {
    if(isset($post) && $post != ""){
        $$index = trim(strip_tags($post));
    }else{
        $erro = 1;
    }

}

if ($erro==1){

}else{
    $sqlInsert='INSERT INTO fragrancia VALUES(0, :nome, :descricao)';
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":nome", $nome__frag);
    $stmt->bindValue(":descricao", $desc__frag);
    $stmt->execute();
}
?>
<meta http-equiv="refresh" content="0; url=../cadFragrancia">
