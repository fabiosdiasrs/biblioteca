/*Função que mostra qual item do menu está selecionado*/
const list        = document.querySelectorAll('.list'); /*Obj com todos os itens da classe list*/ 
function activeLink(){ /*função que procura o list ativo*/
    list.forEach((item) =>
    item.classList.remove('active'));
    this.classList.add('active');
}
list.forEach((item) =>
item.addEventListener('click',activeLink));



