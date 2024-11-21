<?php 
    include('protect.php');
    include_once('conexao.php');

    if(isset($_POST['submit'])) {
        $aluno = $_POST['aluno'];
        $materia = $_POST['materia'];
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $polo = $_POST['polo'];

        $consulta = "SELECT * FROM aluno WHERE NM_ALUNO = '$aluno'";
        $result = $mysqli->query($consulta);
        
        if($result -> num_rows === 0){
            $result = mysqli_query($mysqli, "INSERT INTO aluno(NM_ALUNO,NM_MATERIA,DT_DATA,HR_HORA,PL_POLO) VALUES ('$aluno','$materia','$data','$horario','$polo')");
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
    <link rel="stylesheet" href="painelLl.css">
    <title>Aluno</title>
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
        <button id="btn-abrir" <i class="bi bi-file-earmark-plus"></i>Agendar Avaliação</button>
        <button id="btnConsultar" <i class="bi bi-search"></i>Minhas Avaliações</button>
    </div>

<dialog id="cadastrar">
    <button id="btn-sair">
        <span>
            <i class="bi bi-x-square"></i>
        </span>
            Sair
    </button>


    <form action="painel.php" method="POST">
        <fieldset>
            <legend>Agendamento de Avaliação</legend>
            <br>
            <div class="inputBox">
                <label for="aluno">Seu nome:</label>
                <input type="text" name="aluno" id="aluno" class="inputAluno" required>
            </div>
            <br>
            <div class="inputBox">
                <span>Materia:</span>
                <select name="materia" id="materia" required>
                    <?php
                    $consulta = ("SELECT NM_MATERIA FROM materia");
                    $result = $mysqli->query($consulta);
                    
                    foreach($result as $option) {
                    ?>
                        <option><?php echo $option['NM_MATERIA']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
                <br>
                <div class="inputBox">
                <span>Data:</span>
                <select name="data" id="data" required>
                    <?php
                    $consulta = ("SELECT DT_DATA FROM horarios");
                    $result = $mysqli->query($consulta);
                    
                    foreach($result as $option) {
                    ?>
                        <option><?php echo $option['DT_DATA']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="inputBox">
                <span>Horário:</span>
                <select name="horario" id="horario" required>
                    <?php
                    $consulta = ("SELECT HR_HORA FROM horarios");
                    $result = $mysqli->query($consulta);
                    
                    foreach($result as $option) {
                    ?>
                        <option><?php echo $option['HR_HORA']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="inputBox">
                <span>Polo:</span>
                <select name="polo" id="polo" required>
                    <?php
                    $consulta = ("SELECT PL_POLO FROM horarios ORDER BY PL_POLO ASC");
                    $result = $mysqli->query($consulta);
                    
                    foreach($result as $option) {
                    ?>
                        <option><?php echo $option['PL_POLO']?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
                <br><br>
            <input type="submit" name="submit" id="submit">
        </fieldset>
        

    </form>



</dialog>

<dialog id="consultar">

<button id="btnSair">
<span>
    <i class="bi bi-x-square"></i>
</span>
    Sair
</button>
    <!-- tabela -->
<div class="table-box">
<table class="table-bg">
    <thead>
         <tr>
            <th scope="col"><b>Aluno</b></th>
            <th scope="col"><b>Matéria</b></th>
            <th scope="col"><b>Data</b></th>
            <th scope="col"><b>Hora</b></th>
            <th scope="col"><b>Polo</b></th>
         </tr>
    </thead>
<tbody>
<?php
    while($user_data = mysqli_fetch_assoc($estado)){

        echo "<tr>";
        echo "<td>". $user_data['NM_ALUNO']."</td>";
        echo "<td>". $user_data['NM_MATERIA']."</td>";
        echo "<td>". $user_data['DT_DATA']."</td>";
        echo "<td>". $user_data['HR_HORA']."</td>";
        echo "<td>". $user_data['PL_POLO']."</td>";

    }

?>

</tbody>
</table>

</div>
</dialog>

<script src="painel.js"></script>
</body>
</html>