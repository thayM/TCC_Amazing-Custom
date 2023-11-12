<?php
include_once('../../lib/conn.php');
include_once('../../Admin/components/modalPedido.php');
$id_clie = $_GET['id'];

$sqlPeds = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco WHERE p.fkcod_cli = :cod ORDER BY cod_ped DESC";
$stmtPed = $conn->prepare($sqlPeds);
$stmtPed->bindValue(":cod", $id_clie);
$stmtPed->execute();
$listPeds = $stmtPed->fetchAll(PDO::FETCH_OBJ);

foreach($listPeds as $pedidos){
    $cod = $pedidos->cod_ped;
    $sql = "SELECT * FROM pedido_produto pp INNER JOIN produto p INNER JOIN modelo m INNER JOIN fragrancia f ON pp.fkcod_prod = p.cod_prod AND p.fkcod_frag = f.cod_frag AND p.fkcod_modelo = m.cod_modelo WHERE pp.fkcod_ped = :cod";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":cod", $cod);
    $stmt->execute();
    $produtos[$cod] = $stmt->fetchAll(PDO::FETCH_OBJ);
}

$subtotal = 0;
?>

<head>
<!-- CSS BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!-- CSS -->
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../../assets/css/style_rastreamento.css">
<title>Página de rastreio</title>
</head>


<!-- <div class="container_modal modalCad">
    <div class="content_modal">
        <div class="parteEsq">
            <h2 class="tituloEsq">Dados do pedido</h2>
            <div class="atributos">
            <p id="nPed" class="atributo">N° pedido:</p>
            <p id="cliente" class="atributo">Cliente:</p>
            <p id="subValor" class="atributo">Sub valor: R$--,--</p>
            <p id="frete" class="atributo">Frete: R$--,--</p>
            <p id="valorTotal" class="atributo">Valor total: R$--,--</p>
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
                    <img class="icons" src="assets/img/fi-sr-dollar.svg" alt="">
                    <p>Pagamento</p>
                </div>
                <div class="etapa etapaArt">
                    <img class="icons" src="assets/img/fi-sr-edit-alt.svg" alt="">
                    <p>Arte</p>
                </div>
                <div class="etapa etapaProd">
                    <img class="icons" src="assets/img/fi-sr-settings.svg" alt="">
                    <p>Produção</p>
                </div>
                <div class="etapa etapaEnvio">
                    <img class="icons" src="assets/img/Vector.svg" alt="">
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
        <img onclick="removeStyle()" src="../../Admin/assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
    </div>
</div> -->

<body>
<header class="d-flex align-items-center">
    <img src="../../assets/img/Logo.png" alt="Logo" class="logo">
</header>

<main>
    <h3>Bem-vindo <?=$pedido->cliente?></h3>
    <div class="container_pedidos d-flex flex-column">
        <?php
    foreach($listPeds as $pedido){
        if ((int)$pedido->estado_pedido == 1) {
            $pedidoStt='Pagamento Aprovado';
        } else if((int)$pedido->estado_pedido == 2){
            $pedidoStt= 'Arte Finalizada';
        }else if ( (int)$pedido->estado_pedido == 3 ) {
            $pedidoStt= 'Em Produção';
        }else{
            $pedidoStt= 'Enviado';
        }
        
    foreach($produtos[$pedido->cod_ped] as $produto){
        $subtotal = $produto->sub_total;
    }
    $subtotal= str_replace(".", ",", $subtotal);
    $frete = str_replace(".", ",", $pedido->frete);
    $valorFinal = str_replace(".", ",", $pedido->valor_total);
    $dataFormatada= date("d/m/Y", strtotime($pedido->data_ped));
    ?> 
        <div class="card-pedidos">
            <div class="card-header">
                <div class="cabecalho">
                    <p class="nomeClie"><abbr title=""><?=$pedido->nome?></abbr></p>
                    <div>
                        <p class="data"><?=$dataFormatada?></p>
                        <div onclick="abrirModalPedido('<?=$pedido->cod_rastreamento?>', '<?=$pedido->nome?>', '<?=$subtotal?>', '<?=$frete?>', '<?=$valorFinal?>', <?=$pedido->estado_pedido?>,' <?=$dataFormatada?>', '<?=$pedido->cep?>','<?=$pedido->logradouro?>', '<?=$pedido->num?>', '<?=$pedido->cidade?>','<?=$pedido->bairro?>','<?=$pedido->complemento == ''? 'Nenhum': $pedido->complemento?>')" >
                            <img class="imgData" src="../../assets/img/open.png" alt=""></img>
                        </div>
                    </div>
                </div>
                <div class="status">
                    <p class="etapa"><?= $pedidoStt?></p>
                </div>
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
                        <p class="card-text"><?=$produto->nome_frag?>
                    
                    </p>
                    </div>
                    <?php
                }
                ?>
                </div>


                <div class="card-title">
                    <h3 class="titulo">QUANTIDADE</h3>
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

<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../../Admin/assets/js/style.js"></script>
<script src="../../Admin/assets/js/modal.js"></script>
<script src="../assets/js/modalPed.js"></script>
</body>