<?php
require_once("../../lib/conn.php");

extract($_POST);
session_start();
$verificarLogin = "SELECT * FROM adm WHERE nome_adm = :name AND senha_adm = :password";
$verificarUsuario = $conn->prepare($verificarLogin);
$verificarUsuario-> bindValue(":name",$nome);
$verificarUsuario-> bindValue(":password",$senha);
$verificarUsuario-> execute();

if ($verificarUsuario->rowCount() === 1) {
    $usuario = $verificarUsuario->fetch(PDO::FETCH_OBJ);
    
    $_SESSION['loggIn'] = true;
    header('Location: ../appAdmin/home.php');
}else{
    $_SESSION['loggIn'] = false;
    $_SESSION['errors'] = "Usuário e/ou senha incorreto(s)*";
    header("Location: ../index.php");
}

?>