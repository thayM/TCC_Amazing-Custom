<?php
  include_once('../components/header.php');
  require '../../lib/conn.php';
  session_start();
  if (!isset($_SESSION['loggIn'])) {
    header("Location: ../index.php");
  }
  
  $errors = $_SESSION['errors'] ?? null;
  unset($_SESSION['errors']);

  $id = $_GET["id"];
  $sqlSelect = "SELECT * FROM cliente INNER JOIN endereco ON fkcod_endereco = cod_endereco WHERE cod_cli = :id";
  $clientes = $conn->prepare($sqlSelect);
  $clientes->bindValue(":id", $id);
  $clientes->execute();
  $cliente = $clientes->fetchAll(PDO::FETCH_OBJ);
  $cliente = $cliente[0];
  $telefones = explode("/",$cliente->tel);
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadCliente.css">
  <title>Cadastro Cliente</title>
</head>

<script src="../assets/js/cadCliente.js"></script>
<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="./functions/editar/func_editCli.php?idCli=<?= $cliente->cod_cli?>&idEnd=<?= $cliente->fkcod_endereco?>" method="post" class="content_form d-flex flex-column">
      <h3>Editando Cliente</h3>

      <div class="input__field d-flex flex-column">
        <input type="text"name="nome" placeholder="Nome Completo" value="<?= $cliente->nome?>">
        <span class="error"><?= (isset($errors['nome'])) ? $errors["nome"] : null ?></span>
      </div>

      <div class="input__field d-flex flex-column">
        <input type="email" name="email"placeholder="E-mail" value="<?= $cliente->email?>">
        <span class="error"><?= (isset($errors['email'])) ? $errors["email"] : null ?></span>
      </div>

      <div class="d-flex justify-content-between">
        <label for="telefone-1">Telefone:</label>
        <div class="info_tel input__field d-flex flex-column">
          <input type="text" name="telefone" id="telefone-1" class="info_tel-input" value="<?=$telefones[0]?>">
          <span class="error"><?= (isset($errors['telefone'])) ? $errors["telefone"] : null ?></span>
        </div>

        <label for="telefone-2">Tel Opcional:</label>
        <div class="info_tel input__field d-flex flex-column">
          <input type="text" name="telefone_opcional" id="telefone-2" class="info_tel-input" value="<?=$telefones[1]?>">
          <span class="error"><?= (isset($errors['telefone_opcional'])) ? $errors["telefone_opcional"] : null ?></span>
        </div>
      </div>

      <div class="endereco d-flex flex-wrap">
        <div class="input_field d-flex flex-column">
          <input type="text" name="cep" class="cep" onchange="pesquisacep(this.value)" onkeyup="pesquisacep(this.value)" value="<?= $cliente->cep?>">
          <span class="error"><?= (isset($errors['cep'])) ? $errors["cep"] : null ?></span>
        </div>

        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" class="endereco_buscar-cep">
          <p>Não sabe o CEP?</p>
        </a>

        <div class="endereco_content d-flex justify-content-between">
          <div class="input__field d-flex flex-column">
            <input type="text" name="logradouro" id="logradouro__cli" placeholder="Logradouro" value="<?= $cliente->logradouro?>">
            <span class="error"><?= (isset($errors['logradouro'])) ? $errors["logradouro"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="numero" placeholder="Número" value="<?= $cliente->num?>">
            <span class="error"><?= (isset($errors['numero'])) ? $errors["numero"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="bairro"  id="bairro__cli" placeholder="Bairro" value="<?= $cliente->bairro?>">
            <span class="error"><?= (isset($errors['bairro'])) ? $errors["bairro"] : null ?></span>
          </div>
        </div>

        <div class="endereco_content d-flex justify-content-between">
          <div class="input__field d-flex flex-column">
            <input type="text" name="cidade"  id="cidade__cli" placeholder="Cidade" value="<?= $cliente->cidade?>">
            <span class="error"><?= (isset($errors['cidade'])) ? $errors["cidade"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="uf" id="uf__cli" placeholder="UF" maxlength="2" value='<?= $cliente->uf?>'>
            <span class="error"><?= (isset($errors['uf'])) ? $errors["uf"] : null ?></span>
          </div>
          <div class="input__field d-flex flex-column">
            <input type="text" name="complemento" id="complemento__cli" placeholder="Complemento" value="<?=$cliente->complemento?>">
            <span class="error"><?= (isset($errors['complemento'])) ? $errors["complemento"] : null ?></span>
          </div>
        </div>
      </div>
      <div class="btn-cadastro d-flex justify-content-end p-0 w-100">
        <button class="btn_modal cancelar">CANCELAR</button>
        <button type="submit" class="btn-default btn-cadastrar">ATUALIZAR</button>
      </div>
    </form>
  </div>
  <script src="../assets/js/style.js"></script>
</body>
</html>