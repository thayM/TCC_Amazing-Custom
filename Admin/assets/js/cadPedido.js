// CAD PEDIDO
const divProdutos = document.querySelector(".container_produtos");
const produto = divProdutos.innerHTML;
var respostaGetValor =[]
var index = 0;

async function getValor(modeloNome) {
  let require = await fetch('../appAdmin/functions/getValues/getValorModelo.php?value='+modeloNome);
  let data = await require.json();
  data["dados"].forEach((valor)=>{
    respostaGetValor[valor["nome_modelo"]]=valor["valor_modelo"];
  })
}
getValor()

function attValor() {
  let valor = []
  let qttd = []
  let valorFinal = 0
  $(".quantidade").each(function (){
    qttd.push((this).value)
  })
  $(".modelos").each(function (){
    let nome_modelo = ((this).value);
    valor.push(respostaGetValor[nome_modelo]);
  })
  valor.forEach((element,i)=>{
    valorFinal+=element*qttd[i]
  })
  console.log(valorFinal)
  if(valorFinal){
    $("#valor")[0].value=valorFinal
  }
}

function excluirProduto(i) {
  const produtos = document.querySelectorAll(".novo_produto");
  produtos[i].remove();

  const lixeirasProd = document.querySelectorAll(".produto_lixeira");
  lixeirasProd.forEach((element, i) => {
    element.href = `javascript:excluirProduto(${i})`;
  });

  index--;
}

$(".quantidade").on('change', ()=>{
  attValor();
})

$(".modelos").on('change',()=>{
  attValor();
})

$(".produto_btn").on("click", () => {
  var novoProduto = produto;
  let divNovoProd = document.createElement("div");
  divNovoProd.classList.add("novo_produto");

  novoProduto = novoProduto.replace("<!-- lixeira -->", `
  <a href="javascript:excluirProduto(${index})" class="produto_lixeira">
    <img src="../assets/icons/trash-alt.svg" alt="lixeira">
  </a>`);
  novoProduto = novoProduto.replace("filtroFrag(this.value, 0)", `filtroFrag(this.value, ${index + 1})`);
  novoProduto = novoProduto.replace("filtroModelo(this.value, 0)", `filtroModelo(this.value, ${index + 1})`);

  divNovoProd.innerHTML = novoProduto;
  divProdutos.appendChild(divNovoProd);

  index++;
});

$(".btn-cadastrar").on("click", () => {
  let GET_modelos = [];
  let GET_fragrancias = [];
  let GET_qtdd = [];
  let GET_produtos = [];

  $(".modelos").each(function () {
    GET_modelos.push($(this)[0].value);
    console.log(GET_modelos);
  });

  $(".fragrancias").each(function () {
    GET_fragrancias.push($(this)[0].value);
    console.log(GET_fragrancias);
  });

  $(".quantidade").each(function () {
    GET_qtdd.push($(this)[0].value);
    console.log(GET_qtdd);
  });

  GET_modelos.forEach((element, i) => {
    GET_produtos.push([element, GET_fragrancias[i], GET_qtdd[i]])
  })
  console.log(GET_produtos)
  document.querySelector(".form_pedido").action = `./functions/func_cadPed.php?produtos=${JSON.stringify(GET_produtos)}`;

  let valor = document.getElementById('valor').value;
  valor = valor.replace('.', '');
  valor = valor.replace(',', '.');
  document.getElementById('valor').value = valor

  let frete = document.getElementById('frete').value;
  frete = frete.replace('.', '');
  frete = frete.replace(',', '.');
  document.getElementById('frete').value = frete

  attValor();
  $(".form_pedido").trigger("submit")
});

// FILTRO DE PESQUISA
// CLiente
async function filtroCli(value) {
  if(value.length !=0){
  const require = await fetch('../appAdmin/functions/filtrar/filtrarCli.php?value='+value);
  const data = await require.json();
  var listaHTML = '<ul>';

  if(data['status']){
      for (let i = 0; i < data['dados'].length; i++) {
          listaHTML+= `<li onclick='inputValueCli(${JSON.stringify(data['dados'][i].nome)})'>${data["dados"][i].nome}</li>`;
      }
  }else{
      listaHTML += "<li>"+ data["msg"]+"</li>";
  }
  listaHTML+= "</ul>";
  }else{
      var listaHTML = " ";
  }
  document.getElementById("resultPesquisaCli").innerHTML = listaHTML;
}

function inputValueCli(nome) {
  document.getElementById("nomeCli").value = "";
  document.getElementById("nomeCli").value = nome;
  document.getElementById("resultPesquisaCli").innerHTML = "";
}

// Fragrancia
async function filtroFrag(value, destino) {
  if(value.length !=0){
  const require = await fetch('../appAdmin/functions/filtrar/filtrarFrag.php?value='+value);
  const data = await require.json();
  var listaHTML = '<ul>';
  if(data['status']){
      for (let i = 0; i < data['dados'].length; i++) {
          listaHTML+= `<li onclick='inputValueFrag(${JSON.stringify(data['dados'][i].nome_frag)}, ${destino})'>${data["dados"][i].nome_frag}</li>`;
      }
  }else{
      listaHTML += "<li>"+ data["msg"]+"</li>";
  }
  listaHTML+= "</ul>";
  }else{
      var listaHTML = " ";
  }
  document.querySelectorAll(".resultPesquisaFrag")[destino].innerHTML = listaHTML;
}
function inputValueFrag(nome, destino) {
  console.log(destino)
  document.querySelectorAll(".fragrancias")[destino].value = "";
  document.querySelectorAll(".fragrancias")[destino].value = nome;
  document.querySelectorAll(".resultPesquisaFrag")[destino].innerHTML = "";
}

async function filtroModelo(value, destino) {
  if(value.length !=0){
  const require = await fetch('../appAdmin/functions/filtrar/filtrarModelo.php?value='+value);
  const data = await require.json();
  var listaHTML = '<ul>';
  if(data['status']){
      for (let i = 0; i < data['dados'].length; i++) {
          listaHTML+= `<li onclick='inputValueModelo(${JSON.stringify(data['dados'][i].nome_modelo)}, ${destino})'>${data["dados"][i].nome_modelo}</li>`;
      }
  }else{
      listaHTML += "<li>"+ data["msg"]+"</li>";
  }
  listaHTML+= "</ul>";
  }else{
      var listaHTML = " ";
  }
  document.querySelectorAll(".resultPesquisaModelo")[destino].innerHTML = listaHTML;
}
function inputValueModelo(nome, destino) {
  console.log(destino)
  document.querySelectorAll(".modelos")[destino].value = "";
  document.querySelectorAll(".modelos")[destino].value = nome;
  document.querySelectorAll(".resultPesquisaModelo")[destino].innerHTML = "";
}

// MASKS INPUTS
$(document).ready(function () {
  $('.preco').mask("#.##0,00", { reverse: true, placeholder: "R$ 00,00" });
});