<?php
$errors = [];
if(empty(strip_tags($newNome__Modelo)) || empty($newNome__Modelo)){
    $errors["newNome__Modelo"] = "O campo nome é obrigatório*";
}
if(empty(strip_tags($newValor__Modelo)) || empty($newValor__Modelo)){
    $errors["newValor__Modelo"] = "O campo valor é obrigatório*";
}

?>