const modal = document.querySelector(".modalCad");
const btn = document.querySelector(".produto_btn");
const fechar = document.querySelector(".fecharCad");

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