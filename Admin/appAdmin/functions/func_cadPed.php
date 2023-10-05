<?php
require '../../../lib/conn.php';

extract($_POST);

$sqlInsert = "INSERT INTO PEDIDO VALUES(0, :cliente, :frete, :valor, CURDATE(), :valor_total, :estado_pedido)";
$stmt = $conn->prepare($sqlInsert);
$stmt->bindValue(":cliente", $cliente);
$stmt->bindValue(":frete", $frete);
$stmt->bindValue(":valor", $valor);
$stmt->bindValue(":valor_total", $valor+$frete);
$stmt->bindValue(":estado_pedido", $estado_pedido);
$stmt->execute();

$codPed = $conn->lastInsertId();

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

    $codProd = $produto->fetch(PDO::FETCH_OBJ);
    $codProd = $codProd->cod_prod;

    $sqlSelect = "SELECT * FROM modelo WHERE cod_modelo = :cod_modelo";
    $modelo = $conn->prepare($sqlSelect);
    $modelo->bindValue(":cod_modelo", $value[0]);
    $modelo->execute();
    $valor = $modelo->fetch(PDO::FETCH_OBJ);
    $valor = $valor->valor_modelo;

    $sqlInsert = "INSERT INTO pedido_produto VALUES(:cod_ped, :cod_prod, :sub_total, :qtd_prod)";
    $stmt = $conn->prepare($sqlInsert);
    $stmt->bindValue(":cod_ped", $codPed);
    $stmt->bindValue(":cod_prod", $codProd);
    $stmt->bindValue(":sub_total", ($value[2]*$valor));
    $stmt->bindValue(":qtd_prod", $value[2]);
    $stmt->execute();
}
?>
<!-- <meta http-equiv="refresh" content="0; url=../cadPedido.php"> -->