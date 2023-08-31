<?php
include_once('../components/header.php');
include_once('../components/modalExclusao.php');

require "../../lib/conn.php";
$sqlSelect = "SELECT * FROM fragrancia";
$stmt = $conn->query($sqlSelect);
$fragrancias = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadastros.css">
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <link rel="stylesheet" href="../assets/css/style_fragrancia.css">
  <title>Cadastro Fragrância</title>
</head>


<div class="container_modal justify-content-center align-items-center modalCad">
  <form action="./functions/func_cadFrag.php" method="POST">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="removeStyle()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
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
  <main class="w-100 d-flex flex-column align-items-center">
    <div class="header_pesquisa d-flex justify-content-center">
      <div class="pesquisa_input d-flex">
        <input type="text" placeholder="Buscar...">
        <button class="btn-buscar">
          <img src="../assets/icons/lupa.svg" alt="lupa">
        </button>
      </div>
      <div class="container_btn">

        <button onclick="addStyle()" type="button" class="produto_btn d-flex justify-content-between">
          Adicionar Fragrância
          <span class="produto_btn-add">+</span>
        </button>
      </div>
    </div>

    <div class="container_cards">
      <div class="container_produtos">
        <?php
        foreach ($fragrancias as $fragrancia) {
        ?>
          <div class="card-produto d-flex flex-column justify-content-between">
            <div class="inner">
            <div class="content_card-produto">
              <h3><?= $fragrancia->nome_frag ?></h3>
              <p><?= $fragrancia->desc_frag ?></p>
            </div>
            <div class="container_btn footer_card-produto d-flex justify-content-end">
              <button>
                <img src="../assets/icons/pen.svg" alt="editar">
              </button>
              <button onclick="abrirModalExcluir(<?=$fragrancia->cod_frag?>, '<?=$fragrancia->nome_frag?>')">
              <img src="../assets/icons/trash-alt.svg" alt="excluir">
              </button>
            </div>
            </div>
          </div>

        <?php
        }
        ?>
      </div>
    </div>
  </main>
  <script src="../assets/js/modal.js"></script>
  <script src="../assets/js/modalFrag.js"></script>
</body>
</html>