<?php
session_start(); //iniciando sessão
include_once("conexao.php"); //incluindo banco
//pegando dados
$usuario = filter_input(INPUT_POST, 'usuario' , FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha');


// pegando dados do banco
$result_usuario = "SELECT * FROM admin WHERE usuario = '$usuario'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
//$senha_banco = $row_usuario['senha'];
$senha_banco = base64_decode($row_usuario['senha']);
$status = $row_usuario['status'];
$id = $row_usuario['id'];

//verificando e dando update (bater ponto)
if (mysqli_affected_rows($conn)) {

    // LOGIN DE ADMIN
    if ($status == 1){
        $senha_banco = $row_usuario['senha'];
        if (is_numeric($senha_banco)) {
            $senha_banco = $row_usuario['senha'];
        }
        else {
            $senha_banco = base64_decode($row_usuario['senha']);
        }
        if ($senha == $senha_banco){
            $result_usuario = "UPDATE admin SET entrada=NOW() WHERE id = '$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            $_SESSION["usuario"] = $id;
            header("Location: ../home-adm/index.php");
        } else{
            $_SESSION["msg"] = "<p style='color: red;'>Usuário inexistente / Login não realizado.</p>";
            header("Location: login_admin.php");
        }
    } //LOGIN FUNCIONÁRIO
    elseif ($status == 2){
        if ($senha == $senha_banco){
            $result_usuario = "UPDATE admin SET entrada=NOW() WHERE id = '$id'";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
            $_SESSION["usuario"] = $id;
            header("Location: ../home-funcionario/index.php");
        } else{
            $_SESSION["msg"] = "<p style='color: red;'>Usuário inexistente / Login não realizado.</p>";
            header("Location: login_admin.php");
        }
    }


} else {
    $_SESSION["msg"] = "<p style='color: red;'>Usuário inexistente / Login não realizado.</p>";
    header("Location: login_admin.php");
}

?>