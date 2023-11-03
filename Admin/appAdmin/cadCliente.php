<?php
  include_once('../components/header.php');
?>
<head>
  <link rel="stylesheet" href="../assets/css/style_cadCliente.css">
  <title>Cadastro Cliente</title>
</head>

<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="./functions/func_cadClie.php" method="post" class="content_form d-flex flex-column">
      <h3>Novo Cliente</h3>
      <input type="text"name="nome" placeholder="Nome Completo">
      <input type="email" name="email"placeholder="E-mail">

      <div class="d-flex justify-content-between">
        <label for="telefone-1">Telefone:</label>
        <input type="text" name="telefone" id="telefone-1" class="info_tel-input">

        <label for="telefone-2">Tel Opcional:</label>
        <input type="text" name="telefone2" id="telefone-2" class="info_tel-input">
      </div>

      <div class="endereco d-flex flex-wrap">
        <input type="text" name="cep" class="cep" onchange="pesquisacep(this.value)" onkeyup="pesquisacep(this.value)">
        <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" class="endereco_buscar-cep">
          <p>Não sabe o CEP?</p>
        </a>

        <div class="endereco_content d-flex justify-content-between">
          <input type="text" name="logradouro" id="logradouro__cli" placeholder="Logradouro">
          <input type="text" name="num"  placeholder="Número">
          <input type="text" name="bairro"  id="bairro__cli" placeholder="Bairro">
        </div>
        <div class="endereco_content d-flex justify-content-between">
          <input type="text" name="cidade"  id="cidade__cli" placeholder="Cidade">
          <input type="text" name="uf" id="uf__cli" placeholder="UF">
          <input type="text" name="complemento" id="complemento__cli" placeholder="Complemento">
        </div>
      </div>
      <div class="btn-cadastro d-flex justify-content-end p-0 w-100">
        <button type="submit" class="btn-cadastrar">CADASTRAR</button>
      </div>
    </form>
  </div>
  <script src="../assets/js/style.js"></script>
  <script src="../assets/js/cadCliente.js"></script>
</body>
</html>