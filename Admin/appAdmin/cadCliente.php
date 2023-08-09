<?php
  include_once('../components/header.php');
?>
<head>
  <link rel="stylesheet" href="../../assets/css/style_cadastros.css">
  <link rel="stylesheet" href="../../assets/css/style_cadCliente.css">
  <title>Cadastro Cliente</title>
</head>

<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="" method="post" class="content_form d-flex flex-column">
      <h3>Novo Cliente</h3>
      <input type="text" placeholder="Nome Completo">
      <input type="email" placeholder="E-mail">

      <div class="d-flex justify-content-between">
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" class="info_tel-input">

        <label for="telefone">Opcional:</label>
        <input type="tel" name="telefone" class="info_tel-input">
      </div>

      <div class="endereco d-flex flex-wrap">
        <input type="text" placeholder="CEP">
        <a href="" class="endereco_buscar-cep">
          <p>Não sabe o CEP?</p>
        </a>

        <div class="endereco_content d-flex justify-content-between">
          <input type="text" placeholder="Logradouro">
          <input type="text" placeholder="Número">
          <input type="text" placeholder="Bairro">
        </div>
        <div class="endereco_content d-flex justify-content-between">
          <input type="text" placeholder="Cidade">
          <input type="text" placeholder="UF">
          <input type="text" placeholder="Complemento">
        </div>
      </div>
      <div class="btn-cadastro d-flex justify-content-end p-0 w-100">
        <button class="btn-cadastrar">CADASTRAR</button>
      </div>
    </form>
  </div>
</body>
</html>