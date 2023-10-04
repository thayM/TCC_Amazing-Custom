<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!-- CSS BASICO -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/style_admin.css">
</head>

<body>
  <input type="checkbox" id="menu-responsivo">
  <div class="menu_aberto"></div>
  <header class="d-flex align-items-center justify-content-end">
    <label for="menu-responsivo" id="menu-responsivo_label"><span></span></label>

    <div class="menu d-flex align-items-center">
      <a href="../appAdmin/home.php">
        <img src="../../assets/img/Logo.png" alt="Logo" class="logo">
      </a>

      <nav>
        <ul class="nav_items d-flex justify-content-between p-0">
          <li><a href="../appAdmin/home.php" class="item">Listagens</a></li>
          <li><a href="../appAdmin/cadModelo.php" class="item">Modelos</a></li>
          <li><a href="../appAdmin/cadFragrancia.php" class="item">Fragrâncias</a></li>
          <li><a href="../appAdmin/cadCliente.php" class="item">Novo Cliente</a></li>
          <li><a href="../appAdmin/cadPedido.php" class="item">Novo Pedido</a></li>
        </ul>
      </nav>
    </div>
  </header>
</body>
<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!-- JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</html>