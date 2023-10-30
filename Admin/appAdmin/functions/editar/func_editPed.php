<?php

require '../../../../lib/conn.php';
extract($_POST);

$produtos = json_decode($_GET["produtos"]);
$id_pedido = $produtos[0][3];
var_dump($produtos);

$sqlSelect = "SELECT cod_cli FROM cliente WHERE nome = :nome";
$sqlCliente = $conn->prepare($sqlSelect);
$sqlCliente->bindValue(":nome", $cliente); 
$sqlCliente->execute();
$codCliente = $sqlCliente->fetch(PDO::FETCH_OBJ);
$codCliente = $codCliente->cod_cli;

$sqlUpdate = "UPDATE pedido SET fkcod_cli = :cliente, frete = :frete, valor = :valor, data_ped = :data_ped, valor_total = :valor_total, estado_pedido = :status WHERE cod_ped = :id";
$stmtClie = $conn->prepare($sqlUpdate);
$stmtClie->bindValue(":cliente", $codCliente);
$stmtClie->bindValue(":frete", $frete);
$stmtClie->bindValue(":valor", $valor);
$stmtClie->bindValue(":data_ped", $data_ped);
$stmtClie->bindValue(":valor_total", $valor+$frete);
$stmtClie->bindValue(":status", $status);
$stmtClie->bindValue(":id", $id_pedido);
$stmtClie->execute();

$sqlProdutoID = "SELECT fkcod_prod FROM pedido_produto WHERE fkcod_ped = :pedido_id";
$stmtProdutoID = $conn->prepare($sqlProdutoID);
$stmtProdutoID->bindValue(":pedido_id", $id_pedido);
$stmtProdutoID->execute();
$produto_ids = $stmtProdutoID->fetchAll(PDO::FETCH_OBJ);
var_dump($produto_ids);
$posicao = 0;

foreach ($produto_ids as $produto_id){
    $sqlModelo = "SELECT cod_modelo FROM modelo WHERE nome_modelo = :modelo";
    $stmtModelo = $conn->prepare($sqlModelo);
    $stmtModelo->bindValue(":modelo", $produtos[$posicao][0]);
    $stmtModelo->execute();
    $codModelo = $stmtModelo->fetch(PDO::FETCH_OBJ);
    var_dump($produtos[$posicao][0]);

    $sqlFragrancia = "SELECT cod_frag FROM fragrancia WHERE nome_frag = :fragrancia";
    $stmtFragrancia = $conn->prepare($sqlFragrancia);
    $stmtFragrancia->bindValue(":fragrancia",  $produtos[$posicao][1]);
    $stmtFragrancia->execute();
    $codFragrancia = $stmtFragrancia->fetch(PDO::FETCH_OBJ);
    var_dump($produtos[$posicao][1]);

    $sqlUpdateProduto = "UPDATE produto SET fkcod_frag = :cod_frag, fkcod_modelo = :cod_modelo WHERE cod_prod = :produto_id";
    $stmtUpdateProduto = $conn->prepare($sqlUpdateProduto);
    $stmtUpdateProduto->bindValue(":cod_frag", $codFragrancia->cod_frag);
    $stmtUpdateProduto->bindValue(":cod_modelo", $codModelo->cod_modelo);
    $stmtUpdateProduto->bindValue(":produto_id", $produto_id->fkcod_prod);
    $stmtUpdateProduto->execute();
    
    $sqlUpdateQuantidade = "UPDATE pedido_produto SET qtd_prod = :quantidade WHERE fkcod_prod = :produto_id AND fkcod_ped = :cod_pedido";
    $stmtUpdateQuantidade = $conn->prepare($sqlUpdateQuantidade);
    $stmtUpdateQuantidade->bindValue(":quantidade", $produtos[$posicao][2]);
    $stmtUpdateQuantidade->bindValue(":cod_pedido", $id_pedido);
    $stmtUpdateQuantidade->bindValue(":produto_id", $produto_id->fkcod_prod);
    $stmtUpdateQuantidade->execute();

    $posicao++;
}
?>

<meta http-equiv="refresh" content="0; url=../../home.php">