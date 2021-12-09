function marcarTodos(marcar){
    var itens = document.getElementsByName('checkok[]');
    var i = 0;
    for(i=0; i<itens.length;i++){
        itens[i].checked = marcar;
    }
}