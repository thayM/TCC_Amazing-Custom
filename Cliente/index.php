<?php
// include_once('../../Admin/components/header.php');
session_start();
$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);

$valores = $_SESSION['valores'] ?? null;
unset($_SESSION['valores']);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/9dabb0ed4f.js" crossorigin="anonymous"></script>

	<link rel="shortcut icon" href="../assets/img/favicon.ico">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/style_modal.css">

    <title>Página de rastreio</title>
</head>

    <header class="d-flex align-items-center">
        <img src="../assets/img/Logo.png" alt="Logo" class="logo">
    </header>

<body>
    <main>
    <div class="forms" tabindex="-1" role="dialog">
        <div class="ladoEsq">
        <img src="assets/img/3df6ea7a81f431aebf154df61490823c.png" class="img" alt="ilustração">
        </div>
        <div class="ladoDir">
            <h2 class="titulo">Bem-vindo(a) ao rastreamento!</h2>
            <form action="functions/func_rastreio.php" method="post">
            <div class="search"> 
                <input type="text" name="codClie" id="barraBusca" placeholder="Cole seu código aqui..." value=<?= ($valores) ? $valores['codClie'] : null ?>>
                <button class="btnCod"><img src="../assets/img/lupa.svg" alt=""></button>
            </div>
            </form>
            <span style="margin-left: 20px;" class="error"><?= (isset($errors['codClie'])) ? $errors["codClie"] : null ?></span>
        </div>
    </div>
</body>
</html>