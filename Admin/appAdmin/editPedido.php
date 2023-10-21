<?php
include_once('../components/header.php');

require '../../lib/conn.php';

$sqlClientes = $conn->query("SELECT * FROM CLIENTE");
$clientes = $sqlClientes->fetchAll(PDO::FETCH_OBJ);

$sqlModelos = $conn->query("SELECT * FROM MODELO");
$modelos = $sqlModelos->fetchAll(PDO::FETCH_OBJ);

$sqlFragrancias = $conn->query("SELECT * FROM FRAGRANCIA");
$fragrancias = $sqlFragrancias->fetchAll(PDO::FETCH_OBJ);

$id = $_GET['id'];
$sql = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco";
$stmt = $conn->query($sql);
$listPeds = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($listPeds as $pedidos){
  $cod = $pedidos->cod_ped;
  $sql = "SELECT * FROM pedido_produto pp INNER JOIN produto p INNER JOIN modelo m INNER JOIN fragrancia f ON pp.fkcod_prod = p.cod_prod AND p.fkcod_frag = f.cod_frag AND p.fkcod_modelo = m.cod_modelo WHERE pp.fkcod_ped = :id";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(":id", $id);
  $stmt->execute();
  $produtos[$id] = $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadPedido.css">
  <title>Editar Pedido</title>
</head>

<body>
  <div class="container_form d-flex flex-column align-items-center">
    <form action="./functions/editar/func_editPed.php" method="POST" class="content_form form_pedido">
      <h3>Editando Pedido</h3>
      <div class="content_form-cliente d-flex flex-column">
        <p class="divisoria m-0">Cliente</p>
        <?php
          $qtdProd = 0;
          foreach($listPeds as $pedido){
        ?>
        <input name="cliente" value="<?=$pedido->nome?>" type="text" placeholder="Nome Completo" class="nome" id="nomeCli" onkeyup="filtroCli(this.value)">
        <div class="infomacao_cliente d-flex">
          <a href="./editCliente.php" class="editCliente d-flex align-items-center justify-content-between">
            <span>Editar</span>
            <img src="../assets/icons/pen.svg" alt="caneta_edit">
          </a>
          <div class="content_infomacao_cliente d-flex flex-column">
            <h3>Informações do cliente</h3>
            <p>Email: b@gmail.com</p>
            <p>Telefones: (13) 21313-1323/(87) 98798-7987</p>
            <div>
              <p class="endereco">Endereço: Avenida Bernardino de Campos, 222, Paraíso, São Paulo-SP</p>
              <div class="d-flex justify-content-between w-100">
                <p>CEP: 13789-789</p>
                <p class="compl">Compl: até 250 - lado par</p>
              </div>
            </div>
          </div>
        </div>
        <div class="listagem_items" id="resultPesquisaCli"></div>
      <div class="d-flex justify-content-between">
          <label for="dataPag">Data de Pagamento</label>
          <input value="<?=$pedido->data_ped?>" name="data_ped" type="date" class="data" id="dataPag">
        </div>
      </div>
      <div class="content_form-pedido  d-flex flex-column">
        <div class="content_pedido d-flex justify-content-between w-100">
          <p class="divisoria m-0">Pedido</p>

          <button type="button" class="btnAbrirModal produto_btn d-flex justify-content-between">
            Novo Produto
            <span class="produto_btn-add">+</span>
          </button>
        </div>

        <div class="produto_title d-flex justify-content-between">
          <span>Produto</span>
          <span>Quantidade</span>
        </div>
        <?php
          foreach($produtos[$pedido->cod_ped] as $produto){
        ?>
        <div class="container_produtos">
          <div class="produto_content d-flex flex-column">
            <div class="d-flex justify-content-between align-items-center">
              <input name="modelo" id="modelo" class="modelos produto_select w-75" value="<?=$produto->nome_modelo?>" onkeyup="filtroModelo(this.value, <?=$qtdProd?>)">
              <div class="listagem_items resultPesquisaModelo"></div>
              <input value="<?=$produto->qtd_prod?>" type="number" name="quantidade" id="numModel" class="quantidade produto_input" placeholder="000">
            </div>
            <div class="d-flex justify-content-between align-items-center">
            <input value="<?=$produto->nome_frag?>" name="fragrancia" type="text" placeholder="Nome da Fragrância" class="fragrancias nome" id="nomeFrag" onkeyup="filtroFrag(this.value,  <?=$qtdProd?>)">
            <div class="listagem_items resultPesquisaFrag"></div>
              <!-- lixeira -->
            </div>
          </div>
        </div>
        <?php
          $qtdProd += 1;
          }
        ?>
        <div class="produto_title d-flex justify-content-between">
          <span class="w-25">Valor</span>
          <span class="w-75">Frete</span>
        </div>
        <div class="d-flex justify-content-between">
          <input value="<?=$pedido->valor?>" name="valor" type="text" id="valor" class="preco produto_input">
          <input value="<?=$pedido->frete?>" name="frete" type="text" id="frete" class="preco produto_input">
          <select name="status" id="status" class="w-50">
          <option value="1" <?= $pedido->estado_pedido == 1 ? 'selected' : '' ?>>Pagamento Aprovado</option>
          <option value="2" <?= $pedido->estado_pedido == 2 ? 'selected' : '' ?>>Arte Finalizada</option>
          <option value="3" <?= $pedido->estado_pedido == 3 ? 'selected' : '' ?>>Em Produção</option>
          <option value="4" <?= $pedido->estado_pedido == 4 ? 'selected' : '' ?>>Enviado</option>
        </select>
        </div>
        <?php
          }
        ?>
        <div class="btn-cadastro d-flex justify-content-end p-0 w-100">
          <button onclick="enviarFormulario(<?=$id?>)" type="button" class="btn-cadastrar">ATUALIZAR</button>
        </div>
      </div>
    </form>
  </div>
  <script src="../assets/js/style.js"></script>
 <script src="../assets/js/editarPedido.js"></script> 
  <script src="../assets/js/filtroIn.js"></script>
</body>
</html>