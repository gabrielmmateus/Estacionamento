<?php
session_start();
include_once("conexao.php");
date_default_timezone_set('America/Sao_Paulo');

//Resetando dados
$_SESSION["valor_total"] = 0;
$_SESSION["carros_dia"] = 0;
header("Location: index.php");


?>