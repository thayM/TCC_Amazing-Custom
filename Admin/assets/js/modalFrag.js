const modalExcluir = document.querySelector(".modalExcluir");
const btnExcluir = document.querySelector(".excluir");
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir")

const modalEdicao = document.querySelector(".modalEdit")
const newNome = document.querySelector("#newNome__Frag")
const newDesc = document.querySelector("#newDesc__Frag")
const msgEdicao = document.querySelector(".msgEdicao");
const formEdit = document.querySelector(".formEdit")


function excluirFrag(id){
    window.location.href=`functions/excluir/func_excluirFrag.php?id=${id}`
}

function abrirModalExcluir(cod, nome) {
    modalExcluir.style.display = "flex";
    msgExclusao.textContent = `Tem certeza que quer apagar item "${nome}"?`
    addStyle()
    excluir.innerHTML=`
    <button class="btn_modal excluir" onclick="excluirFrag(${cod})">
    EXCLUIR
    </button>
    `
}

function abrirModalEditar(cod, nome, desc) {
    addStyle()
    formEdit.action = `./functions/editar/func_editFrag.php?id=${cod}`;
    modalEdicao.style.display = "flex";
    msgEdicao.textContent = `Editando o item "${nome}"`;
    newNome.value = nome;
    newDesc.value = desc;
}  
function fecharModalExcluir() {
    modalExcluir.style.display = "none";
    removeStyle()
}
function fecharModalEdicao() {
    modalEdicao.style.display = "none";
    removeStyle()
}

cancelarExcluir.addEventListener("click", () => {
    fecharModalExcluir();
});