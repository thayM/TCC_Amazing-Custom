const divProdutos = document.querySelector(".container_produtos");
const produto = divProdutos.innerHTML;
var index = 0;

// function excluirProduto(i) {
//   var ArProdutos = document.querySelectorAll(".produto_content");

//   console.log(ArProdutos);
//   console.log(index)

//   ArProdutos.splice(i, 1)[0];

//   ArProdutos = document.querySelectorAll(".produto_content");
//   console.log(ArProdutos);

// }

$(".produto_btn").on("click", () => {
  var novoProduto = produto;
  index++;

  novoProduto = novoProduto.replace("<!-- lixeira -->", `
  <a href="javascript:excluirProduto(${index})" class="produto_lixeira">
    <img src="../assets/icons/trash-alt.svg" alt="lixeira">
  </a>`);

  divProdutos.innerHTML += novoProduto;
});