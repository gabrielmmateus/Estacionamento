
<?php
session_start(); //iniciando sessão
include_once("conexao.php"); //incluindo conexao



$usuario = $_SESSION["usuario"]; //pegando usuario logado

//update
$result_usuario = "UPDATE admin SET saida=NOW() WHERE id = '$usuario'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
unset($_SESSION["usuario"]);
header("Location:../index.html");

?>

