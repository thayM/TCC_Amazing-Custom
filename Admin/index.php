<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/style_login.css">
  <title>Login Page</title>
</head>
<body>
  
  <div class="imgLeao">
    <img class="logoLeao" src="../assets/img/leaoamazingLogo.png" alt="brasãoLeão">
  </div>

  <div class="campos">
    <img class="logo" src="../assets/img/Logo.png" alt="logo">
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

