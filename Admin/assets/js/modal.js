function abrirModal() {
  $(".modalCad").css("diplay", "flex");
}
function fecharModal() {
  $(".modalCad").css("diplay", "none");
}

$(".btnAbrirModal").on("click", () => {
  abrirModal();
});
$(".fecharCad").on("click", () => {
  fecharModal();
});