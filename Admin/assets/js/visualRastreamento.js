function visualRast(codEstado){ 
    var stts = codEstado;

    function linhaDivisoriaPA(){
        var divPA = document.getElementById("linhaPA");
        divPA.style.backgroundColor = "#FFFFA1";
        divPA.style.width = "160px";
        divPA.style.height = "6px";
        divPA.style.position = "relative";
        divPA.style.top = "-5px";
    }

    function linhaDivisoriaAP(){
        var divAP = document.getElementById("linhaAP");
        divAP.style.backgroundColor = "#FFFFA1";
        divAP.style.width = "160px";
        divAP.style.height = "6px";
        divAP.style.position = "relative";
        divAP.style.left = "10px";
        divAP.style.top = "-5px";
    }

    function linhaDivisoriaPE(){
        var divPE = document.getElementById("linhaPE");
        divPE.style.backgroundColor = "#FFFFA1";
        divPE.style.width = "160px";
        divPE.style.height = "6px";
        divPE.style.position = "relative";
        divPE.style.left = "20px";
        divPE.style.top = "-5px";
    }

    function etapaPag(){
        var etapaPag = document.getElementById("cirEtapaPag");
        var txtPag = document.getElementById("pPag");
        var imgPag = document.getElementById("iconPag");
        var novoCaminhoPag = '../assets/icons/fi-sr-dollar.svg';

        etapaPag.style.backgroundColor = "#FFFFA1";
        txtPag.style.color = "#FFFFA1";
        imgPag.src = novoCaminhoPag;
    }

    function etapaArt(){
        var etapaArt = document.getElementById("cirEtapaArt");
        var txtArt = document.getElementById("pArt");
        var imgArt = document.getElementById("iconArt");
        var novoCaminhoArt = '../assets/icons/fi-sr-edit-alt.svg';

        etapaArt.style.backgroundColor = "#FFFFA1";
        txtArt.style.color = "#FFFFA1";
        imgArt.src = novoCaminhoArt;

        linhaDivisoriaPA();
    }

    function etapaProd(){
        var etapaProd = document.getElementById("cirEtapaProd");
        var txtProd = document.getElementById("pProd");
        var imgProd = document.getElementById("iconProd");
        var novoCaminhoProd = '../assets/icons/fi-sr-settings.svg';

        etapaProd.style.backgroundColor = "#FFFFA1";
        txtProd.style.color = "#FFFFA1";
        imgProd.src = novoCaminhoProd;

        linhaDivisoriaPA();
        linhaDivisoriaAP();
    }

    function etapaEnvio(){
        var etapaEnvio = document.getElementById("cirEtapaEnvio");
        var txtEnvio = document.getElementById("pEnvio");
        var imgEnvio = document.getElementById("iconEnvio");
        var novoCaminhoEnvio = '../assets/icons/Vector.svg';

        etapaEnvio.style.backgroundColor = "#FFFFA1";
        txtEnvio.style.color = "#FFFFA1";
        imgEnvio.src = novoCaminhoEnvio;

        linhaDivisoriaPA();
        linhaDivisoriaAP();
        linhaDivisoriaPE();
    }

    if(stts == 1){
        etapaPag();

    } else if(stts == 2){
        etapaPag();
        etapaArt();

    } else if(stts == 3){
        etapaPag();
        etapaArt();
        etapaProd();

    } else if(stts == 4){
        etapaPag();
        etapaArt();
        etapaProd();
        etapaEnvio();
    }
}