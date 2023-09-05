<?php
  include_once('../components/header.php');
?> 
<head>
  <link rel="stylesheet" href="../assets/css/style_home.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Home | Listagem Pedidos</title>
</head>

<body>
  <div class="search">
      <input type="text" name="" id="barraBusca" placeholder="Buscar...">
      <button class="btnBuscar"><img src="../assets/icons/lupa.svg" alt=""></button>
      <img src="../assets/icons/Filter.svg" class="imgFilter" alt="">
  </div>

  <div class="card-pedidos">
    <div class="card-header">
        <div class="cabecalho">
          <p class="nomeClie">Neusa</p>
          <div>
            <p class="data">20/02/2020</p>
          <img class="imgData" src="../../assets/img/open.png" alt=""></img>
          </div>
        </div>
        <div class="icons">
          <img class="caneta" src="../../Admin/assets/icons/pen.svg" alt=""></img>
          <img class="lixeira" src="../../Admin/assets/icons/trash-alt.svg" alt=""></img>
        </div> 
        <div class="status">
          <p class="etapa">Arte finalizada</p>
          <img class="etapaImg" src="../assets/icons/angle-down.svg" alt=""><img>
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
        <h3>QUANTIDADE</h3>
        <div class="cardInfo">
          <p class="card-text">150</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>