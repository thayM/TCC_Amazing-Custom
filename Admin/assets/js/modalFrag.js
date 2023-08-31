const modalExcluir = document.querySelector(".modalExcluir");
const btnExcluir = document.querySelector(".excluir");
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusão = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir")


fecharModalExcluir();
function excluirFrag(id){
    window.location.href=`functions/excluir/func_excluirFrag.php?id=${id}`
}

function abrirModalExcluir(cod, nome) {
    modalExcluir.style.display = "flex";
    msgExclusão.textContent = `Tem certeza que quer apagar item ${nome}?`
    addStyle()
    excluir.innerHTML=`
    <button class="btn_modal excluir" onclick="excluirFrag(${cod})">
    EXCLUIR
    </button>
    `
}  
function fecharModalExcluir() {
    modalExcluir.style.display = "none";
    removeStyle()
}

cancelarExcluir.addEventListener("click", () => {
    fecharModalExcluir();
});    



// Elementos para adicionar style css

function addStyle() {
    body.classList.add("overflow");
    header.classList.add("blur");
    main.classList.add("blur");
}

function removeStyle() {
    body.classList.remove("overflow");
    header.classList.remove("blur");
    main.classList.remove("blur");
}
