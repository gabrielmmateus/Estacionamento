<?php
    session_start(); //iniciando sessão
    include_once("conexao.php"); //incluindo conexão

    //pegando dados
    $usuario = filter_input(INPUT_POST, "usuario", FILTER_SANITIZE_STRING);
    $senha = filter_input(INPUT_POST, "senha");
    $funcionario = 2;

    //inserindo no banco
    $result_usuario = "INSERT INTO admin (usuario, senha, criado, status) VALUES ('$usuario','" . base64_encode($senha) . "', NOW(), $funcionario)";
    $resultado_usuario = mysqli_query($conn, $result_usuario);

    if (mysqli_insert_id($conn)) {
        header("Location: ../listar_funcionario/index.php");
    } else {
        $_SESSION["msg"] = "<p style='color: blue;'>Funcionário não foi cadastrado com sucesso</p>";
        header("Location: cadastro_funcionario.php");
    }
    

    
    
?>
