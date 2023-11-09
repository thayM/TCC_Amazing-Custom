const modalExcluir = document.querySelector(".modalExcluir");
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir");
const linhaDoTempo = document.querySelector(".parteDir");
const modalDiv = document.querySelector("#fecharModalPed");

function abrirModalPedido(codRastreamento,nomeCli,subTotal,frete,valorFinal,estadoPed,dataPed,cep,rua,numEnd,cidade,bairro,complemento) {
    addStyle();
    abrirModal()

    linhaDoTempo.classList.add("estado"+estadoPed);
    document.getElementById("nPed").textContent = `N° pedido: ${codRastreamento}`;
    document.getElementById("cliente").textContent = `Cliente: ${nomeCli}`;
    document.getElementById("subValor").textContent = `Subtotal: ${subTotal}`;
    document.getElementById("frete").textContent = `Frete: ${frete}`;
    document.getElementById("valorTotal").textContent = `Total: ${valorFinal}`;
    document.getElementById("dataPed").textContent = `${dataPed}`;
    document.getElementById("cep").textContent = `${cep}`;
    document.getElementById("logradouro").textContent = `${rua}`;
    document.getElementById("num").textContent = `${numEnd}`;
    document.getElementById("bairro").textContent = `${bairro}`;
    document.getElementById("cidade").textContent = `${cidade}`;
    document.getElementById("complemento").textContent = `${complemento}`;

    modalDiv.innerHTML += `<img onclick="fecharModalPed(${estadoPed})" src='../assets/icons/x.svg' alt='fechar' class='fechar'>`
}
function fecharModalPed(estadoPedido) {
    linhaDoTempo.classList.remove("estado"+estadoPedido);
    modalDiv.innerHTML= " "
    fecharModal()
    removeStyle();
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