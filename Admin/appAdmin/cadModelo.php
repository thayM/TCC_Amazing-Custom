<?php
include_once('../components/header.php');
?>

<head>
  <link rel="stylesheet" href="../assets/css/style_cadastros.css">
  <link rel="stylesheet" href="../assets/css/style_listagens.css">
  <link rel="stylesheet" href="../assets/css/style_modelo.css">
  <title>Cadastro Modelo</title>
</head>

<div class="container_modal justify-content-center align-items-center">
  <form class="box" action="post" enctype="multipart/form-data">
    <div class="content_modal d-flex justify-content-between flex-column">
      <img src="../assets/icons/x.svg" alt="fechar" class="fechar">
      <h3>Adicionar novo modelo</h3>
      <div class="modal_input-nome ">
        <label for="modNome">Nome</label>
        <input type="text" id="nome__Modelo" placeholder="Nome do modelo">

        <label for="valor">Valor</label>
        <input type="number" id="valor__Modelo" name="valor" placeholder="R$ 00,00">
      </div>

      <div class="upload-area" onclick="procurarArqClick()" ondrop="uploadArq(event)" ondragover="return false">
        <div class="upload-area_border d-flex justify-content-center align-items-center">
          <p id="upload-txt">Arraste e solte a imagem aqui</p>
          <input type="file" id="input" hidden>
        </div>
      </div>

      <div class="btn-cadastro d-flex justify-content-end">
        <button type="submit" class="btn-cadastrar">Cadastrar</button>
      </div>
    </div>
  </form>
</div>

<script>
  var areaUpload = document.querySelector(".upload-area")
  var areaTxt = document.querySelector("#upload-txt")
  var input = document.querySelector("#input")

  var fileobj, file

  areaUpload.addEventListener("dragover", (event) => {
    event.preventDefault()
    areaTxt.textContent = "Solte o arquivo aqui"
  })

  areaUpload.addEventListener("dragleave", (event) => {
    event.preventDefault()
    areaTxt.textContent = "Arraste e solte o arquivo aqui"
  })

  areaUpload.addEventListener("drop", (event) => {
    event.preventDefault()
    file = event.dataTransfer.files[0]
    showImg()
  })

  input.addEventListener("change", function() {
    file = this.files[0]
    showImg()
  })


  function procurarArqClick() {
    input.click()
    procurarArq()
  }

  function showImg() {
    let tipoArq = file.type
    let tiposAceitados = ["image/jpeg", "image/jpg", "image/png"]

    if (tiposAceitados.includes(tipoArq)) {
      let leitorArq = new FileReader()
      leitorArq.onload = () => {
        let urlArq = leitorArq.result
        let img = `<img src="${urlArq}" alt="">`
        console.log(img)
        areaUpload.innerHTML = img
      }
      leitorArq.readAsDataURL(file);
    } else {
      alert("Extensão invalida! Selecione um arquivo válido(.jpeg/.jpg/.png)")
      areaTxt.textContent = "Arraste e solte o arquivo aqui"
    }
  }

  function uploadArq(e) {
    e.preventDefault()
    fileobj = e.dataTransfer.files[0]
    updateJsArq(fileobj)
  }

  function procurarArq() {
    document.getElementById('input').onchange = function() {
      fileobj = document.getElementById('input').files[0];
      updateJsArq(fileobj);
    }
  }

  function updateJsArq(obj) {
    if (obj != undefined) {
      var form_data = new FormData();
      form_data.append('file', obj);
      var xhttp = new XMLHttpRequest();
      xhttp.open("POST", "../Admin/functions/uploadFile.php", true);
      xhttp.onload = function(event) {

        if (xhttp.status == 200) {
          console.log("Uploaded!");
        } else {
          alert(xhttp.status);
        }
      }
      xhttp.send(form_data);
    }
  }
</script>

<body>
  <main class="w-100 d-flex flex-column align-items-center">
    <div class="header_pesquisa d-flex">
      <div class="pesquisa_input d-flex">
        <input type="text" placeholder="Buscar...">
        <button class="btn-buscar">
          <img src="../assets/icons/lupa.svg" alt="lupa">
        </button>
      </div>
      <button type="button" class="produto_btn d-flex justify-content-between">
        Adicionar Modelo
        <span class="produto_btn-add">+</span>
      </button>
    </div>

    <div class="container_produtos d-flex flex-wrap">

      <div class="card-produto d-flex justify-content-between">
        <div class="card-produto_img d-flex justify-content-center align-items-center">
          <img class="produto_img" src="../../upload/brasão 14.jpg" alt="img_produto">
        </div>
        <div class="d-flex flex-column justify-content-between">
          <div class="content_card-produto d-flex flex-column justify-content-between">
            <h3>Redondo 6 Meia Lua</h3>
            <p>R$ 5,00</p>
          </div>
          <div class="footer_card-produto d-flex justify-content-end">
            <button>
              <img src="../assets/icons/pen.svg" alt="editar">
            </button>
            <button>
              <img src="../assets/icons/trash-alt.svg" alt="excluir">
            </button>
          </div>
        </div>
      </div>

      <div class="card-produto d-flex justify-content-between">
        <div class="card-produto_img d-flex justify-content-center align-items-center">
          <img class="produto_img" src="../../upload/brasão 14.jpg" alt="img_produto">
        </div>
        <div class="d-flex flex-column justify-content-between">
          <div class="content_card-produto d-flex flex-column justify-content-between">
            <h3>Redondo 6 Meia Lua</h3>
            <p>R$ 5,00</p>
          </div>
          <div class="footer_card-produto d-flex justify-content-end">
            <button>
              <img src="../assets/icons/pen.svg" alt="editar">
            </button>
            <button>
              <img src="../assets/icons/trash-alt.svg" alt="excluir">
            </button>
          </div>
        </div>
      </div>

      <div class="card-produto d-flex justify-content-between">
        <div class="card-produto_img d-flex justify-content-center align-items-center">
          <img class="produto_img" src="../../upload/brasão 14.jpg" alt="img_produto">
        </div>
        <div class="d-flex flex-column justify-content-between">
          <div class="content_card-produto d-flex flex-column justify-content-between">
            <h3>Redondo 6 Meia Lua</h3>
            <p>R$ 5,00</p>
          </div>
          <div class="footer_card-produto d-flex justify-content-end">
            <button>
              <img src="../assets/icons/pen.svg" alt="editar">
            </button>
            <button>
              <img src="../assets/icons/trash-alt.svg" alt="excluir">
            </button>
          </div>
        </div>
      </div>

      <div class="card-produto d-flex justify-content-between">
        <div class="card-produto_img d-flex justify-content-center align-items-center">
          <img class="produto_img" src="../../upload/brasão 14.jpg" alt="img_produto">
        </div>
        <div class="d-flex flex-column justify-content-between">
          <div class="content_card-produto d-flex flex-column justify-content-between">
            <h3>Redondo 6 Meia Lua</h3>
            <p>R$ 5,00</p>
          </div>
          <div class="footer_card-produto d-flex justify-content-end">
            <button>
              <img src="../assets/icons/pen.svg" alt="editar">
            </button>
            <button>
              <img src="../assets/icons/trash-alt.svg" alt="excluir">
            </button>
          </div>
        </div>
      </div>

    </div>
  </main>
  <script src="../assets/js/modal.js"></script>
  <script src="../assets/js/style.js"></script>

  </main>
</body>