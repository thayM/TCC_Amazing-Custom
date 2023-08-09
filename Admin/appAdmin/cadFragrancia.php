<?php
  include_once('../components/header.php');
  require "../../lib/conn.php";
  $sqlSelect = "SELECT * FROM fragrancia";
  $stmt = $conn->query($sqlSelect);
  $fragrancias = $stmt->fetchAll(PDO::FETCH_OBJ)
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
        <button>add Fragrancia</button>
    </div>
    <div>
        <?php
        foreach($fragrancias as $frafrancia){
        ?>
            <div>
                <div>
                    <h3><?=$frafrancia->nome_frag?></h3>
                    <p><?=$frafrancia->desc_frag?></p>
                </div>
                <div>
                    <button>lapis</button>
                    <button>lixeira</button>
                </div>
            </div>
            
        <?php
        }
        ?>
    </div>
</body>
</html>
