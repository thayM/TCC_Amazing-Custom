<?php
include_once('../components/header.php');
include_once('../components/modalExclusao.php');
include_once('../components/modalEdicaoFrag.php');
require "../../lib/conn.php";

if(isset($_GET["busca__frag"])){
  $busca = trim(strip_tags($_GET["busca__frag"]));
  if($busca==""){
    ?>
    <meta http-equiv="refresh" content="0; url=cadFragrancia">
    <?php
  }
  $sqlSelect = "SELECT * FROM fragrancia WHERE nome_frag LIKE '%".$busca."%' ORDER BY cod_frag DESC";
  $stmt = $conn->query($sqlSelect);
  $fragrancias = $stmt->fetchAll(PDO::FETCH_OBJ);
}else{
  $sqlSelect = "SELECT * FROM fragrancia ORDER BY cod_frag DESC";
  $stmt = $conn->query($sqlSelect);
  $fragrancias = $stmt->fetchAll(PDO::FETCH_OBJ);
  $busca = "";
}
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <link rel="stylesheet" href="../assets/css/style_fragrancia.css">
  <title>Cadastro Fragrância</title>
</head>


<div class="container_modal justify-content-center align-items-center modalCad">
  <form action="./functions/func_cadFrag.php" method="POST" class="formCad">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="removeStyle()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
      <h3>Adicionar nova fragrância</h3>
      <div class="modal_input-nome d-flex">
        <label for="nomeFrag">Nome</label>
        <div>
          <input type="text" id="nome__Frag" name="nome__frag" placeholder="Nome da fragrância">
        </div>
      </div>
      <textarea type="text" id="desc__Frag" class="desc_frag" name="desc__frag" placeholder="Adicione uma descrição"></textarea>
      <div class="btn-cadastro d-flex justify-content-end">
        <button type="button" class="btn-cadastrar">Cadastrar</button>
      </div>
    </div>
  </form>
</div>


<body>
  <main class="w-100 d-flex flex-column align-items-center">
    <div class="header_pesquisa d-flex justify-content-center">
      <form class="pesquisa_input d-flex">
        <input type="text" name="busca__frag" class="busca" placeholder="Buscar..." value="<?=$busca?>">
        <button class="btn-buscar d-flex justify-content-center align-items-center" type="submit">
          <img src="../../assets/img/lupa.svg" alt="lupa">
        </button>
      </form>
      <div class="container_btn">

        <button onclick="addStyle()" type="button" class="btnAbrirModal produto_btn d-flex justify-content-between">
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
            <div class="inner d-flex flex-column justify-content-between">
              <div class="content_card-produto">
                <h3><?= $fragrancia->nome_frag ?></h3>
                <p><?= $fragrancia->desc_frag ?></p>
              </div>
              <div class="container_btn footer_card-produto d-flex justify-content-end">
                <button onclick="abrirModalEditar(<?=$fragrancia->cod_frag?>, '<?=$fragrancia->nome_frag?>', '<?=$fragrancia->desc_frag?>')">
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
  <script src="../assets/js/style.js"></script> 
  <script src="../assets/js/cadFragrancia.js"></script>
</body>
</html>