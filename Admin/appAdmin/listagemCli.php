<?php
  include_once('../components/header.php');
  require "../../lib/conn.php";
  $sqlSelect = "SELECT * FROM Cliente";
  $stmt = $conn->query($sqlSelect);
  $clientes = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style_admin.css">
    <link rel="stylesheet" href="../assets/css/style_listagemCli.css">
<title>Clientes</title>
</head>

<body>
<div class="search">
    <input type="text" name="" id="barraBusca" placeholder="Buscar...">
    <button class="btnBuscar"><img src="../../assets/img/lupa.svg" alt=""></button>
    <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
</div>

<div class="card">
    <?php
    foreach ($clientes as $cliente) {
    ?>
    <div class="card-body">
        <div class="coluna">
            <h3 class="card-title">Nome:<?= $cliente->nome?></h3>
            <h5 class="card-subtitle">Email:<?= $cliente->email?></h5>
        </div>
        <?php
        $telefones = explode("/",$cliente->tel);
        ?>
        <div class="coluna">
            <p class="card-text">Tel:<?=$telefones[0]?></p>
        <?php
        if ($telefones[1]!="") {
            ?> 
                <p class="card-text">Tel:<?=$telefones[1]?></p>
            <?php
        }
        ?>
        </div>

        <div class="coluna">
            <p class="card-text">Endereço:<?= $cliente->endereco?></p>
        </div>

        <div class="colunaImg">
            <img src="../assets/icons/pen.svg" alt="">
            <img src="../assets/icons/trash-alt.svg" alt="">
        </div>
    </div>
    <?php
    }
    ?>
</div>

</body>
