
function modalExcluirCliente(id,nome){
    addStyle()
    $(".modalExcluir").css("display", "flex");
    $(".msgExclusao").text("Excluir o cliente "+nome+"?")
    $(".excluir").attr('onclick', `excluir(${id})`);
}
function fecharModalExcluir(){
    removeStyle()
    $(".modalExcluir").css("display", "none");
}
function excluir(id){
    window.location.href="./functions/excluir/func_excluirCli.php?id="+id
}