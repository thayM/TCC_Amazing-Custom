<?php
$produtos = json_decode($_GET["produtos"]);
$hoje = (date('Y-m-d'));
$errors=[];


$sqlSelect = "SELECT * FROM cliente WHERE nome = :nome";
$sqlCliente = $conn->prepare($sqlSelect);
$sqlCliente->bindValue(":nome", $cliente); 
$sqlCliente->execute();
if($sqlCliente->rowCount()!=1) $errors["cliente"]= "Cliente invalido*";

if($hoje>$data_ped) $errors["data"]="data invalida";

foreach ($produtos as $key => $value) {
    $sqlSelect = "SELECT * FROM modelo WHERE nome_modelo = :modelo";
    $modelo = $conn->prepare($sqlSelect);
    $modelo->bindValue(":modelo", $value[0]);
    $modelo->execute();
    if($modelo->rowCount()!=1) $errors["modelo"][$key] = "Este modelo é invalido*";
    
    $sqlSelect = "SELECT * FROM fragrancia WHERE nome_frag = :frag";
    $fragrancia = $conn->prepare($sqlSelect);
    $fragrancia->bindValue(":frag", $value[1]);
    $fragrancia->execute();
    if($fragrancia->rowCount()!=1) $errors["fragrancia"][$key] = "Esta fragrancia é invalida*";

    if(is_numeric($value[2])==0 || empty($value[2])) $errors["quantidade"][$key] = "Quantidade inválida*";
}

if(is_numeric($valor)==0 || empty($valor)) $errors["valor"] = "Este valor é invalido*";
if(is_numeric($frete)==0 || empty($frete)) $errors["frete"] = "Este frete é invalido*";
?>