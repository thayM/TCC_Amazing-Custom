<?php
  include_once('../components/header.php');
?>
<head>
  <link rel="stylesheet" href="../assets/css/style_cadCliente.css">
  <title>Cadastro Cliente</title>
</head>
<script src="../assets/js/cadCliente.js"></script>
<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="./functions/func_cadClie.php" method="post" class="content_form d-flex flex-column">
      <h3>Novo Cliente</h3>
      <input type="text"name="nome" placeholder="Nome Completo">
      <input type="email" name="email"placeholder="E-mail">

      <div class="d-flex justify-content-between">
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" class="info_tel-input">

        <label for="telefone">Opcional:</label>
        <input type="tel" name="telefone2" class="info_tel-input">
      </div>

      <div class="endereco d-flex flex-wrap">
        <input type="text" name="cep" onchange="pesquisacep(this.value);" onkeyup="pesquisacep(this.value);" placeholder="CEP">
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
</body>
</html>