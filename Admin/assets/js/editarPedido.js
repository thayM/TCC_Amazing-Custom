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
  novoProduto = novoProduto.replace("filtroFrag(this.value, 0)", `filtroFrag(this.value, ${index+1})`);
  novoProduto = novoProduto.replace("filtroModelo(this.value, 0)", `filtroModelo(this.value, ${index+1})`);

  divNovoProd.innerHTML = novoProduto;
  divProdutos.appendChild(divNovoProd);

  index++;
});

function enviarFormulario(cod) {
  var GET_id = cod;
  var GET_modelos = [];
  var GET_fragrancias = [];
  var GET_qtdd = [];
  var GET_produtos = [];

  $(".modelos").each(function() {
      GET_modelos.push($(this).val());
  });

  $(".fragrancias").each(function() {
      GET_fragrancias.push($(this).val());
  });

  $(".quantidade").each(function() {
      GET_qtdd.push($(this).val());
  });

  GET_modelos.forEach(function(element, i) {
      GET_produtos.push([element, GET_fragrancias[i], GET_qtdd[i], GET_id]);
  });

  console.log(GET_produtos);

  // Configurar o valor e o frete antes de enviar o formulário
  var valor = document.getElementById('valor').value;
  valor = valor.replace('.', '');
  valor = valor.replace(',', '.');
  document.getElementById('valor').value = valor;

  var frete = document.getElementById('frete').value;
  frete = frete.replace('.', '');
  frete = frete.replace(',', '.');
  document.getElementById('frete').value = frete;

  // Configurar a ação do formulário com os dados dos produtos
  document.querySelector(".form_pedido").action = `./functions/editar/func_editPed.php?produtos=${JSON.stringify(GET_produtos)}`;

  // Submeter o formulário
  $(".form_pedido").trigger("submit");
}


// var GET_modelos = [];
// var GET_fragrancias = [];
// var GET_qtdd = [];
// var GET_produtos = [];

// function enviarFormulario(cod){
// var GET_id = cod;
// $(".btn-cadastrar").on("click", () => {

//     $(".modelos").each(function() {
//     GET_modelos.push($(this)[0].value);
//     console.log(GET_modelos);
//     });

//     $(".fragrancias").each(function() {
//     GET_fragrancias.push($(this)[0].value);
//     console.log(GET_fragrancias);
//     });

//     $(".quantidade").each(function() {
//     GET_qtdd.push($(this)[0].value);
//     console.log(GET_qtdd);
//     });

//     GET_modelos.forEach((element, i) =>{
//     GET_produtos.push([element, GET_fragrancias[i], GET_qtdd[i], GET_id])
//     })
//     console.log(GET_produtos)
//     document.querySelector(".form_pedido").action = `./functions/editar/func_editPed.php?produtos=${JSON.stringify(GET_produtos)}`;

//     var valor = document.getElementById('valor').value;
//     valor = valor.replace('.', '');
//     valor = valor.replace(',', '.');
//     document.getElementById('valor').value = valor

//     var frete = document.getElementById('frete').value;
//     frete = frete.replace('.', '');
//     frete = frete.replace(',', '.');
//     document.getElementById('frete').value = frete
//     $(".form_pedido").trigger("submit")
// });
// }

// Mask inputs
$(document).ready(function(){
    $('.preco').mask("#.##0,00", {reverse: true, placeholder: "R$ 00,00"});
});