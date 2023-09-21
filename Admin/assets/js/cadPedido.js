const divProdutos = document.querySelector(".container_produtos");
const produto = divProdutos.innerHTML;
var index = 0;

function excluirProduto(i) {
  const produtos = document.querySelectorAll(".novo_produto");
  produtos[i].remove();

  const lixeirasProd = document.querySelectorAll(".produto_lixeira");
  lixeirasProd.forEach((element, i) => {
    element.href = `javascript:excluirProduto(${i})`;
  });

  index--;
}

$(".produto_btn").on("click", () => {
  var novoProduto = produto;
  let divNovoProd = document.createElement("div");
  divNovoProd.classList.add("novo_produto");

  novoProduto = novoProduto.replace("<!-- lixeira -->", `
  <a href="javascript:excluirProduto(${index})" class="produto_lixeira">
    <img src="../assets/icons/trash-alt.svg" alt="lixeira">
  </a>`);

  divNovoProd.innerHTML = novoProduto;
  divProdutos.appendChild(divNovoProd);

  index++;
});