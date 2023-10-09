// CLi

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

// Frag
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