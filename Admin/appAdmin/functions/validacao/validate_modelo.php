<?php
$errors = [];
var_dump($_FILES);
if ($_FILES['file']['error'] >0) {
    $errors['file'] = 'O campo de imagem é obrigatório';
}
if(empty(strip_tags($nome__Modelo)) || empty($nome__Modelo)){
    $errors["nome__Modelo"] = "O campo nome é obrigatório*";
}
if(empty(strip_tags($valor__Modelo)) || empty($valor__Modelo)){
    $errors["valor__Modelo"] = "O campo valor é obrigatório*";
}

?>