<?php
  include_once('../components/header.php');
?>
<head>
    <title>cadFragancia</title>
</head>
<body>
    <form action="./functions/func_cadFrag.php" method="POST">
        <div>
            <div>
                <label for="nomeFrag">Nome:</label>
                <input type="text" id="nome__Frag" name="nome__frag" placeholder="Nome">
            </div>
            <input type="text" id="desc__Frag" name="desc__frag" placeholder="Adicione uma descrição">
            <button type="submit">Cadastrar</button>
        </div>
    </form>
    <div>
        <div>
            <input type="text">
            <button>lupa</button>
        </div>
        <button>add Fragancia</button>
    </div>
    <div>
        <div>
            <div>
                <h3>Gold</h3>
                <p>tom amadeirado, feminino</p>
            </div>
            <div>
                <button>lapis</button>
                <button>lixeira</button>
            </div>
        </div>
        <div>
            <div>
                <h3>Gold</h3>
                <p>tom amadeirado, feminino</p>
            </div>
            <div>
                <button>lapis</button>
                <button>lixeira</button>
            </div>
        </div>
    </div>
</body>
</html>
