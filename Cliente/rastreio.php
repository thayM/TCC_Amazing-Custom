<head>
<!-- CSS BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!-- CSS -->
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="./assets/css/style_rastreio.css">
<title>Página de rastreio</title>
</head>


<div class="container_modal modalCad">
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
        <img onclick="removeStyle()" src="../Admin/assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
    </div>
</div>

<body>
<header class="d-flex align-items-center">
    <img src="../assets/img/Logo.png" alt="Logo" class="logo">
</header>

<main>
    <div class="card-pedidos">
        <div class="card-header">
            <div class="cabecalho">
                <p class="nomeClie">Neusa</p>
                <div>
                    <p class="data">20/02/2020</p>
                    <div onclick="addStyle()" class="btnAbrirModal">
                        <img class="imgData" src="../assets/img/open.png" alt=""></img>
                    </div>
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

<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="../Admin/assets/js/style.js"></script>
<script src="../Admin/assets/js/modal.js"></script>
</body>