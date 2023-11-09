// MENSAGENS DE ERRO
function messagesError(input, index){
  let error = [
    `Campo '${input}' obrigatório*`,
    `Campo '${input}' ultrapassou o número máximo de caracteres*`,
    `Campo '${input}' inválido*`,
    `Arquivo inválido`
  ];

  let html = `<p class="error">${error[index]}</p>`;
  return html;
}

// MODAIS
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

// MODAIS -- add blur e overflow
function addStyle() {
  $("body").addClass("overflow");
  $("header").addClass("blur");
  $("main").addClass("blur");
}

function removeStyle() {
  $("body").removeClass("overflow");
  $("header").removeClass("blur");
  $("main").removeClass("blur");
}

// CARD MODELO -- imagem modelo
$(".produto_img").each(function() {
  let height = $(this).height();
  let width = $(this).width();

  if(height > width){
    $(this).css("height","100%");
  } else {
    $(this).addClass("w-100");
    $(this).css("height","min-content");
  }
});

// FECHAR MENU RESPONSIVO
$("menu-responsivo").on("click", () => {
  $("header").toggle();
});

// POPOVER HOME LISTAGENS
$(".imgFilter").on("click", () => {
  $(".filtro_popover").toggle();
});