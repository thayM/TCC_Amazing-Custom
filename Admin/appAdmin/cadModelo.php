<?php
include_once('../components/header.php');
include_once('../components/modalEdicaoModelo.php');
include_once('../components/modalExclusao.php');
require '../../lib/conn.php';

$sql = "SELECT * FROM modelo";
$stmt = $conn->query($sql);
$listMods = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <link rel="stylesheet" href="../assets/css/style_modelo.css">
  <title>Cadastro Modelo</title>
</head>


<div class="container_modal justify-content-center align-items-center modalCad">
  <form class="box" method="POST" action="./functions/func_cadMod.php" enctype="multipart/form-data">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="removeStyle()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
      <h3>Adicionar novo modelo</h3>
      <div class="modal_input-nome ">
        <label for="modNome">Nome</label>
        <input type="text" id="nome__Modelo" name="nome__Modelo" placeholder="Nome do modelo">

        <label for="valor">Valor</label>
        <input type="text" id="valor__Modelo" name="valor__Modelo" class="preco">
      </div>

      <div class="upload-area" onclick="procurarArq()">
        <div class="upload-area_border d-flex justify-content-center align-items-center">
          <p id="upload-txt">Arraste e solte a imagem aqui</p>
        </div>
      </div>
      <input type="file" name="file" id="input" hidden>
      <div class="btn-cadastro d-flex justify-content-end">
        <button type="submit" class="btn-cadastrar">Cadastrar</button>
      </div>
    </div>
  </form>
</div>

<body>
  <main class="w-100 d-flex flex-column align-items-center">
    <div class="header_pesquisa d-flex">
      <div class="pesquisa_input d-flex">
        <input type="text" placeholder="Buscar...">
        <button class="btn-buscar">
          <img src="../../assets/img/lupa.svg" alt="lupa">
        </button>
      </div>
      <button onclick="addStyle()" type="button" class="btnAbrirModal produto_btn d-flex justify-content-between">
        Adicionar Modelo
        <span class="produto_btn-add">+</span>
      </button>
    </div>

    <div class="container_cards">
      <div class="container_produtos">
      <?php
        foreach($listMods as $listMod){
      ?>
        <div class="card-produto d-flex justify-content-between">
          <div class="card-produto_img d-flex justify-content-center align-items-center">
                <img class="produto_img" src="../../upload/<?=$listMod->nomeArq_modelo?>" alt="img_produto">
          </div>
          <div class="d-flex flex-column justify-content-between">
            <div class="content_card-produto d-flex flex-column justify-content-between">
              <h3><?=$listMod->nome_modelo?></h3>
              <p>R$<?=$listMod->valor_modelo?></p>
            </div>
            <div class="footer_card-produto d-flex justify-content-end">
              <button onclick="abrirModalEditar(<?=$listMod->cod_modelo?>, '<?=$listMod->nome_modelo?>', <?=$listMod->valor_modelo?>,'<?=$listMod->nomeArq_modelo?>')">
                <img src="../assets/icons/pen.svg" alt="editar">
              </button>
              <button onclick="abrirModalExcluir(<?=$listMod->cod_modelo?>, '<?=$listMod->nome_modelo?>')">
                <img src="../assets/icons/trash-alt.svg" alt="excluir">
              </button>
            </div>
          </div>
        </div>
        <?php
              }
            ?>
    </div> 
  </main>
  <script src="../assets/js/style.js"></script>
  <script src="../assets/js/modal.js"></script>
  <script src="../assets/js/cadModelo.js"></script>
  <script src="../assets/js/modalModelo.js"></script>
</body>