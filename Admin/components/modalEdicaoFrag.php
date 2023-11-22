
<div class="container_modal justify-content-center align-items-center modalEdit">
  <form action="" method="POST" class="formEdit">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="fecharModalEdicao()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharEdit">
      <h3 class="msgEdicao"></h3>
      <div class="modal_input-nome d-flex">
        <label for="nomeFrag">Nome</label>
        <div class="input__field d-flex flex-column">
          <input type="text" id="newNome__Frag" name="newNome__frag" placeholder="Novo nome da fragrância">
          <span class="error"><?= (isset($errors['newNome__frag'])) ? $errors["newNome__frag"] : null ?></span>
        </div>
      </div>
      <textarea type="text" id="newDesc__Frag" name="newDesc__frag" class="desc_frag" placeholder="Nova descrição"></textarea>
      <span class="error"><?= (isset($errors['newDesc__frag'])) ? $errors["newDesc__frag"] : null ?></span>
      <div class="d-flex justify-content-end">
        <button type="submit" class="btn-default btn-editar">Editar</button>
      </div>
    </div>
  </form>
</div>