<?php
include_once('../../lib/conn.php');
$id_clie = $_GET['id'];

$sqlPeds = "SELECT  * FROM pedido p INNER JOIN cliente c INNER JOIN endereco e ON p.fkcod_cli = c.cod_cli AND c.fkcod_endereco = e.cod_endereco WHERE p.fkcod_cli = :cod ORDER BY cod_ped DESC";
$stmtPed = $conn->prepare($sqlPeds);
$stmtPed->bindValue(":cod", $id_clie);
$stmtPed->execute();
$listPeds = $stmtPed->fetchAll(PDO::FETCH_OBJ);

foreach ($listPeds as $pedidos) {
    $cod = $pedidos->cod_ped;
    $nome = $pedidos->nome;
    $sql = "SELECT * FROM pedido_produto pp INNER JOIN produto p INNER JOIN modelo m INNER JOIN fragrancia f ON pp.fkcod_prod = p.cod_prod AND p.fkcod_frag = f.cod_frag AND p.fkcod_modelo = m.cod_modelo WHERE pp.fkcod_ped = :cod";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":cod", $cod);
    $stmt->execute();
    $produtos[$cod] = $stmt->fetchAll(PDO::FETCH_OBJ);
}

$subtotal = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/9dabb0ed4f.js" crossorigin="anonymous"></script>
    
    <link rel="shortcut icon" href="../../assets/img/favicon.ico">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/style_rastreamento.css">
    
    <title>Página de rastreamento</title>
</head>
<body style="height:100vh;">
    <header class="d-flex align-items-center">
        <img src="../../assets/img/Logo.png" alt="Logo" class="logo">
    </header>
    <?php
    include('../../Admin/components/modalPedido.php');
    ?>
    <main>
        <h1 class="msg">Bem-vindo(a) <?= $nome ?></h1>
        <?php
        foreach ($listPeds as $pedido) {
            if ((int)$pedido->estado_pedido == 1) {
                $pedidoStt = 'Pagamento Aprovado';
            } else if ((int)$pedido->estado_pedido == 2) {
                $pedidoStt = 'Arte Finalizada';
            } else if ((int)$pedido->estado_pedido == 3) {
                $pedidoStt = 'Em Produção';
            } else {
                $pedidoStt = 'Enviado';
            }
            
            foreach ($produtos[$pedido->cod_ped] as $produto) {
                $subtotal = $produto->sub_total;
            }
            $subtotal = str_replace(".", ",", $subtotal);
            $frete = str_replace(".", ",", $pedido->frete);
            $valorFinal = str_replace(".", ",", $pedido->valor_total);
            $dataFormatada = date("d/m/Y", strtotime($pedido->data_ped));
        ?>
        <div class="card-pedidos">
            <div class="card-header">
                <div class="cabecalho">
                    <p class="nomeClie"><abbr title=""><?= $pedido->nome ?></abbr></p>
                    <div>
                        <p class="data"><?= $dataFormatada ?></p>
                        <div onclick="abrirModalPedido('<?= $pedido->cod_rastreamento ?>', '<?= $pedido->nome ?>', '<?= $subtotal ?>', '<?= $frete ?>', '<?= $valorFinal ?>', <?= $pedido->estado_pedido ?>,' <?= $dataFormatada ?>', '<?= $pedido->cep ?>','<?= $pedido->logradouro ?>', '<?= $pedido->num ?>', '<?= $pedido->cidade ?>','<?= $pedido->bairro ?>','<?= $pedido->complemento == '' ? 'Nenhum' : $pedido->complemento ?>')">
                        <img class="imgData" src="../../assets/img/open.png" alt=""></img>
                    </div>
                </div>
            </div>
            <div class="status">
                <p class="etapa"><?= $pedidoStt ?></p>
            </div>
        </div>
        <div class="card-body">
            <div class="card-title">
                <h3 class="titulo">MODELO</h3>
                <?php
                    foreach ($produtos[$pedido->cod_ped] as $produto) {
                        ?>
                        <div class="cardInfo">
                            <div class="cardInfoInner d-flex justify-content-between align-items-center">
                                <div class="imgModelo d-flex align-items-center justify-content-center">
                                    <img class="produto_img" src="../../upload/<?= $produto->nomeArq_modelo ?>" alt="">
                                </div>
                                <p class="card-text"><?= $produto->nome_modelo ?></p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                
                <div class="card-title">
                    <h3 class="titulo">FRAGRÂNCIA</h3>
                    <?php
                    foreach ($produtos[$pedido->cod_ped] as $produto) {
                        ?>
                        <div class="cardInfo">
                            <p class="card-text"><?= $produto->nome_frag ?>
                            
                        </p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                
                
                <div class="card-title">
                    <h3 class="titulo">QUANTIDADE</h3>
                    <?php
                    foreach ($produtos[$pedido->cod_ped] as $produto) {
                        ?>
                        <div class="cardInfo">
                            <p class="card-text"><?= $produto->qtd_prod ?></p>
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
    </main>
    
    <footer class="d-flex justify-content-around">
        <div class="footer__container d-flex justify-content-between flex-column">
            <h3 class="title">Siga nossas redes:</h3>
            <div class="footer__content d-flex flex-column">
                <a href="https://www.instagram.com/amazingcustom_perfumecar" target="_blank">
                <i class="fa-brands fa-instagram"></i>
                amazingcustom_perfumecar
            </a>
            <a href="https://www.facebook.com/AmazingCustomPerfumeCar" target="_blank">
            <i class="fa-brands fa-facebook-f"></i>
            Amazing Custom Perfume Car
                </a>
            </div>
            <h3 class="title">Acesse nosso site:</h3>
            <div class="footer__content">
                <a href="https://www.amazingcustom.com.br/" target="_blank">
                <i class="fa-solid fa-link"></i>
                amazingcustom.com.br
            </a>
            </div>
        </div>
        <div class="footer__container">
            <h3 class="title">Contato:</h3>
            <div class="footer__content d-flex flex-column">
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                    (15) 98162-2454
                </a>
                <a href="">
                    <i class="fa-regular fa-envelope"></i>
                    atendimento@amazingcustom.com.br
                </a>
            </div>
        </div>
        <div class="footer__container">
            <h3 class="title">Desenvolvido por:</h3>
            <div class="footer__content d-flex flex-column">
                <a href="https://github.com/thayM" target="_blank">Thayná Marostica</a>
                <a href="https://github.com/mygk-bea" target="_blank">Beatriz Meyagusko</a>
                <a href="https://github.com/kaikeBG" target="_blank">Kaike Grando</a>
                <a href="https://github.com/aguiarhub" target="_blank">Pedro Aguiar</a>
            </div>
        </div>

        <div class="footer_container d-flex align-items-center justify-content-between">
            <img src="../../assets/img/Logo_leao.png" alt="logo-leao" class="footer__logo-leao">
            <img src="../../assets/img/Logo.png" alt="logo" class="footer__logo">
        </div>
    </footer>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../../Admin/assets/js/style.js"></script>
    <script src="../../Admin/assets/js/modal.js"></script>
    <script src="../assets/js/modalPed.js"></script>
</body>
</html>