
    function limparEndereco() {
        document.getElementById('logradouro').value=("");
        document.getElementById('bairro').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
    }
function pesquisacep(valor) {
    console.log("oi");
    if (valor.includes("-")) {
        var cep = valor.replace(/\D/g, '');
    }else{
        var cep = valor;
    }
    console.log(cep);
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if(validacep.test(cep)) {
            var url = 'https://viacep.com.br/ws/'+ cep + '/json/';
            console.log(url);
            fetch(url)
            .then((response) => response.json())
            .then((dados)=>{
            if(!dados) {
                console.log('ERROR');
                limparEndereco();
            }else{
                document.getElementById('logradouro').value=dados.logradouro;
                document.getElementById('bairro').value=dados.bairro;
                document.getElementById('cidade').value=dados.localidade;
                document.getElementById('uf').value=dados.uf;
            }
            })
            
        }else limparEndereco(); 
    } else limparEndereco();
};