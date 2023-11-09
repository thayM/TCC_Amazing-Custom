<?php 

require_once("../../lib/conn.php");
extract($_POST);

$verificarLogin = "SELECT * FROM cliente WHERE cod_rastreamento = :cod";
$verificarCliente = $conn->prepare($verificarLogin);
$verificarCliente-> bindValue(":cod",$codClie);
$verificarCliente-> execute();

if ($verificarCliente->rowCount() === 1) {
    $cliente = $verificarCliente->fetch(PDO::FETCH_OBJ);
    $idCliente = $cliente->cod_cli;
    session_start();
    
    $_SESSION['loggIn'] = true;
    header("Location: ../appCliente/rastreio.php?id=$idCliente");
}else{
    header("Location: ../codRastreio.php");
}


?>