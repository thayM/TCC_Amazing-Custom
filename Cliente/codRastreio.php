<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de rastreio</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_modal.css">
</head>
<body>

<div class="modal" tabindex="-1" role="dialog">
    <img src="assets/img/wepik-export-20230522104437k8p5 1.png" class="img" alt="ilustração">
    <div class="modal-body">
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