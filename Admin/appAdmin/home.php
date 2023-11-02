<?php
include_once('../components/header.php');
include_once('../../lib/conn.php');
include_once('../components/modalExclusao.php');

// listagem fora do modal:
  if(isset($_GET["busca__pedido"])){
    $busca = trim(strip_tags($_GET["busca__pedido"]));
    if($busca==""){
      ?>
      <meta http-equiv="refresh" content="0; url=home">
      <?php
    }
    $sql = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco WHERE c.nome LIKE '%".$busca."%' ORDER BY cod_ped DESC";
    $stmt = $conn->query($sql);
    $listPeds = $stmt->fetchAll(PDO::FETCH_OBJ);
    }else{
    $sql = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco ORDER BY cod_ped DESC";
    $stmt = $conn->query($sql);
    $listPeds = $stmt->fetchAll(PDO::FETCH_OBJ);

  }

  foreach($listPeds as $pedidos){
    $cod = $pedidos->cod_ped;
    $sql = "SELECT * FROM pedido_produto pp INNER JOIN produto p INNER JOIN modelo m INNER JOIN fragrancia f ON pp.fkcod_prod = p.cod_prod AND p.fkcod_frag = f.cod_frag AND p.fkcod_modelo = m.cod_modelo WHERE pp.fkcod_ped = :cod";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":cod", $cod);
    $stmt->execute();
    $produtos[$cod] = $stmt->fetchAll(PDO::FETCH_OBJ);
  }
// listagem dentro do modal:

$sqlModal = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco";
$stmt = $conn->query($sqlModal);
$listPedsModal = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($listPedsModal as $pedidos){
  $cod = $pedidos->cod_ped;
  $estadoPed = $pedidos->estado_pedido;
  $sql = "SELECT * FROM pedido_produto pp INNER JOIN produto p INNER JOIN modelo m INNER JOIN fragrancia f ON pp.fkcod_prod = p.cod_prod AND p.fkcod_frag = f.cod_frag AND p.fkcod_modelo = m.cod_modelo WHERE pp.fkcod_ped = :cod";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(":cod", $cod);
  $stmt->execute();
  $produtos[$cod] = $stmt->fetchAll(PDO::FETCH_OBJ);
}
  $subtotal = 0;
?>

<head>
  <link rel="stylesheet" href="../../assets/css/style_rastreamento.css">
  <link rel="stylesheet" href="../assets/css/style_home.css">
  <title>Home | Listagem Pedidos</title>
</head>

<?php
    foreach($listPedsModal as $pedido){
      foreach($produtos[$pedido->cod_ped] as $produto){
        $subtotal = $produto->sub_total;
      }
      $subtotal= str_replace(".", ",", $subtotal);
      $frete = str_replace(".", ",", $pedido->frete);
      $valorFinal = str_replace(".", ",", $pedido->valor_total);
      $dataFormatada= date("d/m/Y", strtotime($pedido->data_ped));
?>
<div class="container_modal modalCad "id="pedido_<?=$pedido->cod_ped?>">
  <div class="content_modal">
    <div class="parteEsq">
      <h2 class="tituloEsq">Dados do pedido</h2>
      <div class="atributos">
        <p class="atributo">N° pedido: <?=$pedido->cod_rastreamento?></p>
        <p class="atributo">Cliente: <?=$pedido->nome?></p>
        <p class="atributo">Sub valor: R$<?=$subtotal?></p>
        <p class="atributo">Frete: R$<?=$frete?></p>
        <p class="atributo">Valor total: R$<?=$valorFinal?></p>
      </div>
    </div>

    <div class="parteDir estado<?=$pedido->estado_pedido?>">
      <div class="linha">
        <div class="circEtapas">
          <div id="cirEtapaPag" class="circulo"></div>
          <div id="cirEtapaArt" class="circulo"></div>
          <div id="cirEtapaProd" class="circulo"></div>
          <div id="cirEtapaEnvio" class="circulo"></div>
        </div>

        <div class="linhas">
        <div id="linhaPA"></div>
        <div id="linhaAP"></div>
        <div id="linhaPE"></div>
        </div>
      </div>

      <div class="etapas">
        <div class="etapa etapaPag">
          <div id="iconPag" class="icons"></div>
          <p id="pPag">Pagamento</p>
        </div>
        <div class="etapa etapaArt">
          <div id="iconArt" class="icons"></div>
          <p id="pArt">Arte</p>
        </div>
        <div class="etapa etapaProd">
          <div id="iconProd" class="icons"></div>
          <p id="pProd">Produção</p>
        </div>
        <div class="etapa etapaEnvio">
          <div id="iconEnvio" class="icons"></div>
          <p id="pEnvio">Envio</p>
        </div>
      </div>
      
      <div class="dirInferior">
        <div class="descEtapas">
          <p>Data Pedido</p>
          <div class="hrDt">
            <p><?=$dataFormatada?></p>
            <!-- <p>--:--</p> -->
          </div>
        </div>

        <div class="endereco">
          <div class="infos">
            <div class="ruaInfo">
              <h3>Rua: </h3>
              <p><?=$pedido->logradouro?></p>
            </div>
            <div class="numeroInfo">
              <h3>N°: </h3>
              <p><?=$pedido->num?></p>
            </div>
            <div class="bairroInfo">
              <h3>Bairro: </h3>
              <p><?=$pedido->bairro?></p>
            </div>
            <div class="cidadeInfo">
              <h3>Cidade: </h3>
              <p><?=$pedido->cidade?></p>
            </div>
            <div class="cepInfo">
              <h3>CEP: </h3>
              <p><?=$pedido->cep?></p>
            </div>
            <div class="complementoInfo">
              <h3>Complemento: </h3>
              <p><?=$pedido->complemento == "" ? 'Nenhum' : $pedido->complemento ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img onclick="removeStyle()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
  </div>
</div>
<?php
    }
  ?>
