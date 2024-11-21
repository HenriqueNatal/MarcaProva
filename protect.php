<?php
if(!isset($_SESSION)) {
    session_start();
    $logado = $_SESSION['NM_USUARIO'];
}

if(!isset($_SESSION['NM_USUARIO'])){
    die("Página protegida por Login. Favor realizar acesso! <p> <a href=\"index.php\">Entrar</a></p>");
}

?>