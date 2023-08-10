const modal  = document.querySelector(".container_modal");
const btn    = document.querySelector(".produto_btn");
const fechar = document.querySelector(".fechar");

function abrirModal(){
  modal.style.display = "flex";
}

function fecharModal(){
  modal.style.display = "none";
}

fecharModal();

btn.addEventListener("click", () => {
  abrirModal();
});

fechar.addEventListener("click", () => {
  fecharModal();
});