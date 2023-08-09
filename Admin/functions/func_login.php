<?php
require_once("../../lib/conn.php");

extract($_POST);

$verificarLogin = "SELECT * FROM adm WHERE nome_adm = :name AND senha_adm = :password";
$verificarUsuario = $conn->prepare($verificarLogin);
$verificarUsuario-> bindValue(":name",$nome);
$verificarUsuario-> bindValue(":password",$senha);
$verificarUsuario-> execute();

if ($verificarUsuario->rowCount() === 1) {
    $usuario = $verificarUsuario->fetch(PDO::FETCH_OBJ);
    session_start();
    $_SESSION['nome'] = $usuario->nome;
    $_SESSION['loggIn'] = true;
    header('Location: ../appAdmin/home.php');
}else{
    header("Location: ../index.php");
}

?>