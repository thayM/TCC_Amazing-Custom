<?php
$errors = [];

foreach($_POST as $indice => $valor){
    $valores = strip_tags($valor);
    if(empty($valor) || empty($valores)){
    $errors[$indice] = "O campo ".str_replace('__frag', '', $indice)." é obrigatório*";
    }
}

?>