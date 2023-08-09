<?php
// Não dar comit, use suas informações
$host = "";
$dbname = "";
$password = "";
$user = "";
$conn = new PDO(`mysql:hostname=$host;dbname=$dbname`,$user,$password);
?>