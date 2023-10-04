<?php
include_once('../components/header.php');
require "../../lib/conn.php";
$sqlSelect = "SELECT * FROM Cliente INNER JOIN Endereco on fkcod_endereco = cod_endereco";
$stmt = $conn->query($sqlSelect);
$clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<head>
    <link rel="stylesheet" href="../assets/css/style_listagemCli.css">
    <title>Clientes</title>
</head>

<body>
    <div class="search">
        <input type="text" name="" id="barraBusca" placeholder="Buscar...">
        <button class="btnBuscar"><img src="../../assets/img/lupa.svg" alt=""></button>
        <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
    </div>

    <div class="container_clientes">
        <?php
        foreach ($clientes as $cliente) {
        ?>
            <div class="card">
                <div class="card-body">
                    <div class="coluna d-flex flex-column justify-content-center">
                        <h3 class="card-title">Nome: <?= $cliente->nome ?></h3>
                        <h5 class="card-subtitle">Email: <?= $cliente->email ?></h5>
                    </div>
                    <?php
                    $telefones = explode("/", $cliente->tel);
                    ?>
                    <div class="coluna">
                        <p class="card-text">Tel: <?= $telefones[0] ?></p>
                        <?php
                        if ($telefones[1] != "") {
                        ?>
                            <p class="card-text">Tel: <?= $telefones[1] ?></p>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="coluna">
                        <p class="card-text">Endereço: <?= $cliente->logradouro ?>, <?= $cliente->num ?>, <?= $cliente->bairro ?>, <?= $cliente->cidade ?>-<?= $cliente->uf ?></p>
                        <div class="card-text_complemento d-flex justify-content-between">
                            <p>CEP: <?= $cliente->cep ?></p>
                            <p class="compl">Compl: <?= $cliente->complemento ?></p>
                        </div>
                    </div>

                    <div class="colunaImg">
                        <img src="../assets/icons/pen.svg" alt="">
                        <img src="../assets/icons/trash-alt.svg" alt="">
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <script src="../assets/js/style.js"></script>
</body>