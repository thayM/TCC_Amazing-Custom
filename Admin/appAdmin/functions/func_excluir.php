<?php
require "../../../lib/conn.php";
$id = $_GET['id'];
$tabela = $_GET['tabela'];
$codigo  = $_GET['codigo'];

if($tabela != "fragrancia" && $tabela != "modelo"){
    $tabela = "";
}
if($codigo != "cod_modelo" && $codigo != "cod_frag"){
    $codigo = "";
}

echo "DELETE FROM $tabela WHERE $codigo=$id";

$sqlDelete = "DELETE FROM ".$tabela." WHERE ". $codigo ." = :id";
$stmt = $conn->prepare($sqlDelete);
$stmt->bindValue(":id", $id);
$stmt->execute();
?>
<meta http-equiv="refresh" content="0; url=../cadFragrancia">
