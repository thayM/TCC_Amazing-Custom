<head>
  <link rel="stylesheet" href="../assets/css/style_cadastros.css">
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <link rel="stylesheet" href="../assets/css/style_fragrancia.css">
</head>

<div class="container_modal justify-content-center align-items-center modalEdit">
  <form action="" method="POST" class="formEdit">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="fecharModalEdicao()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharEdit">
      <h3 class="msgEdicao"></h3>
      <div class="modal_input-nome">
        <label for="nomeFrag">Nome</label>
        <input type="text" id="newNome__Frag" name="newNome__frag" placeholder="Novo nome da fragrância">
      </div>
      <textarea type="text" id="newDesc__Frag" name="newDesc__frag" class="desc_frag" placeholder="Nova descrição"></textarea>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn-editar">Editar</button>
      </div>
    </div>
  </form>
</div>