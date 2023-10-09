const modalEdicao = document.querySelector(".modalEdit");
const modalExcluir = document.querySelector(".modalExcluir");
const newNome = document.querySelector("#nome__Modelo");
const newValor = document.querySelector("#valor__Modelo");
const msgEdicao = document.querySelector("#msg__edicao");
const formEdit = document.querySelector(".formEdit")
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir");


function abrirModalEditar(cod, nome, valor,nomeImg ) {
    addStyle()
    formEdit.action = `./functions/editar/func_editModelo.php?id=${cod}`;
    modalEdicao.style.display = "flex";
    msgEdicao.textContent = `Editando o modelo "${nome}"`;
    newNome.value = nome;
    newValor.value = valor;
    let img = `
    <div class="upload-produto_img d-flex justify-content-center align-items-center">
        <img id="img" src="../../upload/${nomeImg}" alt="upload">
    </div>
    <button class="upload-produto_alterar-img" type="button" >Alterar imagem</button>
    `;
    newAreaUpload.innerHTML = img;
}

function fecharModalEdicao() {
    modalEdicao.style.display = "none";
    removeStyle()
}
function excluirModelo(id) {
    window.location.href=`functions/excluir/func_excluirModelo.php?id=${id}`
}
function abrirModalExcluir(cod,nome) {
    modalExcluir.style.display = "flex";
    msgExclusao.textContent = `Tem certeza que quer apagar item "${nome}"?`
    addStyle()
    excluir.innerHTML=`
    <button class="btn_modal excluir" onclick="excluirModelo(${cod})">
    EXCLUIR
    </button>`
}
function fecharModalExcluir() {
    modalExcluir.style.display = "none";
    removeStyle()
}
cancelarExcluir.addEventListener("click", () => {
    fecharModalExcluir();
});