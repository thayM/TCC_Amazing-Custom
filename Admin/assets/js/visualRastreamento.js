function visualRast(codEstado){ 
    var stts = codEstado;

    
    function etapaPag(){
        var imgPag = document.getElementById("iconPag");
        var novoCaminhoPag = '../assets/icons/fi-sr-dollar.svg';
        imgPag.src = novoCaminhoPag;
    }

    function etapaArt(){
        var imgArt = document.getElementById("iconArt");
        var novoCaminhoArt = '../assets/icons/fi-sr-edit-alt.svg';
        imgArt.src = novoCaminhoArt;
        etapaPag();
    }

    function etapaProd(){
        var imgProd = document.getElementById("iconProd");
        var novoCaminhoProd = '../assets/icons/fi-sr-settings.svg';
        imgProd.src = novoCaminhoProd;
        etapaPag();
        etapaArt();
    }

    function etapaEnvio(){
        var imgEnvio = document.getElementById("iconEnvio");
        var novoCaminhoEnvio = '../assets/icons/Vector.svg';
        imgEnvio.src = novoCaminhoEnvio;
        etapaPag();
        etapaArt();
        etapaProd();
    }

    if(stts == 1){
        etapaPag();

    } else if(stts == 2){
        etapaArt();

    } else if(stts == 3){
        etapaProd();

    } else if(stts == 4){

        etapaEnvio();
    }
}