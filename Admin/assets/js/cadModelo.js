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

