<?php
include('protect.php');
include_once('conexao.php');

$user= $_GET['DT_DATA'];

$sqlSelect= "SELECT * FROM horarios WHERE DT_DATA = '$user'";

$result= $mysqli->query($sqlSelect);

if($result->num_rows > 0){
    $sqlDelete= "DELETE FROM horarios WHERE DT_DATA= '$user'";
    $resultDelete= $mysqli->query($sqlDelete);
}

header('Location: polo.php');

?>