<?php
session_start(); //iniciando sessão
include_once("conexao.php"); //incluindo banco

//pegando dados
$id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_NUMBER_INT);

//verificação
if (!empty($id)) {
    $result_usuario = "DELETE FROM admin WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn)) {
        header("Location: index.php");
    }
   else {
        $_SESSION["msg"] = "<p style='color: red;'>ERRO: O USUÁRIO NÃO FOI APAGADO.</p>";
        header("Location: index.php");
    }   
}
else {
    $_SESSION["msg"] = "<p style='color: red;'>SELECIONE UM USUÁRIO.</p>";
    header("Location: index.php");
}

?>