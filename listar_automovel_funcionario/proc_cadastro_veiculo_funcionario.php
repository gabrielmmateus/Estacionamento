<?php
    session_start(); //iniciando sessão
    include_once("conexao.php"); //incluindo banco

    //pegando dados e fazendo validação
    $placa = filter_input(INPUT_POST, "placa", FILTER_SANITIZE_STRING);

    $placa = strtoupper($placa);

    $rgx = '/[A-Z]{3}[0-9][0-9A-Z][0-9]{2}/';

    $result_pg= "SELECT COUNT(id) AS num_result FROM admin";
    $resultado_pg= mysqli_query($conn, $result_pg);
    $row_pg = mysqli_fetch_assoc($resultado_pg);
    $quantidade = $row_pg["num_result"];

    $a = "SELECT * FROM cliente WHERE placa ='$placa'";
    $select_placa = mysqli_query($conn, $a);
    $row_placa = mysqli_fetch_assoc($select_placa);
    
    if(!empty($row_placa)){
        $unica_placa = false;
    }else  {
        $unica_placa = true;
    }

    //verificação
    if ($quantidade <= 200 && $unica_placa){
    
        if (preg_match($rgx, $placa) == 1) {
            $result_usuario = "INSERT INTO cliente (placa, data, entrada) VALUES ('$placa', NOW(), NOW())";
            $resultado_usuario = mysqli_query($conn, $result_usuario);
    
            if (mysqli_insert_id($conn)) {
                $_SESSION["carros"] = 1;
                $_SESSION["carros_dia"] = $_SESSION["carros_dia"] + $_SESSION["carros"];
                header("Location: ../listar_automovel_funcionario/index.php");
            } else {
                $_SESSION["msg"] = "<p style='color: red;'>Veículo não foi cadastrado com sucesso</p>";
                header("Location: cadastro_veiculo_funcionario.php");
            }
        }
        else {
            $_SESSION["msg"] = "<p style='color: red;'>Veículo não foi cadastrado com sucesso | A Placa não existe</p>";
            header("Location: cadastro_veiculo_funcionario.php");
        }
    }
    else {
        $_SESSION["msg"] = "<p style='color: red;'>Veículo não foi cadastrado com sucesso</p>";
        header("Location: cadastro_veiculo_funcionario.php");
    }
 
?>
