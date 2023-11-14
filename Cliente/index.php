<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de rastreio</title>
<!-- CSS BOOTSTRAP -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!-- JS BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="assets/css/style_modal.css">
</head>

<header class="d-flex align-items-center">
    <img src="../assets/img/Logo.png" alt="Logo" class="logo">
</header>

<body>

<div class="forms" tabindex="-1" role="dialog">
    <img src="assets/img/3df6ea7a81f431aebf154df61490823c.png" class="img" alt="ilustração">
    <div class="">
        <h2 class="titulo">Bem-vindo(a) ao rastreamento!</h2>
        <form action="functions/func_rastreio.php" method="post">
        <div class="search"> 
            <input type="text" name="codClie" id="barraBusca" placeholder="Cole seu código aqui...">
            <button class="btnCod"><img src="../assets/img/lupa.svg" alt=""></button>
        </div>
        </form>
    </div>
</div>
</body>
</html>