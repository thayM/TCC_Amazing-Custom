<?php
  include_once('../components/header.php');
  require "../../lib/conn.php";
  if(isset($_GET['fragExclusao']) == 1 ){
    include_once('../components/modalExclusao.php');
  }
  $sqlSelect = "SELECT * FROM fragrancia";
  $stmt = $conn->query($sqlSelect);
  $fragrancias = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadastros.css">
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <title>Cadastro Fragrância</title>
</head>
<div class="container_modal justify-content-center align-items-center">
  <form action="./functions/func_cadFrag.php" method="POST">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img src="../assets/svg/x.svg" alt="fechar" class="fechar">
      <h3>Adicionar nova fragrância</h3>
      <div class="modal_input-nome">
        <label for="nomeFrag">Nome</label>
        <input type="text" id="nome__Frag" name="nome__frag" placeholder="Nome da fragrância">
      </div>
      <textarea type="text" id="desc__Frag" name="desc__frag" placeholder="Adicione uma descrição"></textarea>
      <div class="btn-cadastro d-flex justify-content-end">
        <button type="submit" class="btn-cadastrar">Cadastrar</button>
      </div>
    </div>
  </form>
</div>

<body>
  <div class="header_pesquisa d-flex justify-content-center">
    <div class="pesquisa_input d-flex">
      <input type="text" placeholder="Buscar...">
      <button class="btn-buscar">
        <img src="../assets/svg/lupa.svg" alt="lupa">
      </button>
    </div>
    <button type="button" class="produto_btn d-flex justify-content-between">
      Adicionar Fragrância
      <span class="produto_btn-add">+</span>
    </button>
  </div>

  <div class="container_produtos d-flex justify-content-between flex-wrap">
    <?php
    foreach ($fragrancias as $fragrancia) {
    ?>
      <div class="card-produto d-flex flex-column justify-content-between">
        <div class="content_card-produto">
          <h3><?= $fragrancia->nome_frag ?></h3>
          <p><?= $fragrancia->desc_frag ?></p>
        </div>
        <div class="footer_card-produto d-flex justify-content-end">
          <button onclick="">
            <img src="../assets/svg/pen.svg" alt="editar">
          </button>
          <button>
            <a href="../appAdmin/cadFragrancia.php?fragExclusao=<?=$fragrancia->cod_frag?>">
            <img src="../assets/svg/trash-alt.svg" alt="excluir">
          </a>
          </button>
        </div>
      </div>

    <?php
    }
    ?>
  </div>
  <script src="../assets/js/modal.js"></script>
</body>
</html>