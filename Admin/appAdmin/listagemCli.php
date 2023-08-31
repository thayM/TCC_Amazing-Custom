<?php
  include_once('../components/header.php');
?>

<head>
<link rel="stylesheet" href="../../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/style_listagemCli.css">
<title>Clientes</title>
</head>

<body>
<div class="search">
    <input type="text" name="" id="barraBusca" placeholder="Buscar...">
    <button class="btnBuscar"><img src="../assets/icons/lupa.svg" alt=""></button>
    <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
</div>

<div class="card">
    <div class="card-body">
        <div class="coluna">
            <h3 class="card-title">José da Silva</h3>
            <h5 class="card-subtitle">josedasilva928@gmail.com</h5>
        </div>

        <div class="coluna">
            <p class="card-text">Tel 1: 15 99999-9999</p>
            <p class="card-text">Tel 2: 15 99999-9999</p>
        </div>

        <div class="coluna">
            <p class="card-text">Rua Domingos dos Santos Filho, 1110, Vila Dr. Laurindo, Tatuí-SP</p>

            <div class="infoBaixo">
            <p class="card-text">CEP: 12039-293</p>
            <p class="card-text">Compl: casa</p>
            </div>
        </div>

        <div class="colunaImg">
            <img src="../assets/icons/pen.svg" alt="">
            <img src="../assets/icons/trash-alt.svg" alt="">
        </div>
    </div>
</div>

</body>
