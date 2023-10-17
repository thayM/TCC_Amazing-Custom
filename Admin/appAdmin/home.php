<?php
include_once('../components/header.php');
include_once('../../lib/conn.php');


// fora do modal:

$sql = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco";
$stmt = $conn->query($sql);
$listPeds = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach($listPeds as $pedidos){
  var_dump($pedidos);
  $cod = $pedidos->cod_ped;
  echo $cod;
  $sql = "SELECT * FROM pedido_produto pp INNER JOIN produto p INNER JOIN modelo m INNER JOIN fragrancia f ON pp.fkcod_prod = p.cod_prod AND p.fkcod_frag = f.cod_frag AND p.fkcod_modelo = m.cod_modelo WHERE pp.fkcod_ped = :cod";
  $stmt = $conn->prepare($sql);
  $stmt->bindValue(":cod", $cod);
  $stmt->execute();
  $produtos[$cod] = $stmt->fetchAll(PDO::FETCH_OBJ);
  var_dump($produtos[$cod]);
}
?>

<head>
  <link rel="stylesheet" href="../../assets/css/style_rastreamento.css">
  <link rel="stylesheet" href="../assets/css/style_home.css">
  <title>Home | Listagem Pedidos</title>
</head>

<div class="container_modal modalCad">
  <div class="content_modal">
    <div class="parteEsq">
      <h2 class="tituloEsq">Dados do pedido</h2>
      <div class="atributos">
        <p class="atributo">N° pedido:</p>
        <p class="atributo">Cliente:</p>
        <p class="atributo">Modelo:</p>
        <p class="atributo">Fragrância:</p>
        <p class="atributo">Sub valor: R$--,--</p>
        <p class="atributo">Frete: R$--,--</p>
        <p class="atributo">Valor total: R$--,--</p>
      </div>
    </div>

    <div class="parteDir">
      <div class="linha">
        <div class="circEtapas">
          <div class="circulo"></div>
          <div class="circulo"></div>
          <div class="circulo"></div>
          <div class="circulo"></div>
        </div>
      </div>

      <div class="etapas">
        <div class="etapa etapaPag">
          <img class="icons" src="../../Cliente/assets/img/fi-sr-dollar.svg" alt="">
          <p>Pagamento</p>
        </div>
        <div class="etapa etapaArt">
          <img class="icons" src="../../Cliente/assets/img/fi-sr-edit-alt.svg" alt="">
          <p>Arte</p>
        </div>
        <div class="etapa etapaProd">
          <img class="icons" src="../../Cliente/assets/img/fi-sr-settings.svg" alt="">
          <p>Produção</p>
        </div>
        <div class="etapa etapaEnvio">
          <img class="icons" src="../../Cliente/assets/img/Vector.svg" alt="">
          <p>Envio</p>
        </div>
      </div>

      <div class="dirInferior">
        <div class="descEtapas">
          <p>Arte finalizada</p>
          <div class="hrDt">
            <p>--/--/----</p>
            <p>--:--</p>
          </div>
        </div>

        <div class="endereco">
          <div class="infos">
            <div class="ruaInfo">
              <h3>Rua:</h3>
              <p></p>
            </div>
            <div class="numeroInfo">
              <h3>N°:</h3>
              <p></p>
            </div>
            <div class="bairroInfo">
              <h3>Bairro:</h3>
              <p></p>
            </div>
            <div class="cidadeInfo">
              <h3>Cidade:</h3>
              <p></p>
            </div>
            <div class="cepInfo">
              <h3>CEP:</h3>
              <p></p>
            </div>
            <div class="complementoInfo">
              <h3>Complemento:</h3>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img onclick="removeStyle()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
  </div>
</div>

<body>
  <main>
    
    <div class="search d-flex align-items-center">
      <input type="text" name="" id="barraBusca" placeholder="Buscar...">
      <button class="btnBuscar">
        <img src="../../assets/img/lupa.svg" alt="">
      </button>
      <div class="filtro_listagens">
        <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
        <div class="filtro_popover">
          <ul class="p-0 m-0">
            <li><a href="#">Pedidos</a></li>
            <li><a href="#">Clientes</a></li>
          </ul>
        </div>
      </div>
    </div>
    <?php
    foreach($listPeds as $pedido){
    ?>
    <div class="card-pedidos">
      <div class="card-header">
        <div class="cabecalho">
          <p class="nomeClie"><?=$pedido->nome?></p>
          <div>
            <p class="data"><?=$pedido->data_ped?></p>
            <div onclick="addStyle()" class="btnAbrirModal">
              <img class="imgData" src="../../assets/img/open.png" alt=""></img>
            </div>
          </div>
        </div>
        <div class="icons">
          <a href="editPedido.php">
            <img class="caneta" src="../../Admin/assets/icons/pen.svg" alt="">
          </a>
          <img class="lixeira" src="../../Admin/assets/icons/trash-alt.svg" alt=""></img>
        </div>
        <select name="status" id="status" value="<?=$pedido->estado_pedido?>">
          <option value="">Pagamento Aprovado</option>
          <option value="">Arte Finalizada</option>
          <option value="">Em Produção</option>
          <option value="">Enviado</option>
        </select>
      </div>

      <div class="card-body">
        <div class="card-title">
          <h3 class="titulo">MODELO</h3>
          <div class="cardInfo">
            <?php
            foreach($produtos[$pedido->cod_ped] as $produto){
            ?>
            <div class="imgModelo">
            <img class="produto_img" src="../../upload/<?=$produto->nomeArq_modelo?>" alt="">
            </div>
            <p class="card-text"><?=$produto->nome_modelo?></p>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="card-title">
          <h3 class="titulo">FRAGRÂNCIA</h3>
          <div class="cardInfo">
          <?php
            foreach($produtos[$pedido->cod_ped] as $produto){
            ?>
            <p class="card-text"><?=$produto->nome_frag?></p>
            <?php
            }
            ?>
          </div>
        </div>

        <div class="card-title">
          <h3>QUANTIDADE</h3>
          <div class="cardInfo">
          <?php
            foreach($produtos[$pedido->cod_ped] as $produto){
            ?>
            <p class="card-text"><?=$produto->qtd_prod?></p>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
    <?php
    }
    ?>
  </main>
  <!-- JS BOOTSTRAP -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <!-- JQUERY -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="../assets/js/style.js"></script>
  <script src="../assets/js/modal.js"></script>
</body>