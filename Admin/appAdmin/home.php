<?php
  include_once('../components/header.php');
?>
<head>
  <link rel="stylesheet" href="../assets/css/style_home.css">
  <title>Home | Listagem Pedidos</title>
</head>

<body>
  <div class="search">
      <input type="text" name="" id="barraBusca" placeholder="Buscar...">
      <button class="btn"><img src="../assets/icons/group.svg" alt=""></button>
  </div>

  <div class="card pedidos">
    <div class="card-header">
        <div class="cabecalho">
          <p class="nomeClie">Neusa</p>
          <div>
            <p class="data">20/02/2020</p>
          <img class="imgData" src="../../assets/img/🦆 icon _Alternate External Link_.png" alt=""></img>
          </div>
        </div>
        <div class="icons">
          <img class="caneta" src="../../assets/icons/pen.png" alt=""></img>
          <img class="lixeira" src="../../assets/icons/trash-can-solid.svg" alt=""></img>
        </div> 
        <div class="status">
          <p class="etapa">Arte finalizada</p>
          <img class="etapaImg" src="../assets/icons/angle-down.svg" alt=""><img>
        </div>
      </div>

    <div class="card-body">
      <div class="card-title">
        <h3>MODELO</h3>
        <div class="cardInfo">
            <img src="" alt="">
            <p class="card-text">Quadrado</p>
        </div>
      </div>

      <div class="card-title">
        <h3 class="titulo">FRAGRÂNCIA</h3>
        <div class="cardInfo">
          <p class="card-text divInfo">Gold</p>
        </div>
      </div>

      <div class="card-title">
        <h3 class="titulo">QUANTIDADE</h3>
        <div class="cardInfo">
          <p class="card-text divInfo2">150</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>