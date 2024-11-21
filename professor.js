const button = document.getElementById("btn-abrir");
const modal = document.getElementById("cadastrar");
const buttonClose = document.getElementById("btn-sair");


button.onclick = function(){
    modal.showModal();
}

buttonClose.onclick = function() {
    modal.close();
}


