<?php
session_start();
include_once('../components/header.php');

include_once('../components/modalExclusao.php');
require '../../lib/conn.php';

$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);

include_once('../components/modalEdicaoModelo.php');
$valorModelo = $_SESSION['valor'] ?? null;
unset($_SESSION['valor']);

$nomeModelo = $_SESSION['nome'] ?? null;
unset($_SESSION['nome']);

$file = $_SESSION['file'] ?? null;
unset($_SESSION['file']);

$id= $_SESSION['id'] ?? "--";
unset($_SESSION['id']);

if (!isset($_SESSION['loggIn'])) {
  header("Location: ../index.php");
}

if(isset($_GET["busca__modelo"])){
  $busca = trim(strip_tags($_GET["busca__modelo"]));
  if($busca==""){
    ?>
    <meta http-equiv="refresh" content="0; url=cadModelo">
    <?php
  }
  $sqlSelect = "SELECT * FROM modelo WHERE nome_modelo LIKE '%".$busca."%' ORDER BY cod_modelo DESC";
  $stmt = $conn->query($sqlSelect);
  $listMods = $stmt->fetchAll(PDO::FETCH_OBJ);
}else{
  $sql = "SELECT * FROM modelo ORDER BY cod_modelo DESC";
  $stmt = $conn->query($sql);
  $listMods = $stmt->fetchAll(PDO::FETCH_OBJ);
  $busca = "";
}

?>

<head>
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <link rel="stylesheet" href="../assets/css/style_modelo.css">
  <title>Cadastro Modelo</title>
</head>

<div class="container_modal justify-content-center align-items-center modalCad">
  <form class="form_modelo" method="POST" action="./functions/func_cadMod.php" enctype="multipart/form-data">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="removeStyle()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
      <h3>Adicionar novo modelo</h3>
      <div class="modal_input-nome d-flex">
        <label for="modNome">Nome</label>
        <div class="input__field-nome d-flex flex-column">
          <input type="text" id="nome__Modelo" name="nome__Modelo" placeholder="Nome do modelo" value="<?=isset($nomeModelo)? $nomeModelo: null ?>">
          <span class="error"><?= (isset($errors['nome__Modelo'])) ? $errors["nome__Modelo"] : null ?></span>
        </div>
        
        <label for="valor">Valor</label>
        <div class="input__field-valor d-flex flex-column">
          <input type="text" id="valor__Modelo" name="valor__Modelo" class="preco" value="<?=isset($valorModelo)? $valorModelo: null?>">
          <span class="error"><?= (isset($errors['valor__Modelo'])) ? $errors["valor__Modelo"] : null ?></span>
        </div>
      </div>

      <div class="upload-area" onclick="procurarArq()">
        <div class="upload-area_border d-flex justify-content-center align-items-center">
        <p id="upload-txt">Arraste a imagem aqui</p>
      </div>
      <span class="error"><?= (isset($errors['file'])) ? $errors["file"] : null ?></span>
      </div>
      <input type="file" name="file" id="input" hidden>
      <div class="btn-cadastro d-flex justify-content-end">
        <button type="submit" class="btn-default btn-cadastrar">Cadastrar</button>
      </div>
    </div>
  </form>
</div>

<body>
  <main class="w-100 d-flex flex-column align-items-center">
    <div class="header_pesquisa d-flex">
      <form class="pesquisa_input d-flex">
        <input type="text" name="busca__modelo" class="busca" placeholder="Buscar..." value="<?=$busca?>">
        <button class="btn-buscar d-flex justify-content-center align-items-center" type="submit">
          <img src="../../assets/img/lupa.svg" alt="lupa">
        </button>
      </form>
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
  <script src="../assets/js/cadModelo.js"></script>
  
  <?php
  
  if ($id != "--") {
    ?>
    <script>
    abrirModalEditar(<?=$id?>, '<?=$nomeModelo?>', '<?=$valorModelo?>','<?=$file?>');
    </script>
    <?php
  }else if (isset($errors)) {
    ?>
    <script>
    abrirModal();
    addStyle();
    </script>
    <?php
  }
  ?>

</body>