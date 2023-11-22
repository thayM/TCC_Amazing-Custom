<?php
include_once('../components/header.php');
include_once('../components/modalExclusao.php');
require "../../lib/conn.php";
session_start();
if (!isset($_SESSION['loggIn'])) {
  header("Location: ../index.php");
}

if(isset($GET["busca_cliente"])){
    $busca = trim(strip_tags($GET["busca_cliente"]));
    if($busca==""){
      ?>
      <meta http-equiv="refresh" content="0; url=listagemCli">
      <?php
    }
    $sqlSelect = "SELECT * FROM Cliente INNER JOIN Endereco on fkcod_endereco = cod_endereco WHERE nome LIKE '%".$busca."%' ORDER BY cod_cli DESC";
    $stmt = $conn->query($sqlSelect);
    $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
    }else{
    $sqlSelect = "SELECT * FROM Cliente INNER JOIN Endereco on fkcod_endereco = cod_endereco ORDER BY cod_cli DESC";
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
      <form class="d-flex">
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
            $parte = explode("/", $cliente->tel);
            
            if (!isset($parte[1]) || $parte[1] == "") {
                $tel = $parte[0];
                $tel = str_replace("/", " ", $tel);
            }else{
                
                $tel = $parte[0]."/".$parte[1];
            }
            
        ?>
            <div class="card">
                <div class="card-body">
                    <div class="coluna d-flex flex-column justify-content-center">
                        <h3 class="card-title">Nome: <abbr title="<?= $cliente->nome ?>"><?= $cliente->nome ?></abbr></h3>
                        <p class="card-text">Email: <abbr title="<?= $cliente->email ?>"><?= $cliente->email ?></abbr></p>
                        <p class="card-text">Telefones: <?= $tel?></p>
                    </div>

                    <div class="coluna">
                        <p class="card-text">Endereço: <?= $cliente->logradouro ?>, <?= $cliente->num ?>, <?= $cliente->bairro ?>, <?= $cliente->cidade ?>-<?= $cliente->uf ?></p>
                        <div class="card-text_complemento d-flex justify-content-between">
                            <p>CEP: <?= $cliente->cep ?></p>
                            <p class="compl">Compl: <abbr title="<?= $cliente->complemento ?>"><?= $cliente->complemento ?></abbr></p>
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
    <script src="../assets/js/style.js"></script>
    <script src="../assets/js/excluirCliente.js"></script>
</body>