<?php
  include_once('../components/header.php');
?>
<head>
  <link rel="stylesheet" href="../assets/css/style_cadastros.css">
  <link rel="stylesheet" href="../assets/css/style_cadPedido.css">
  <title>Cadastro Pedido</title>
</head>

<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="post" class="content_form">
      <h3>Novo Pedido</h3>
      <div class="content_form-cliente d-flex flex-column">
        <p class="divisoria m-0">Cliente</p>
        <input type="text" placeholder="Nome Completo" class="nome">

        <div class="d-flex justify-content-between">
          <label for="dataPag">Data de Pagamento</label>
          <input type="date" class="data" id="dataPag">
        </div>
      </div>

      <div class="content_form-pedido  d-flex flex-column">
        <div class="content_pedido d-flex justify-content-between w-100">
          <p class="divisoria m-0">Pedido</p>

          <button type="button" class="produto_btn d-flex justify-content-between">
            Novo Produto
            <span class="produto_btn-add">+</span>
          </button>
        </div>

        <div class="produto_title d-flex justify-content-between">
          <span>Produto</span>
          <span>Quantidade</span>
        </div>

        <div class="produto_content d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <select name="modelo" id="modelo" class="produto_select w-75">
              <option value="" selected>Selecione o modelo</option>
            </select>
            <input type="number" name="numModel" id="numModel" class="produto_input" placeholder="000">
          </div>
          <select name="fragrancia" id="fragrancia" class="produto_select w-75">
            <option value="" selected>Selecione a Fragrância</option>
          </select>
        </div>

        <div class="produto_content d-flex flex-column">
          <div class="d-flex justify-content-between align-items-center">
            <select name="modelo" id="modelo" class="produto_select w-75">
              <option value="" selected>Selecione o modelo</option>
            </select>
            <input type="number" name="numModel" id="numModel" class="produto_input" placeholder="000">
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <select name="fragrancia" id="fragrancia" class="produto_select w-75">
              <option value="" selected>Selecione a Fragrância</option>
            </select>
            <a href="#" class="produto_lixeira">
              <img src="../assets/svg/trash-alt.svg" alt="lixeira">
            </a>
          </div>
        </div>

        <div class="produto_title d-flex justify-content-between">
          <span class="w-25">Valor</span>
          <span class="w-75">Frete</span>
        </div>
        <div class="d-flex justify-content-between">
          <input type="Number" id="valor" placeholder="R$ 000,00" class="produto_input">
          <input type="Number" id="frete" placeholder="R$ 000,00" class="produto_input">
          <select name="status" id="status" class="w-50">
            <option value="" selected>Status do Pedido</option>
          </select>
        </div>
        <div class="btn d-flex justify-content-end p-0 w-100">
          <button class="btn-cadastrar">CADASTRAR</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>