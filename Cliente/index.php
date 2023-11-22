<?php
session_start();
$errors = $_SESSION['errors'] ?? null;
unset($_SESSION['errors']);
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

<body>
    <header class="d-flex align-items-center">
        <img src="../assets/img/Logo.png" alt="Logo" class="logo">
    </header>
    <main>
        <div class="forms" tabindex="-1" role="dialog">
            <div class="ladoEsq">
            <img src="assets/img/3df6ea7a81f431aebf154df61490823c.png" class="img" alt="ilustração">
            </div>
            <div class="ladoDir d-flex flex-column align-items-center">
                <h2 class="titulo">Bem-vindo(a) ao rastreamento!</h2>
                <form action="functions/func_rastreio.php" method="post">
                <div class="input__field d-flex flex-column">
                    <div class="search"> 
                        <input type="text" name="codigo__Clie" id="barraBusca" placeholder="Cole seu código aqui...">
                        <button class="btnCod"><img src="../assets/img/lupa.svg" alt=""></button>
                    </div>
                    <span class="error"><?= (isset($errors['codigo__Clie'])) ? $errors["codigo__Clie"] : null ?></span>
                </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="d-flex justify-content-around">
        <div class="footer__container d-flex justify-content-between flex-column">
            <h3 class="title">Siga nossas redes:</h3>
            <div class="footer__content d-flex flex-column">
                <a href="https://www.instagram.com/amazingcustom_perfumecar" target="_blank">
                <i class="fa-brands fa-instagram"></i>
                amazingcustom_perfumecar
            </a>
            <a href="https://www.facebook.com/AmazingCustomPerfumeCar" target="_blank">
            <i class="fa-brands fa-facebook-f"></i>
            Amazing Custom Perfume Car
                </a>
            </div>
            <h3 class="title">Acesse nosso site:</h3>
            <div class="footer__content">
                <a href="https://www.amazingcustom.com.br/" target="_blank">
                <i class="fa-solid fa-link"></i>
                amazingcustom.com.br
            </a>
            </div>
        </div>
        <div class="footer__container">
            <h3 class="title">Contato:</h3>
            <div class="footer__content d-flex flex-column">
                <a href="">
                    <i class="fa-brands fa-whatsapp"></i>
                    (15) 98162-2454
                </a>
                <a href="">
                    <i class="fa-regular fa-envelope"></i>
                    atendimento@amazingcustom.com.br
                </a>
            </div>
        </div>
        <div class="footer__container">
            <h3 class="title">Desenvolvido por:</h3>
            <div class="footer__content d-flex flex-column">
                <a href="https://github.com/thayM" target="_blank">Thayná Marostica</a>
                <a href="https://github.com/mygk-bea" target="_blank">Beatriz Meyagusko</a>
                <a href="https://github.com/kaikeBG" target="_blank">Kaike Grando</a>
                <a href="https://github.com/aguiarhub" target="_blank">Pedro Aguiar</a>
            </div>
        </div>

        <div class="footer_container d-flex align-items-center justify-content-between">
            <img src="../assets/img/Logo_leao.png" alt="logo-leao" class="footer__logo-leao">
            <img src="../assets/img/Logo.png" alt="logo" class="footer__logo">
        </div>
    </footer>
</body>
</html>