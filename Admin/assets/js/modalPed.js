const modalExcluir = document.querySelector(".modalExcluir");
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir");

function excluirPedido(id) {
    window.location.href=`functions/excluir/func_excluirPed.php?id=${id}`
}
function abrirModalExcluir(cod) {
    modalExcluir.style.display = "flex";
    msgExclusao.textContent = `Tem certeza que quer apagar este item?`
    addStyle()
    excluir.innerHTML=`
    <button class="btn_modal excluir" onclick="excluirPedido(${cod})">
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