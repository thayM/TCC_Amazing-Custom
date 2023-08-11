const modal  = document.querySelector(".container_modal");
const btn    = document.querySelector(".produto_btn");
const fechar = document.querySelector(".fechar");

// Elementos para adicionar css
const body   = document.querySelector("body");
const header = document.querySelector("header");
const main   = document.querySelector("main");

function abrirModal(){
  modal.style.display = "flex";
}

function fecharModal(){
  modal.style.display = "none";
}

fecharModal();

btn.addEventListener("click", () => {
  abrirModal();
  body.classList.add("overflow");
  header.classList.add("blur");
  main.classList.add("blur");
});

fechar.addEventListener("click", () => {
  fecharModal();
  body.classList.remove("overflow");
  header.classList.remove("blur");
  main.classList.remove("blur");
});