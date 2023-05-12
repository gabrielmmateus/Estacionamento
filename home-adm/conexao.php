<?php
    $servidor = "localhost";    // $servidor = $_SERVER["SERVER_NAME"];
    $usuario = "root";          
    $senha = "";
    $dbname = "estacionamento";
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);   //Criar a string de conexão
?>