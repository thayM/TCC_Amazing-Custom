function limparEndereco() {
        document.getElementById('logradouro__cli').value=("");
        document.getElementById('bairro__cli').value=("");
        document.getElementById('cidade__cli').value=("");
        document.getElementById('uf__cli').value=("");
        document.getElementById('complemento__cli').value=("");
}
function pesquisacep(valor) {
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
            if(dados.erro) {
                console.log('ERROR');
                limparEndereco();
            }else{
                document.getElementById('logradouro__cli').value=dados.logradouro;
                document.getElementById('bairro__cli').value=dados.bairro;
                document.getElementById('cidade__cli').value=dados.localidade;
                document.getElementById('uf__cli').value=dados.uf;
                document.getElementById('complemento__cli').value=dados.complemento;
            }
            })
            
        }else limparEndereco(); 
    } else limparEndereco();
};

// MASKS INPUTS
$(document).ready(function(){
    $('.info_tel-input').mask('(00) 00000-0000', {placeholder: "( _ ) _____ - ____"});
    $('.cep').mask('00000-000', {placeholder: "CEP"});
});