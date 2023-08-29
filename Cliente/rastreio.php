

<head>
    <link rel="stylesheet" href="assets/css/style_rastreio.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Página de rastreio</title>
</head>


<div class="container_modal">
    <div class="modal">
    <div class="parteEsq">
        <h2 class="tituloEsq">Dados do pedido</h2>
        <p class="atributo">N° pedido:</p>
        <p class="atributo">Cliente:</p>
        <p class="atributo">Modelo:</p>
        <p class="atributo">Fragrância:</p>
        <p class="atributo">Sub valor: R$--,--</p>
        <p class="atributo">Frete: R$--,--</p>
        <p class="atributo">Valor total: R$--,--</p>
    </div>

    <div class="parteDir">
        <div class="linha"></div>
        <div class="etapas">
            <div class="etapaPag">
                <img src="assets/img/fi-sr-dollar.svg" alt="">
                <p>Pagamento</p>
            </div>
            <div class="etapaArt">
                <img src="assets/img/fi-sr-edit-alt.svg" alt="">
                <p>Arte</p>
            </div>
            <div class="etapaProd">
                <img src="assets/img/fi-sr-settings.svg" alt="">
                <p>Produção</p>
            </div>
            <div class="etapaEnvio">
                <img src="assets/img/Vector.svg" alt="">
                <p>Envio</p>
            </div>
        </div>

        <div class="dirInferior">
        <div class="descEtapas">
            <p>Arte finalizada</p>
            <p>--/--/----</p>
            <p>--:--</p>
        </div>

        <div class="endereco">
            <p>Rua:</p>
            <p>N°:</p>
            <p>Bairro:</p>
            <p>Cidade:</p>
            <p>CEP:</p>
            <p>Complemento:</p>
        </div>
        </div>
    </div>

<button onclick="removeStyle()" class="fechar">fechar</button>
</div>
</div>

<body>
<header class="d-flex align-items-center justify-content-between">
    <a href="../appAdmin/home.php">
      <img src="../assets/img/Logo.png" alt="Logo" class="logo">
    </a>

  </header>

<main>
    <div class="card-pedidos">
        <div class="card-header">
            <div class="cabecalho">
                <p class="nomeClie">Neusa</p>
            <div onclick="addStyle()" class="produto_btn">
                <p class="data">20/02/2020</p>
                <img class="imgData" src="../assets/img/🦆 icon _Alternate External Link_.png" alt=""></img>
            </div>
            </div>
            <div class="status">
                <p class="etapa">Arte finalizada</p>
            </div>
        </div>

    <div class="card-body">
        <div class="card-title">
            <h3 class="titulo">MODELO</h3>
            <div class="cardInfo">
                <img src="" alt="">
                <p class="card-text">Quadrado</p>
            </div>
        </div>

    <div class="card-title">
        <h3 class="titulo">FRAGRÂNCIA</h3>
        <div class="cardInfo">
            <p class="card-text">Gold</p>
        </div>
    </div>

    <div class="card-title">
        <h3 class="titulo">QUANTIDADE</h3>
        <div class="cardInfo">
            <p class="card-text">150</p>
        </div>
    </div>
    </div>
</div>
</main>
<script src="../Admin/assets/js/modal.js"></script>
</body>