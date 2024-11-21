<?php 
    include('protect.php');
    include_once('conexao.php');

    if(isset($_POST['submit'])) {
        $data = $_POST['data'];
        $hora = $_POST['hora'];
        $vaga = $_POST['vaga'];
        $polo = $_POST['polo'];

        $consulta = "SELECT * FROM horarios WHERE DT_DATA = '$data'";
        $result = $mysqli->query($consulta);
        
        if($result -> num_rows === 0){
            $result = mysqli_query($mysqli, "INSERT INTO horarios(DT_DATA,HR_HORA,NR_VAGA,PL_POLO) VALUES ('$data','$hora','$vaga','$polo')");
        }else{
            echo "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxRegistro já exite";
        }
    
    }

    $sql = "SELECT * FROM horarios order by DT_DATA";
    $estado = $mysqli->query($sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="poloStyle.css">
    <title>Polo</title>
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

    <div id="tela">
        <img src="https://www.unifaa.edu.br/img/2024/09/banner-institucional-66e30d6c11818.webp" id="campo">
        <button class="btn" id="btnCadastrar"><i class="bi bi-file-earmark-plus"></i>Cadastrar Horários</button>
        <button class="btn" id="btnConsultar"><i class="bi bi-search"></i> Consulta</button>

    </div>
<dialog id="cadastrar">
    <button id="btn-sair">
        <span>
            <i class="bi bi-x-square"></i>
        </span>
            Sair
    </button>


    <form action="polo.php" method="POST">
        <fieldset>
            <legend>Cadastro de Horários</legend>
            <br>
            <div class="inputBox">
                <label for="data">Data:</label>
                <input type="date" name="data" id="data" class="inputData" required>
            </div>
                <br><br>
            <div class="inputBox">
                <label for="hora">Hora:</label>
                <input type="text" name="hora" id="hora" class="inputHora">
        
                <label for="vaga">Vagas:</label>
                <input type="text" name="vaga" id="vaga" class="inputVaga">
            </div>
               <br><br>
               <div class="inputBox">
                <label for="polo">Polo:</label>
                <input type="text" name="polo" id="polo" class="inputPolo" required>
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
                    <th scope="col"><b>Data</b></th>
                    <th scope="col"><b>Hora</b></th>
                    <th scope="col"><b>Vagas</b></th>
                    <th scope="col"><b>Polo</b></th>
                    <th scope="col"><b>Ações</b></th>
                 </tr>
            </thead>
  <tbody>
        <?php
            while($user_data = mysqli_fetch_assoc($estado)){

                echo "<tr>";
                echo "<td>". $user_data['DT_DATA']."</td>";
                echo "<td>". $user_data['HR_HORA']."</td>";
                echo "<td>". $user_data['NR_VAGA']."</td>";
                echo "<td>". $user_data['PL_POLO']."</td>";
                echo"<td>
                   <a clas='btn btn-sm btn-danger' href='deleteHorario.php?DT_DATA=$user_data[DT_DATA]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z'/>
  <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z'/>
</svg>
                   </a>


                </td>";

            }

        ?>
  
  </tbody>
</table>

 </div>
        </dialog>

    <script src="polo.js"></script>
    
</body>
</html>