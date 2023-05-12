<?php
session_start(); //iniciando sessão
include_once("conexao.php"); //incluindo banco

//pegando dados
$id = filter_input(INPUT_POST, 'id' , FILTER_SANITIZE_NUMBER_INT);
$usuario = filter_input(INPUT_POST, 'usuario' , FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha');

//update
$result_usuario = "UPDATE admin SET usuario = '$usuario' , senha = '" . base64_encode($senha) . "' , modificado=NOW() WHERE id= '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if (mysqli_affected_rows($conn)){
    header("Location: ../listar_funcionario/index.php");
}
else {
    $_SESSION["msg"] = "<p style='color: red;'>Usuário não foi editado.</p>";
    header("Location: ../listar_funcionario/edit_funcionario.php");
} 
?>