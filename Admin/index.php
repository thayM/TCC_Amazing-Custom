<!-- <header class="d-flex align-items-center justify-content-between">
  <a href="./appAdmin/home.php">
    <img src="../assets/img/Logo.png" alt="Logo" class="logo">
  </a>
  <nav>
    <ul class="nav_items d-flex justify-content-between p-0 m-0">
      <li><a href="./appAdmin/cadModelo.php" class="item">Modelo</a></li>
      <li><a href="./appAdmin/cadFragrancia.php" class="item">Fragrância</a></li>
      <li><a href="./appAdmin/cadCliente.php" class="item">Cliente</a></li>
      <li><a href="./appAdmin/cadPedido.php" class="item">Cadastro Pedidos</a></li>
      <li><a href="./appAdmin/home.php" class="item">Listagem Pedidos</a></li>
    </ul>
  </nav>
</header> -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/style_login.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <title>Login Page</title>
</head>
<body>
  
  <div class="imgLeao">
    <img class="logoLeao" src="../assets/img/leaoamazingLogo.png" alt="brasãoLeão">
  </div>

  <div class="campos">
    <img class="logo" src="assets/icons/Logo.png" alt="logo"></img>
    <form action="./functions/func_login.php" method="POST">
      <div>
        <input type="text" name="nome" id="nome" placeholder="Nome">
      </div>
      <div>
        <input type="password" name="senha" id="senha" placeholder="Senha">
      </div>
      <button class="btn" type="submit">ENTRAR</button>
    </form>
  </div>

</body>
</html>

