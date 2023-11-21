<?php
$errors = [];

if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors['email'] = "E-mail deve ser no formato nome@domínio";
}

if(strlen($cep) < 9) {
  $errors['cep'] = "O cep deve ter 8 caracteres.*";
}

if(strlen($telefone) < 14) {
  $errors['telefone'] = "O telefone deve ter 11 caracteres.*";
}

if(!empty($telefone_opcional) && strlen($telefone_opcional) < 14) {
  $errors['telefone_opcional'] = "O telefone deve ter 11 caracteres.*";
}

if(strlen($uf) != 2 || is_numeric($uf)) {
  $errors['uf'] = "UF inválida*";
}

foreach($_POST as $indice => $valor){
  if(empty($valor) && $indice != 'telefone_opcional' && $indice != 'complemento'){
    $errors[$indice] = "O campo $indice é obrigatório*";
  }
}
?>