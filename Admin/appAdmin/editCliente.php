<?php
  include_once('../components/header.php');
  require '../../lib/conn.php';

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
      <input type="text"name="nome" placeholder="Nome Completo" value="<?= $cliente->nome?>">
      <input type="email" name="email"placeholder="E-mail" value="<?= $cliente->email?>">

      <div class="d-flex justify-content-between">
        <label for="telefone-1">Telefone:</label>
        <input type="text" name="telefone" id="telefone-1" class="info_tel-input" value="<?=$telefones[0]?>">

        <label for="telefone-2">Tel Opcional:</label>
        <input type="text" name="telefone2" id="telefone-2" class="info_tel-input" value="<?=$telefones[1]?>">
      </div>

      <div class="endereco d-flex flex-wrap">
        <input type="text" name="cep" class="cep" onchange="pesquisacep(this.value)" onkeyup="pesquisacep(this.value)" value="<?= $cliente->cep?>">
        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" class="endereco_buscar-cep">
          <p>Não sabe o CEP?</p>
        </a>

        <div class="endereco_content d-flex justify-content-between">
          <input type="text" name="logradouro" id="logradouro__cli" placeholder="Logradouro" value="<?= $cliente->logradouro?>">
          <input type="text" name="num"  placeholder="Número" value="<?= $cliente->num?>">
          <input type="text" name="bairro"  id="bairro__cli" placeholder="Bairro" value="<?= $cliente->bairro?>">
        </div>
        <div class="endereco_content d-flex justify-content-between">
          <input type="text" name="cidade"  id="cidade__cli" placeholder="Cidade" value="<?= $cliente->cidade?>">
          <input type="text" name="uf" id="uf__cli" placeholder="UF" value='<?= $cliente->uf?>'>
          <input type="text" name="complemento" id="complemento__cli" placeholder="Complemento" value="<?=$cliente->complemento?>">
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