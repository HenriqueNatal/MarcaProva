function mostrarSenha(){
    var inputPass = document.getElementById('insenha');
    var btnShow = document.getElementById('btn-senha');

    if(inputPass.type === 'password'){
        inputPass.setAttribute('type','text');
        btnShow.classList.replace('bi-eye-fill','bi-eye-slash-fill')
    }else{
        inputPass.setAttribute('type','password');
        btnShow.classList.replace('bi-eye-slash-fill','bi-eye-fill')
    }
}
