// CAD DRAG AND DROP
var areaUpload = document.querySelector(".upload-area");
var areaTxt = document.querySelector("#upload-txt");
var input = document.querySelector("#input");
const dataTransfer = new DataTransfer();
var fileobj, file;

areaUpload.addEventListener("dragover", (event) => {
event.preventDefault();
areaTxt.textContent = "Solte o arquivo aqui";
})

areaUpload.addEventListener("dragleave", (event) => {
event.preventDefault();
areaTxt.textContent = "Arraste e solte o arquivo aqui";
})

areaUpload.addEventListener("drop", (event) => {
event.preventDefault();
file = event.dataTransfer.files[0];
dataTransfer.items.add(file);
input.files = dataTransfer.files;
showImg();
})

input.addEventListener("change", function() {
file = this.files[0];
dataTransfer.items.add(file);
input.files = dataTransfer.files;
showImg();
})

function procurarArq(){
    input.click();
}

function showImg() {
let tipoArq = file.type;
let tiposAceitados = ["image/jpeg", "image/jpg", "image/png"];

if (tiposAceitados.includes(tipoArq)) {
    let leitorArq = new FileReader();
    leitorArq.onload = () => {
    let urlArq = leitorArq.result;
    let img = `
    <div class="upload-produto_img d-flex justify-content-center align-items-center">
        <img id="img" src="${urlArq}" alt="upload">
    </div>
    <button class="upload-produto_alterar-img" type="button" >Alterar imagem</button>
    `;
    console.log(img);
    areaUpload.innerHTML = img;
    }
    leitorArq.readAsDataURL(file);

} else {
    alert("Extensão invalida! Selecione um arquivo válido(.jpeg/.jpg/.png)");
    areaTxt.textContent = "Arraste e solte o arquivo aqui";
}
}

// EDIT
const modalEdicao = document.querySelector(".modalEdit");
const modalExcluir = document.querySelector(".modalExcluir");
const newNome = document.querySelector("#nome__Modelo");
const newValor = document.querySelector("#valor__Modelo");
const msgEdicao = document.querySelector("#msg__edicao");
const formEdit = document.querySelector(".formEdit")
const cancelarExcluir = document.querySelector(".cancelar");
const msgExclusao = document.querySelector(".msgExclusao");
const excluir = document.querySelector(".divExcluir");

function abrirModalEditar(cod, nome, valor,nomeImg ) {
    addStyle()
    formEdit.action = `./functions/editar/func_editModelo.php?id=${cod}`;
    modalEdicao.style.display = "flex";
    msgEdicao.textContent = `Editando o modelo "${nome}"`;
    newNome.value = nome;
    newValor.value = valor;
    let img = `
    <div class="upload-produto_img d-flex justify-content-center align-items-center">
        <img id="img" src="../../upload/${nomeImg}" alt="upload">
    </div>
    <button class="upload-produto_alterar-img" type="button" >Alterar imagem</button>
    `;
    newAreaUpload.innerHTML = img;
}

function fecharModalEdicao() {
    modalEdicao.style.display = "none";
    removeStyle()
}

// EXCLUIR
function excluirModelo(id) {
    window.location.href=`functions/excluir/func_excluirModelo.php?id=${id}`
}
function abrirModalExcluir(cod,nome) {
    modalExcluir.style.display = "flex";
    msgExclusao.textContent = `Tem certeza que quer apagar item "${nome}"?`
    addStyle()
    excluir.innerHTML=`
    <button class="btn_modal excluir" onclick="excluirModelo(${cod})">
    EXCLUIR
    </button>`
}
function fecharModalExcluir() {
    modalExcluir.style.display = "none";
    removeStyle()
}
cancelarExcluir.addEventListener("click", () => {
    fecharModalExcluir();
});

// EDIT DRAG AND DROP
var newAreaUpload = document.querySelector(".new-upload-area");
var newInput = document.querySelector("#newInput");
const newDataTransfer = new DataTransfer();
var newFile;

newAreaUpload.addEventListener("dragover", (event) => {
event.preventDefault();
})

newAreaUpload.addEventListener("dragleave", (event) => {
event.preventDefault();
})

newAreaUpload.addEventListener("drop", (event) => {
event.preventDefault();
newFile = event.dataTransfer.files[0];
newDataTransfer.items.add(newFile);
newInput.files = dataTransfer.files;
newShowImg();
})

newInput.addEventListener("change", function() {
newFile = this.files[0];
newDataTransfer.items.add(newFile);
newInput.files = newDataTransfer.files;
newShowImg();
})

function newProcurarArq(){
    newInput.click();
}

function newShowImg() {
let tipoArq = newFile.type;
let tiposAceitados = ["image/jpeg", "image/jpg", "image/png"];

if (tiposAceitados.includes(tipoArq)) {
    let leitorArq = new FileReader();
    leitorArq.onload = () => {
    let urlArq = leitorArq.result;
    let img = `
    <div class="upload-produto_img d-flex justify-content-center align-items-center">
        <img id="img" src="${urlArq}" alt="upload">
    </div>
    <button class="upload-produto_alterar-img" type="button" >Alterar imagem</button>
    `;
    console.log(img);
    newAreaUpload.innerHTML = img;
    }
    leitorArq.readAsDataURL(newFile);
} 
}

// MASKS INPUTS
$(document).ready(function(){
    $('.preco').mask("#.##0,00", {reverse: true, placeholder: "R$ 00,00"});
});