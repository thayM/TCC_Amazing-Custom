<?php
session_start();

$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- BOOTSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

  <!-- CSS -->
	<link rel="shortcut icon" href="../assets/img/favicon.ico">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/style_login.css">

  <title>Login Page</title>
</head>
<body>
  <div class="container d-flex justify-content-between align-items-center flex-wrap">

    <div class="imgLeao d-flex justify-content-center align-items-end">
      <img class="logoLeao" src="../assets/img/Logo_leao.png" alt="brasãoLeão">
      <span>Amazing Custom &reg;</span>
    </div>
  
    <div class="container_form">
      <div class="campos d-flex flex-column align-items-center justify-content-around">
        <img class="logo" src="../assets/img/Logo.png" alt="logo">
        <form action="./functions/func_login.php" method="POST">
          <div class="content__form d-flex flex-column align-items-center justify-content-between">
            <input type="text" name="nome" id="nome" placeholder="Nome">
            <div class="input__field d-flex flex-column justify-content-between">
              <input type="password" name="senha" id="senha" placeholder="Senha">
              <span class="error"><?= (isset($errors)) ? $errors : null ?></span>
            </div>
            <button class="btn-default btn-cadastrar" type="submit">ENTRAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>

