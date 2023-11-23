<?php
session_start();
include_once('../components/header.php');

require '../../lib/conn.php';
$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);

$valores = $_SESSION["valores"][0] ?? null;
$produtos = [["", "", ""]];
if (isset($_SESSION['valores'][1])) {
  $produtos = json_decode($_SESSION['valores'][1]);
}
unset($_SESSION['valores']);
if (!isset($_SESSION['loggIn'])) {
  header("Location: ../index.php");
}
$estado = $valores['estado_pedido'] ?? 0;
$sqlClientes = $conn->query("SELECT * FROM CLIENTE");
$clientes = $sqlClientes->fetchAll(PDO::FETCH_OBJ);

$sqlModelos = $conn->query("SELECT * FROM MODELO");
$modelos = $sqlModelos->fetchAll(PDO::FETCH_OBJ);

$sqlFragrancias = $conn->query("SELECT * FROM FRAGRANCIA");
$fragrancias = $sqlFragrancias->fetchAll(PDO::FETCH_OBJ);
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadPedido.css">
  <title>Cadastro Pedido</title>
</head>

<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="./functions/func_cadPed.php" method="POST" class="content_form form_pedido">
      <h3>Novo Pedido</h3>
      <div class="content_form-cliente d-flex flex-column">
        <p class="divisoria m-0">Cliente</p>
        <div class="input__field d-flex flex-column">
          <input value="<?= ($valores) ? $valores['cliente'] : null ?>" name="cliente" type="text" placeholder="Nome Completo" class="nome" id="nomeCli" autocomplete="off" onkeyup="filtroCli(this.value)">
          <span class='error'><?= (isset($errors['cliente'])) ? $errors["cliente"] : null ?></span>
        </div>
        <div class="infomacao_cliente"></div>
        <div class="listagem_items" id="resultPesquisaCli"></div>
        <div class="data__container d-flex justify-content-between">
          <label for="dataPag">Data de Pagamento</label>
          <div class="input__field d-flex flex-column">
            <input value="<?= ($valores) ? $valores['data_ped'] : null ?>" name="data_ped" type="date" class="data" id="dataPag">
            <span class='error'><?= (isset($errors['data'])) ? $errors["data"] : null ?></span>
          </div>
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

        <div class="container_produtos">

          <div class="produto_content d-flex flex-column produto-0">
            <div class="d-flex justify-content-between align-items-center">
              <div class="input__field d-flex flex-column w-75">
                <input value="<?= $produtos[0][0] ?>" name="modelo" id="modelo" class="modelos produto_select " placeholder="Nome do Modelo" autocomplete="off" onkeyup="filtroModelo(this.value, 'produto-0')">
                <span class="error"><?= (isset($errors['modelo'][0])) ? $errors["modelo"][0] : null ?></span>
              </div>
              <div class="listagem_items pesquisaModelo resultPesquisaModelo_produto-0"></div>
              <div class="input__field-produto d-flex flex-column">
                <input value="<?= $produtos[0][2] ?>" type="number" name="quantidade" id="numModel" class="quantidade produto_input" placeholder="000">
                <span class="error"><?= (isset($errors['quantidade'][0])) ? $errors["quantidade"][0] : null ?></span>
              </div>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <div class="input__field-frag d-flex flex-column">
                <input value="<?= $produtos[0][1] ?>" name="fragrancia" type="text" placeholder="Nome da Fragrância" class="fragrancias nome" id="nomeFrag" autocomplete="off" onkeyup="filtroFrag(this.value, 'produto-0')">
                <span class="error"><?= (isset($errors['fragrancia'][0])) ? $errors["fragrancia"][0] : null ?></span>
              </div>
              <div class="listagem_items pesquisaFrag resultPesquisaFrag_produto-0 "></div>
              <!-- lixeira -->
            </div>
          </div>
          <?php
          foreach ($produtos as $key => $value) {
            if ($key > 0) {
          ?>
            <div>
              <div class="produto_content d-flex flex-column produto-<?= $key ?>">
                <div class="d-flex justify-content-between align-items-center">
                  <div class="input__field d-flex flex-column w-75">
                    <input value="<?= $value[0] ?>" name="modelo" id="modelo" class="modelos produto_select " placeholder="Nome do Modelo" autocomplete="off" onkeyup="filtroModelo(this.value, 'produto-<?= $key ?>')">
                    <span class="error"><?= (isset($errors['modelo'][$key])) ? $errors["modelo"][$key] : null ?></span>
                  </div>
                  <div class="listagem_items pesquisaModelo resultPesquisaModelo_produto-<?= $key ?>"></div>
                  <div class="input__field-produto d-flex flex-column">
                    <input value="<?= $value[2] ?>" type="number" name="quantidade" id="numModel" class="quantidade produto_input" placeholder="000">
                    <span class="error"><?= (isset($errors['quantidade'][$key])) ? $errors["quantidade"][$key] : null ?></span>
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="input__field-frag d-flex flex-column">
                    <input value="<?= $value[1] ?>" name="fragrancia" type="text" placeholder="Nome da Fragrância" class="fragrancias nome" id="nomeFrag" autocomplete="off" onkeyup="filtroFrag(this.value, 'produto-<?= $key ?>')">
                    <span class="error"><?= (isset($errors['fragrancia'][$key])) ? $errors["fragrancia"][$key] : null ?></span>
                  </div>
                  <div class="listagem_items pesquisaFrag resultPesquisaFrag_produto-<?= $key ?>"></div>
                  <a href="javascript:excluirProduto('<?=$key?>')" class="produto_lixeira">
                    <img src="../assets/icons/trash-alt.svg" alt="lixeira">
                  </a>
                </div>
              </div>
            </div>
          <?php
            }
          }
          ?>

        </div>

        <div class="produto_title d-flex justify-content-between">
          <span class="w-25">Valor</span>
          <span class="w-75">Frete</span>
        </div>
        <div class="d-flex justify-content-between">
          <div class="input__field-produto d-flex flex-column">
            <input name="valor" type="text" id="valor" disable class="preco produto_input">
            <span class='error'><?= (isset($errors['valor'])) ? $errors["valor"] : null ?></span>
          </div>
          <div class="input__field-produto d-flex flex-column">
            <input value="<?= ($valores) ? $valores['frete'] : null ?>" name="frete" type="text" id="frete" class="preco produto_input">
            <span class='error'><?= (isset($errors['frete'])) ? $errors["frete"] : null ?></span>
          </div>
          <select value="" name="estado_pedido" id="status" class="w-50">
            <option value="" selected hidden>Status do Pedido</option>
            <option value="1" <?= ($estado == 1) ? 'selected' : "" ?>>Pagamento Aprovado</option>
            <option value="2" <?= ($estado == 2) ? 'selected' : "" ?>>Arte Finalizada</option>
            <option value="3" <?= ($estado == 3) ? 'selected' : "" ?>>Em Produção</option>
            <option value="4" <?= ($estado == 4) ? 'selected' : "" ?>>Enviado</option>
          </select>
        </div>
        <div class="btn-cadastro d-flex justify-content-end p-0 w-100">
          <button type="button" class="btn-default btn-cadastrar">CADASTRAR</button>
        </div>
      </div>
    </form>
  </div>
  <script src="../assets/js/cadPedido.js"></script>
  <script src="../assets/js/filtroPedido.js"></script>
</body>
<script>
  var index = 1
  var index = <?= count($produtos) ?>
</script>

</html>