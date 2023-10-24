<?php

require '../../../../lib/conn.php';
extract($_POST);

$produtos = json_decode($_GET["produtos"]);

$sqlSelect = "SELECT cod_cli FROM cliente WHERE nome = :nome";
$sqlCliente = $conn->prepare($sqlSelect);
$sqlCliente->bindValue(":nome", $cliente); 
$sqlCliente->execute();
$codCliente = $sqlCliente->fetch(PDO::FETCH_OBJ);
$codCliente = $codCliente->cod_cli;

foreach ($produtos as $produto => $value) {
$sqlUpdate = "UPDATE pedido SET fkcod_cli = :cliente, frete = :frete, valor = :valor, data_ped = :data_ped, valor_total = :valor_total, estado_pedido = :status WHERE cod_ped = :id";
$stmtClie = $conn->prepare($sqlUpdate);
$stmtClie->bindValue(":cliente", $codCliente);
$stmtClie->bindValue(":frete", $frete);
$stmtClie->bindValue(":valor", $valor);
$stmtClie->bindValue(":data_ped", $data_ped);
$stmtClie->bindValue(":valor_total", $valor+$frete);
$stmtClie->bindValue(":status", $status);
$stmtClie->bindValue(":id", $value[3]);
$stmtClie->execute();

$sqlModelo = "SELECT cod_modelo FROM modelo WHERE nome_modelo = :modelo";
$stmtModelo = $conn->prepare($sqlModelo);
$stmtModelo->bindValue(":modelo", $value[0]);
$stmtModelo->execute();
$codModelo = $stmtModelo->fetch(PDO::FETCH_OBJ);

$sqlFragrancia = "SELECT cod_frag FROM fragrancia WHERE nome_frag = :fragrancia";
$stmtFragrancia = $conn->prepare($sqlFragrancia);
$stmtFragrancia->bindValue(":fragrancia",  $value[1]);
$stmtFragrancia->execute();
$codFragrancia = $stmtFragrancia->fetch(PDO::FETCH_OBJ);

$sqlProdutoID = "SELECT fkcod_prod FROM pedido_produto WHERE fkcod_ped = :pedido_id";
$stmtProdutoID = $conn->prepare($sqlProdutoID);
$stmtProdutoID->bindValue(":pedido_id", $value[3]);
$stmtProdutoID->execute();
$produto_ids = $stmtProdutoID->fetchAll(PDO::FETCH_OBJ);
}
var_dump($produtos);
var_dump($produto_ids);
foreach ($produto_ids as $produto_id){
$sqlUpdateProduto = "UPDATE produto SET fkcod_frag = :cod_frag, fkcod_modelo = :cod_modelo WHERE cod_prod = :produto_id";
$stmtUpdateProduto = $conn->prepare($sqlUpdateProduto);
$stmtUpdateProduto->bindValue(":cod_frag", $codFragrancia);
$stmtUpdateProduto->bindValue(":cod_modelo", $codModelo);
$stmtUpdateProduto->bindValue(":produto_id", $produto_id);
$stmtUpdateProduto->execute();

$sqlUpdateQuantidade = "UPDATE pedido_produto SET qtd_prod = :quantidade WHERE fkcod_prod = :produto_id";
$stmtUpdateQuantidade = $conn->prepare($sqlUpdateQuantidade);
$stmtUpdateQuantidade->bindValue(":quantidade", $quantidade);
$stmtUpdateQuantidade->bindValue(":produto_id", $produto_id);
$stmtUpdateQuantidade->execute();
}
?>


<!-- <meta http-equiv="refresh" content="0; url=../../home.php"> -->