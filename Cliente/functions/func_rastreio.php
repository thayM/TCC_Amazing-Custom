<?php 

require_once("../../lib/conn.php");
extract($_POST);
session_start();
$_SESSION['valores'] = $_POST;

$errors = [];

  if(empty($valor)){
    $errors[$indice] = "O campo $indice é obrigatório*";
}

$verificarLogin = "SELECT * FROM cliente WHERE cod_rastreamento = :cod";
$verificarCliente = $conn->prepare($verificarLogin);
$verificarCliente-> bindValue(":cod",$codClie);
$verificarCliente-> execute();

if(count($errors) == 0) {
if ($verificarCliente->rowCount() === 1) {
    $cliente = $verificarCliente->fetch(PDO::FETCH_OBJ);
    $idCliente = $cliente->cod_cli;
    session_start();
    
    $_SESSION['loggIn'] = true;
    header("Location: ../appCliente/rastreio.php?id=$idCliente");
}else{
    $errors= "código não existe";
}
}else{
  $_SESSION['errors'] = $errors; 
  header("Location: ../codRastreio.php");
}
?>