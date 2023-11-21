<?php 
require_once("../../lib/conn.php");
extract($_POST);
$errors = [];

$verificarLogin = "SELECT * FROM cliente WHERE cod_rastreamento = :cod";
$verificarCliente = $conn->prepare($verificarLogin);
$verificarCliente-> bindValue(":cod",$codigo__Clie);
$verificarCliente-> execute();

if($verificarCliente->rowCount() === 1){
    $cliente = $verificarCliente->fetch(PDO::FETCH_OBJ);
    $idCliente = $cliente->cod_cli;
    session_start();
    $_SESSION['loggIn'] = true;
    header("Location: ../appCliente/rastreio.php?id=$idCliente");
  }else{
    $errors['codigo__Clie'] = "Código inválido*";
    foreach($_POST as $indice => $valor){
      if(empty($valor) || empty(strip_tags($valor))){
        $errors[$indice] = "O campo ".str_replace('__Clie', '', $indice)." é obrigatório*";
      }
    }
    session_start();
    $_SESSION['errors'] = $errors; 
    header("Location: ../index.php");
}
?>