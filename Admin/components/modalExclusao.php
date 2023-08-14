<?php
    if(isset($_GET['fragExclusao'])){
        $id = $_GET['fragExclusao'];
        $tabela = "fragrancia";
        $codigo = "cod_frag";
    }
    if(isset($_GET['modeloExclusao'])){
        $id = $_GET['modeloExclusao'];
        $tabela = "modelo";
        $codigo = "cod_modelo";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>
        <h2>Tem certeza?</h2>
        <span>Esta opção não podera ser desfeita</span>
        <div>
            <button><a href="../appAdmin/cadFragrancia.php">CANCELAR</a></button>
            <button><a href="../appAdmin/functions/func_excluir.php?id=<?=$id?>&tabela=<?=$tabela?>&codigo=<?=$codigo?>">EXCLUIR</a></button>
        </div>
    </div>
</body>
</html>