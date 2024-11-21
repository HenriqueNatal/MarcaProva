<?php 
    include('protect.php');
    include_once('conexao.php');

    if(isset($_POST['submit'])) {
        $materia = $_POST['materia'];
        $alunos = $_POST['alunos'];

        $consulta = "SELECT * FROM materia WHERE NM_MATERIA = '$materia'";
        $result = $mysqli->query($consulta);
        
        if($result -> num_rows === 0){
            $result = mysqli_query($mysqli, "INSERT INTO materia(NM_MATERIA,NR_ALUNOS) VALUES ('$materia','$alunos')");
        }else{
            echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxRegistro já exite";
        }
    
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="professorR.css">
    <title>Professor</title>
</head>
<body>
<div id="barraCima">
        <img src="./imagens//logo-lado.jpg" id="logo">

            <h1 id="titulo">Agendamento de Provas</h1>
        <nav id="menuCima">

        <p><?php  echo $logado ?><p>

            <div class="btnExpandir">
                <i class="bi bi-list-nested"></i>
            </div>
           
        </nav>
    </div>

    <div class="box">
        <button id="btn-abrir" <i class="bi bi-file-earmark-plus"></i>Cadastrar Matéria</button>
    </div>

<dialog id="cadastrar">
    <button id="btn-sair">
        <span>
            <i class="bi bi-x-square"></i>
        </span>
            Sair
    </button>


    <form action="professor.php" method="POST">
        <fieldset>
            <legend>Cadastro de Matérias</legend>
            <br>
            <div class="inputBox">
                <label for="materia">Matéria:</label>
                <input type="text" name="materia" id="materia" class="inputMateria" required>
            </div>
                <br><br>
            <div class="inputBox">
                <label for="alunos">Quantidade de Alunos:</label>
                <input type="text" name="alunos" id="alunos" class="inputAlunos">
            </div>
                <br><br>
            <input type="submit" name="submit" id="submit">
        </fieldset>
        

    </form>



</dialog>
 

<script src="professor.js"></script>
</body>
</html>