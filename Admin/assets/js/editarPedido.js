const divProdutos = document.querySelector(".container_produtos");
const produto = `<div class="produto_content d-flex flex-column produto-0">
<div class="d-flex justify-content-between align-items-center">
  <input name="modelo" id="modelo" class="modelos produto_select w-75" placeholder="Nome do Modelo" autocomplete="off" onkeyup="filtroModelo(this.value, 'produto-0')">
  <div class="listagem_items pesquisaModelo resultPesquisaModelo_produto-0"></div>
  <input type="number" name="quantidade" id="numModel" class="quantidade produto_input" placeholder="000">
</div>
<div class="d-flex justify-content-between align-items-center">
<input name="fragrancia" type="text" placeholder="Nome da Fragrância" class="fragrancias nome" id="nomeFrag" autocomplete="off" onkeyup="filtroFrag(this.value, 'produto-0')">
<div class="listagem_items pesquisaFrag resultPesquisaFrag_produto-0 "></div>
  <!-- lixeira -->
</div>
</div>`;

function excluirProduto(i) {
  $(`.${i}`).remove();
  attValor();
}

$(".produto_btn").on("click", () => {
  let novoProduto = produto;
  let idProduto = `produto-${index}`

  novoProduto = novoProduto.replace("<!-- lixeira -->", `
  <a href="javascript:excluirProduto('${idProduto}')" class="produto_lixeira">
    <img src="../assets/icons/trash-alt.svg" alt="lixeira">
  </a>`);
  novoProduto = novoProduto.replace("produto-0", idProduto);
  novoProduto = novoProduto.replace("filtroFrag(this.value, 'produto-0')", `filtroFrag(this.value, '${idProduto}')`);
  novoProduto = novoProduto.replace("filtroModelo(this.value, 'produto-0')", `filtroModelo(this.value, '${idProduto}')`);
  novoProduto = novoProduto.replace("resultPesquisaModelo_produto-0", `resultPesquisaModelo_${idProduto}`);
  novoProduto = novoProduto.replace("resultPesquisaFrag_produto-0", `resultPesquisaFrag_${idProduto}`);

  var elemento = document.createElement('div');
  elemento.innerHTML=novoProduto
  divProdutos.appendChild(elemento);

  $(".modelos").on('change',()=>{
    attValor();
  })
  $(".quantidade")
  .on('change',()=>{
    attValor();
  })
  .on('keyup',()=>{
    attValor();
  })

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

  var valor = document.getElementById('valor').value;
  valor = valor.replace('.', '');
  valor = valor.replace(',', '.');
  document.getElementById('valor').value = valor;

  var frete = document.getElementById('frete').value;
  frete = frete.replace('.', '');
  frete = frete.replace(',', '.');
  document.getElementById('frete').value = frete;

  document.querySelector(".form_pedido").action = `./functions/editar/func_editPed.php?produtos=${JSON.stringify(GET_produtos)}`;

  $(".form_pedido").trigger("submit");
}

// Mask inputs
$(document).ready(function(){
    $('.preco').mask("#.##0,00", {reverse: true, placeholder: "R$ 00,00"});
});