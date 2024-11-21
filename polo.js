const button = document.getElementById("btnCadastrar");
const modal = document.getElementById("cadastrar");
const buttonClose = document.getElementById("btn-sair");
const btnconsulta = document.getElementById("btnConsultar");
const outromodal = document.getElementById("consultar");
const buttonFechar = document.getElementById("btnSair");


button.onclick = function(){
    modal.showModal();
}

buttonClose.onclick = function() {
    modal.close();
}
btnconsulta.onclick = function(){
    outromodal.showModal();
}

buttonFechar.onclick = function() {
    outromodal.close();
}

