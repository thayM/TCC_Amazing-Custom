
function modalExcluirCliente(id,nome){
    addStyle()
    $(".search").addClass("blur");
    $(".container_clientes").addClass("blur");
    
    $(".modalExcluir").css("display", "flex");
    $(".modalExcluir").css("z-index", 2);
    $(".msgExclusao").text("Excluir o cliente "+nome+"?")
    $(".excluir").attr('onclick', `excluir(${id})`);
}
function fecharModalExcluir(){
    removeStyle()
    $(".search").removeClass("blur");
    $(".modalExcluir").css("display", "none");
    $(".container_clientes").removeClass("blur");
}
function excluir(id){
    window.location.href="./functions/excluir/func_excluirCli.php?id="+id
}