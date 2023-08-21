const modal = document.querySelector(".container_modal");
const btn = document.querySelector(".produto_btn");
const fechar = document.querySelector(".fechar");

fecharModal();
function abrirModal() {
  modal.style.display = "flex";
}
function fecharModal() {
  modal.style.display = "none";
}

btn.addEventListener("click", () => {
  abrirModal();
});
fechar.addEventListener("click", () => {
  fecharModal();
});

// Elementos para adicionar style css
const body = document.querySelector("body");
const header = document.querySelector("header");
const main = document.querySelector("main");

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
