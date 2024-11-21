<?php

use function PHPSTORM_META\type;

include('conexao.php');

if(isset($_POST['Usuario']) || isset($_POST['Senha'])) {

    if(strlen($_POST['Usuario']) == 0) {
        echo "Preencha o campo Usuário!";
    } else if(strlen($_POST['Senha']) == 0) {
        echo "Preencha o campo Senha!";
    }else{
        $usuario = $mysqli-> real_escape_string($_POST['Usuario']);
        $senha = $mysqli-> real_escape_string($_POST['Senha']);

        $sql_code = "SELECT * from usuarios WHERE NM_USUARIO = '$usuario' AND SH_PRINCIPAL = '$senha'";
        $sql_query = $mysqli->query($sql_code);

        $quantidade = $sql_query->num_rows;

        if($quantidade ==1){
            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();

            }

            $_SESSION['NM_USUARIO'] = $usuario['NM_USUARIO'];

            header("Location: painel.php");

            

        }else{
            $usuario = $mysqli-> real_escape_string($_POST['Usuario']);
            $senha = $mysqli-> real_escape_string($_POST['Senha']);

            $sql_code = "SELECT * from professor WHERE NM_USUARIO = '$usuario' AND SH_PRINCIPAL = '$senha'";
            $sql_query = $mysqli->query($sql_code);

            $quantidade = $sql_query->num_rows;

            if($quantidade ==1){
                $usuario = $sql_query->fetch_assoc();
                    if(!isset($_SESSION)){
                        session_start();

            }

            $_SESSION['NM_USUARIO'] = $usuario['NM_USUARIO'];

            header("Location: professor.php");

            

            

        }

        $sql_code = "SELECT * from polo WHERE NM_USUARIO = '$usuario' AND SH_PRINCIPAL = '$senha'";
        $sql_query = $mysqli->query($sql_code);

        $quantidade = $sql_query->num_rows;

        if($quantidade ==1){
            $usuario = $sql_query->fetch_assoc();
                if(!isset($_SESSION)){
                    session_start();

        }

        $_SESSION['NM_USUARIO'] = $usuario['NM_USUARIO'];

        header("Location: polo.php");

        

        

    }
            
        }

    }


}




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body id="corpo">
    <div id="cima">
    <span><img id="logoDois" src="./imagens//logo-unifaa-branca-mini.png"></span>
    <span><img id="logo" src="./imagens//logo-cima.jpg"></span>
    </div>
<form action="" method="POST">
    <div id="caixalogin">
            <h1 id="titulo">Login</h1> 
            <h2 id="subtitulo">Agendamento de Provas</h2>
            <label for="usuario" id="lblusuario">Usuário:</label>
            <input type="text" id="inusuario" name="Usuario"  placeholder="Informe seu RA" autofocus>
            <br><br> 
            <label for="senha" id="lblsenha">Senha:</label>
            <input type="password" id="insenha" name="Senha" placeholder="Informe a sua senha">
            <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
            
            <br><br> 
            <button id="btnentrar">Entrar</button>

    </div>

</form>
<script src=".//index.js"></script>
</body>
</html>