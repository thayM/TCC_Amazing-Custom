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

