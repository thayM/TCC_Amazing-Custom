const modalExcluir = document.querySelector(".modalExcluir");
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir");

function abrirModalPedido(target, num) {
    addStyle();
    const modal = document.querySelector("#pedido_"+target)
    modal.style.display = "flex";
    console.log("ALO");
    const codEstado = num;
    console.log(codEstado);
    visualRast(codEstado);
}

function editarPed(id) {
    console.log("pa")
    window.location.href=`editPedido.php?id=${id}`
}
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