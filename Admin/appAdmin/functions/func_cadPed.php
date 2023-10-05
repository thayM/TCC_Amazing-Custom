<?php
require '../../../lib/conn.php';

extract($_POST);
// $sqlSelect = "SELECT cod_cli FROM CLIENTE WHERE cod_cli = :cod_cli";
// $client = $conn->prepare($sqlSelect);
// $client->bindValue(":cod_cli", $cliente);
// $client->execute();

$sqlInsert = "INSERT INTO PEDIDO VALUES(0, :cliente, :frete, :valor, CURDATE(), :valor_total, :estado_pedido)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":cliente", $cliente);
$stmt->bindValue(":frete", $frete);
$stmt->bindValue(":valor", $valor);
$stmt->bindValue(":valor_total", $valor+$frete);
$stmt->bindValue(":estado_pedido", $estado_pedido);
$stmt->execute();

$sqlSelect = $conn->query("SELECT cod_cli FROM cliente ORDER BY cod_cli DESC LIMIT 1");
$codCli = $sqlSelect->fetch(PDO::FETCH_OBJ);
var_dump($codCli);
$produtos = json_decode($_GET["produtos"]);
foreach ($produtos as $key => $value) {

    $sqlSelect = "SELECT * FROM produto WHERE fkcod_frag = :codFrag AND fkcod_modelo = :codModelo";
    $produto = $conn->prepare($sqlSelect);
    $produto->bindValue(":codModelo",$value[0]);
    $produto->bindValue(":codFrag",$value[1]);
    $produto->execute();
    var_dump($produto->rowCount());
    if($produto->rowCount()==0){
        $sqlInsert = "INSERT INTO produto VALUES(0, :codFrag, :codModelo)";
        $stmt = $conn->prepare($sqlInsert);
        $stmt->bindValue(":codModelo",$value[0]);
        $stmt->bindValue(":codFrag",$value[1]);
        $stmt->execute();
        $produto->execute();
    }
    $sqlInsert = "INSERT INTO pedido_produto VALUES(:cod_ped, :cod_prod, :sub_total, :qtd_prod)";
    $stmt = $conn->prepare($sqlInsert);
    // $stmt->bindValue(":cod_ped", $)
}

var_dump($stmt); 

var_dump($_POST);
?>
<!-- <meta http-equiv="refresh" content="0; url=../cadPedido.php"> -->