<body>
  <main class="d-flex flex-column align-items-center">
    <div class="search d-flex align-items-center">
      <form class="d-flex">
      <input type="text" name="busca__pedido" id="barraBusca" placeholder="Buscar...">
      <button class="btnBuscar" type="submit">
        <img src="../../assets/img/lupa.svg" alt="">
      </button>
      </form>
      <div class="filtro_listagens">
        <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
        <div class="filtro_popover">
          <ul class="p-0 m-0">
            <li><a href="#">Pedidos</a></li>
            <li><a href="./listagemCli.php">Clientes</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container_pedidos d-flex flex-column">
    <?php
    foreach($listPeds as $pedido){
    ?>
    <div class="card-pedidos">
      <div class="card-header">
        <div class="cabecalho">
          <p class="nomeClie"><abbr title="<?=$pedido->nome?>"><?=$pedido->nome?></abbr></p>
          <div>
            <p class="data"><?=$pedido->data_ped?></p>
            <div onclick="abrirModalPedido(<?=$pedido->cod_ped?>, <?=$pedido->estado_pedido?>)" >
              <img class="imgData" src="../../assets/img/open.png" alt=""></img>
            </div>
          </div>
        </div>
        <div class="icons">
          <a onclick="editarPed(<?=$pedido->cod_ped?>)">
            <img class="caneta" src="../../Admin/assets/icons/pen.svg" alt="">
          </a>
          <a onclick="abrirModalExcluir(<?=$pedido->cod_ped?>)">
          <img class="lixeira" src="../../Admin/assets/icons/trash-alt.svg" alt=""></img>
          </a>
        </div>
        <form method="post" action="functions/editar/func_edicaoStatus.php?id=<?=$pedido->cod_ped?>">
        <select name="status" id="status" onchange="this.form.submit()">
          <option value="1" <?= $pedido->estado_pedido == 1 ? 'selected' : '' ?>>Pagamento Aprovado</option>
          <option value="2" <?= $pedido->estado_pedido == 2 ? 'selected' : '' ?>>Arte Finalizada</option>
          <option value="3" <?= $pedido->estado_pedido == 3 ? 'selected' : '' ?>>Em Produção</option>
          <option value="4" <?= $pedido->estado_pedido == 4 ? 'selected' : '' ?>>Enviado</option>
        </select>
        </form>
      </div>

      <div class="card-body">
        <div class="card-title">
          <h3 class="titulo">MODELO</h3>
            <?php
            foreach($produtos[$pedido->cod_ped] as $produto){
            ?>
          <div class="cardInfo">
            <div class="cardInfoInner d-flex justify-content-between align-items-center">
              <div class="imgModelo d-flex align-items-center">
              <img class="produto_img" src="../../upload/<?=$produto->nomeArq_modelo?>" alt="">
              </div>
              <p class="card-text"><?=$produto->nome_modelo?></p>
            </div>
          </div>
            <?php
            }
            ?>
        </div>

        <div class="card-title">
          <h3 class="titulo">FRAGRÂNCIA</h3>
          <?php
            foreach($produtos[$pedido->cod_ped] as $produto){
            ?>
          <div class="cardInfo">
            <p class="card-text"><?=$produto->nome_frag?></p>
          </div>
            <?php
            }
            ?>
        </div>

        <div class="card-title">
          <h3>QUANTIDADE</h3>
          <?php
            foreach($produtos[$pedido->cod_ped] as $produto){
            ?>
          <div class="cardInfo">
            <p class="card-text"><?=$produto->qtd_prod?></p>
          </div>
            <?php
            }
            ?>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
    </div>
  </main>
  <script src="../assets/js/style.js"></script>
  <script src="../assets/js/visualRastreamento.js"></script>
  <script src="../assets/js/modal.js"></script>
  <script src="../assets/js/modalPed.js"></script>
</body>