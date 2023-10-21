<?php

require '../../../../lib/conn.php';
extract($_POST);
$produtos = json_decode($_GET["produtos"]);

foreach ($produtos as $key => $value) {
  $sqlSelect = "SELECT cod_cli FROM cliente WHERE nome = :nome";
  $sqlCliente = $conn->prepare($sqlSelect);
  $sqlCliente->bindValue(":nome", $cliente); 
  $sqlCliente->execute();
  $codCliente = $sqlCliente->fetch(PDO::FETCH_OBJ);
  $codCliente = $codCliente->cod_cli;

  $sqlUpdate = "UPDATE pedido SET fkcod_cli = :cliente, frete = :frete, valor = :valor, data_ped = :data_ped, valor_total = :valor_total, estado_pedido = :status WHERE cod_ped = :id";
  $stmt = $conn->prepare($sqlUpdate);
  $stmt->bindValue(":cliente", $codCliente);
  $stmt->bindValue(":frete", $frete);
  $stmt->bindValue(":valor", $valor);
  $stmt->bindValue(":data_ped", $data_ped);
  $stmt->bindValue(":valor_total", $valor+$frete);
  $stmt->bindValue(":status", $status);
  $stmt->bindValue(":id", $value[3]);
  $stmt->execute();

  $sqlSelectPedPro = "SELECT fkcod_prod FROM pedido_produto WHERE fkcod_ped = :id";
  $sqlPedido_produto = $conn->prepare($sqlSelectPedPro);
  $sqlPedido_produto->bindValue(":id", $value[3]); 
  $sqlPedido_produto->execute();
  $codProd = $sqlPedido_produto->fetch(PDO::FETCH_OBJ);
  $codProd = $codProd->fkcod_prod;

  $sqlSelectModelo = "SELECT cod_modelo FROM modelo WHERE nome_modelo = :modelo";
  $sqlModelo = $conn->prepare($sqlSelectModelo);
  $sqlModelo->bindValue(":modelo", $value[0]); 
  $sqlModelo->execute();
  $codModelo = $sqlModelo->fetch(PDO::FETCH_OBJ);
  $codModelo = $codModelo->cod_modelo;

  $sqlSelectMod = "SELECT valor_modelo FROM modelo WHERE cod_modelo = :cod_mod";
  $sqlModelo = $conn->prepare($sqlSelectMod);
  $sqlModelo->bindValue("cod_mod", $codModelo); 
  $sqlModelo->execute();
  $valorMod = $sqlModelo->fetch(PDO::FETCH_OBJ);
  $valorMod = $valorMod->valor_modelo;

  $sqlSelect = "SELECT cod_frag FROM fragrancia WHERE nome_frag = :frag";
  $sqlFragrancia = $conn->prepare($sqlSelect);
  $sqlFragrancia->bindValue(":frag", $value[1]); 
  $sqlFragrancia->execute();
  $codFragrancia = $sqlFragrancia->fetch(PDO::FETCH_OBJ);
  $codFragrancia = $codFragrancia->cod_frag;

  $sqlUpProds = "UPDATE produto SET fkcod_frag = :cod_frag, fkcod_modelo = :cod_modelo WHERE cod_prod = :id";
  $stmt = $conn->prepare($sqlUpProds);
  $stmt->bindValue(":cod_frag", $codFragrancia);
  $stmt->bindValue(":cod_modelo", $codModelo);
  $stmt->bindValue(":id", $codProd);
  $stmt->execute();

  $sqlUpSub_total = "UPDATE pedido_produto SET qtd_prod = :qtd_prod, sub_total = :sub_total WHERE fkcod_prod = :codProd";
  $stmt = $conn->prepare($sqlUpSub_total);
  $stmt->bindValue(":qtd_prod", $value[2]);
  $stmt->bindValue(":sub_total", $valorMod*$value[2]);
  $stmt->bindValue(":codProd", $codProd);
  $stmt->execute();
}
?>

<meta http-equiv="refresh" content="0; url=../../home.php">