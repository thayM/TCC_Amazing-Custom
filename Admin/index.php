<header class="d-flex align-items-center justify-content-between">
    <a href="./appAdmin/home.php">
      <img src="../assets/img/Logo.png" alt="Logo" class="logo">
    </a>
    <nav>
      <ul class="nav_items d-flex justify-content-between p-0 m-0">
        <li><a href="./appAdmin/cadModelo.php" class="item">Modelo</a></li>
        <li><a href="./appAdmin/cadFrag.php" class="item">Fragrância</a></li>
        <li><a href="./appAdmin/cadCliente.php" class="item">Cliente</a></li>
        <li><a href="./appAdmin/cadPedido.php" class="item">Cadastro Pedidos</a></li>
        <li><a href="./appAdmin/home.php" class="item">Listagem Pedidos</a></li>
      </ul>
    </nav>
  </header>

  <form action="./functions/func_login.php" method="POST">
    <div>
      <input type="text" name="nome" id="nome">
      <label for="nome">Nome:</label>
    </div>
    <div>
      <input type="password" name="senha" id="senha">
      <label for="senha">Senha:</label>
    </div>
    <button type="submit">Logar</button>
  </form>