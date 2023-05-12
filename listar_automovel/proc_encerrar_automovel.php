<?php
session_start(); //iniciando sessão
include_once("conexao.php"); //incluindo banco
date_default_timezone_set('America/Sao_Paulo'); //data padrão

//pegando dados
$id = filter_input(INPUT_GET, 'id' , FILTER_SANITIZE_NUMBER_INT);
// SETAR O DATETIME DE SAIDA
$result_usuario = "UPDATE cliente SET saida=NOW() WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

// CALCULO DE HORÁRIO
$result_usuario = "SELECT * FROM cliente WHERE id = $id";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
$placa = $row_usuario['placa'];
$data_inicial = $row_usuario['entrada'];
$data_final = $row_usuario['saida'];


$data_inicial = strtotime($data_inicial);
$data_final = strtotime($data_final);

$diff = abs($data_final - $data_inicial);
$horas = $diff / (3600);
$minutos = $horas * 60;

if ($minutos <= 15) {
    $valor = 0.00;
}
elseif (($minutos > 15) && ($minutos <= 60) ) {
    $valor = 27.00;
}
elseif (($minutos > 60) && ($minutos <= 120) ) {
    $valor = 32.00;
}
elseif ($minutos > 120) {
    $hr = 120;
    $valor = 32.00;
    while ($hr < $minutos){
        $valor = $valor + 9.00;
        $hr = $hr + 60;
    }
}


//verificação
if (!empty($id)) {
    $result_usuario = "DELETE FROM cliente WHERE id='$id'";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    if(mysqli_affected_rows($conn)) {
        $_SESSION["automovel"] = $placa;
        $_SESSION["valor"] = $valor;
        $_SESSION["valor_total"] = $_SESSION["valor_total"] + $_SESSION["valor"];
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