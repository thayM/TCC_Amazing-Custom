const modalExcluir = document.querySelector(".modalExcluir");
const btnExcluir = document.querySelector(".excluir");
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir");

const modalEdicao = document.querySelector(".modalEdit");
const newNome = document.querySelector("#newNome__Frag");
const newDesc = document.querySelector("#newDesc__Frag");
const msgEdicao = document.querySelector(".msgEdicao");
const formEdit = document.querySelector(".formEdit");

$(".btn-cadastrar").on("click", () => {
  $(".formCad").trigger("submit");
  // if ($("#nome__Frag").val() == 0 || $("#nome__Frag").val() > 3 || $("#desc__Frag").val() == 0) {
  //   $("#nome__Frag").css("border", "1px solid #E02D15")
  //   let index = ($("#nome__Frag").val() == 0) ? 0 : 1;
  //   $("#nome__Frag").parent().append(messagesError("nome", index));
  // } else {
  // }
  
});

$(".btn-editar").on("click", () => {
  $(".formEdit").trigger("submit");
  // if ($("newNnome__Frag").val() == 0 || $("#newDesc__Frag").val() == 0) {
  // } else {
  // }
}); 

function excluirFrag(id) {
  window.location.href = `functions/excluir/func_excluirFrag.php?id=${id}`;
}

function abrirModalExcluir(cod, nome) {
  modalExcluir.style.display = "flex";
  msgExclusao.textContent = `Tem certeza que quer apagar item "${nome}"?`;
  addStyle();
  excluir.innerHTML = `
    <button class="btn_modal excluir" onclick="excluirFrag(${cod})">
    EXCLUIR
    </button>
    `;
}

function abrirModalEditar(cod, nome, desc) {
  addStyle();
  formEdit.action = `./functions/editar/func_editFrag.php?id=${cod}`;
  modalEdicao.style.display = "flex";
  msgEdicao.textContent = `Editando o item "${nome}"`;
  newNome.value = nome;
  newDesc.value = desc;
}
function fecharModalExcluir() {
  modalExcluir.style.display = "none";
  removeStyle();
}
function fecharModalEdicao() {
  modalEdicao.style.display = "none";
  removeStyle();
}

cancelarExcluir.addEventListener("click", () => {
  fecharModalExcluir();
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