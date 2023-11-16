<div class="container_modal justify-content-center align-items-center modalEdit">
  <form class="box formEdit" method="POST" action="" enctype="multipart/form-data">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img onclick="fecharModalEdicao()" src="../assets/icons/x.svg" alt="fechar" class="fechar fecharCad">
      <h3 id="msg__edicao"></h3>
      <div class="modal_input-nome">
        <label for="newNome__Modelo">Nome</label>
        <input type="text" id="nome__Modelo" name="newNome__Modelo" placeholder="Nome do modelo">
        <label for="newValor__Modelo">Valor</label>
        <input type="text" id="valor__Modelo" name="newValor__Modelo" class="preco">
      </div>

      <div class="new-upload-area" onclick="newProcurarArq()">
        <div class="upload-area_border d-flex justify-content-center align-items-center"></div>
      </div>
      <input type="file" name="file" id="newInput" hidden>
      <div class="btn-cadastro d-flex justify-content-end">
        <button type="submit" class="btn-default btn-cadastrar">Editar</button>
      </div>
    </div>
  </form>
</div>