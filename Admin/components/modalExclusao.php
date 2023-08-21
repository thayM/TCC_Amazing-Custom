<?php
if (isset($_GET['fragExclusao'])) {
  $id = $_GET['fragExclusao'];
  $tabela = "fragrancia";
  $codigo = "cod_frag";
}
if (isset($_GET['modeloExclusao'])) {
  $id = $_GET['modeloExclusao'];
  $tabela = "modelo";
  $codigo = "cod_modelo";
}
?>

<div class="container_modal-php d-flex justify-content-center align-items-center">
  <div class="content_modal-php d-flex justify-content-between flex-column">
    <h3>Tem certeza que quer apagar item xxx?</h3>
    <p>Esta opção não podera ser desfeita.</p>
    <div class="d-flex justify-content-around">
      <button class="btn_modal cancelar">
        <a href="../appAdmin/cadFragrancia.php">CANCELAR</a>
      </button>
      <button class="btn_modal excluir">
        <a href="../appAdmin/functions/func_excluir.php?id=<?= $id ?>&tabela=<?= $tabela ?>&codigo=<?= $codigo ?>">EXCLUIR</a>
      </button>
    </div>
  </div>
</div>