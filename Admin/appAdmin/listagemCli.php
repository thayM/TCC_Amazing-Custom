<?php
include_once('../components/header.php');
include_once('../components/modalExclusao.php');
require "../../lib/conn.php";

if(isset($_GET["busca__cliente"])){
    $busca = trim(strip_tags($_GET["busca__cliente"]));
    if($busca==""){
      ?>
      <meta http-equiv="refresh" content="0; url=listagemCli">
      <?php
    }
    $sqlSelect = "SELECT * FROM Cliente INNER JOIN Endereco on fkcod_endereco = cod_endereco WHERE nome LIKE '%".$busca."%' ORDER BY cod_cli DESC";
    $stmt = $conn->query($sqlSelect);
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    }else{
    $sqlSelect = "SELECT * FROM Cliente INNER JOIN Endereco on fkcod_endereco = cod_endereco";
    $stmt = $conn->query($sqlSelect);
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    $busca = "";
}

?>

<head>
    <link rel="stylesheet" href="../assets/css/style_listagemCli.css">
    <title>Home | Listagem Pedidos</title>
</head>

<body>
    <div class="search d-flex align-items-center">
      <form>
      <input type="text" name="busca__cliente" id="barraBusca" placeholder="Buscar...">
      <button class="btnBuscar"type="submit">
        <img src="../../assets/img/lupa.svg" alt="">
      </button>
      </form>
        <div class="filtro_listagens">
            <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
            <div class="filtro_popover">
                <ul class="p-0 m-0">
                    <li><a href="./home.php">Pedidos</a></li>
                    <li><a href="#">Clientes</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container_clientes">
        <?php
        foreach ($clientes as $cliente) {
        ?>
            <div class="card">
                <div class="card-body">
                    <div class="coluna d-flex flex-column justify-content-center">
                        <h3 class="card-title">Nome: <?= $cliente->nome ?></h3>
                        <p class="card-text">Email: <?= $cliente->email ?></p>
                        <p class="card-text">Telefones: <?= $cliente->tel?></p>
                    </div>

                    <div class="coluna">
                        <p class="card-text">Endereço: <?= $cliente->logradouro ?>, <?= $cliente->num ?>, <?= $cliente->bairro ?>, <?= $cliente->cidade ?>-<?= $cliente->uf ?></p>
                        <div class="card-text_complemento d-flex justify-content-between">
                            <p>CEP: <?= $cliente->cep ?></p>
                            <p class="compl">Compl: <?= $cliente->complemento ?></p>
                        </div>
                    </div>

                    <div class="colunaImg">
                        <a href="./editCliente.php?id=<?=$cliente->cod_cli?>">
                            <img src="../assets/icons/pen.svg" alt="">
                        </a>
                        <a href="#" onclick="modalExcluirCliente(<?=$cliente->cod_cli?>,'<?=$cliente->nome?>')">
                            <img src="../assets/icons/trash-alt.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</body>
    <script src="../assets/js/style.js"></script>
    <script src="../assets/js/excluirCliente.js"></script>