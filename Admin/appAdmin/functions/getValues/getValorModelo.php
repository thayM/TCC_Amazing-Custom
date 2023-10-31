<?php
include_once "../../../../lib/conn.php";

$valorInput = filter_input(INPUT_GET, "value", FILTER_DEFAULT);

$sqlQuerry = 'SELECT nome_modelo, valor_modelo FROM modelo';
$sqlResult= $conn->prepare($sqlQuerry);
$sqlResult->execute();
$modelo = $sqlResult->fetchAll(PDO::FETCH_OBJ);

if (!empty($valorInput)) {
    if ($sqlResult->rowCount() > 0) {
        $dados = $modelo;
        $response = ['status'=>true, 'dados'=>$dados];
    }else {
        $response = ['status'=>false, 'msg'=>"Nada encontrado!"];
    }
}
else {
    $response = ['status'=>false, 'msg'=>"Nada encontrado!"];
}
echo json_encode($response)
?>