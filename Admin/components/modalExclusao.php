<head>
  <link rel="stylesheet" href="../assets/css/style_cadastros.css">
</head>

<div class="container_modal-php justify-content-center align-items-center modalExcluir">
  <div class="content_modal-php d-flex justify-content-between flex-column">
    <h3 class="msgExclusao"></h3>
    <p>Esta opção não poderá ser desfeita.</p>
    <div class="d-flex justify-content-around" onclick="fecharModalExcluir()">
      <button class="btn_modal cancelar">
        CANCELAR
      </button>
      <div class="divExcluir">
        <button class="btn_modal excluir" onclick="fecharModalExcluir()">
          EXCLUIR
        </button>
      </div>
    </div>
  </div>
</div>