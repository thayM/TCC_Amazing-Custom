function abrirModal() {
  $(".modalCad").css("display", "flex");
}
function fecharModal() {
  $(".modalCad").css("display", "none");
}

$(".btnAbrirModal").on("click", () => {
  abrirModal();
});
$(".fecharCad").on("click", () => {
  fecharModal();
});