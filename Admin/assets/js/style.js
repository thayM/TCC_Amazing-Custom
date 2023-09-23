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

  (height > width) ? $(this).addClass("h-100") : $(this).addClass("w-100");
});

// CARD FRAGRÂNCIA -- animação altura
$(".inner").each(function(i) {
  let heightTitle = $(".content_card-produto>h3")[i].offsetHeight;
  let heightText  = $(".content_card-produto>p")[i].offsetHeight;
  let heightSum = heightText + heightTitle;
  let minHeightSum = 87;

  if(heightSum > minHeightSum) {
    $(this).addClass("aumentarCard");
    $(this).on("mouseover", () => {$(this).css("min-height",`calc(165px + (${heightSum}px - 87px))`);});
    $(this).on("mouseout", () => {$(this).css("min-height","165px")});
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