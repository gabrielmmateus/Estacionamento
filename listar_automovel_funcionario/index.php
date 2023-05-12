<?php
    session_start();
    include_once("conexao.php")
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link rel="stylesheet" href="estilo.css">
    <link rel="shortcut icon" href="img/carro.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</head>
<body id="body">
    


    
     
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #FAA510;">
    <div class="container-fluid">
      <img src="./img/carro.png" alt="" style="width:55px">
      <a class="navbar-brand" href="javascript:void(0)" id="nome">DREAM PARKING</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-5" id="mynavbar">
   
        <li class="nav justify-content-end col-12">
            <a class="nav-link text-md-center"  href="../home-funcionario/index.php" style="color: #FFF; background-color: #FAA510; font-weight: bold; margin-left: 90px; border-style: none;" id="login_button">Voltar</a>
        </li>
        </form>
      </div>
    </div>
  </nav>

<br>

<h1 id="h1">Lista de Automóveis</h1>

    <div>
    <?php
        $result_pg= "SELECT COUNT(id) AS num_result FROM cliente";
        $resultado_pg= mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);

        echo "<p id='quantidade'>Quantidade de vagas preenchidas: " . $row_pg["num_result"] . "</p>";

        if(isset($_SESSION["valor"])) {   // isset() verifica se a variavel existe;
          echo "<p id='quantidade'>Valor a pagar do automóvel com placa ". $_SESSION["automovel"] . ": " . $_SESSION["valor"] . " reais.</p><br>";
          unset($_SESSION["valor"]);    // apaga a variável anterior como argumento.
        }
        if(isset($_SESSION["msg"])) {   // isset() verifica se a variavel existe;
          echo "<p id='quantidade'>" . $_SESSION["msg"] . "</p><br>";
          unset($_SESSION["msg"]);    // apaga a variável anterior como argumento.
        }
        //RECEBER O NÚMERO DA PAGINA
        $pagina_atual= filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        //Setar a quantidade de itens por pagina
        $qnt_result_pg = 3;
        //calcular o inicio visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_usuarios = "SELECT * FROM cliente LIMIT $inicio, $qnt_result_pg";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);
        //visualização
        while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
            echo "<div id= div1>";
            echo "<img id=imagem src='./img/carro1.png'>"; 
            
            echo "<a id= nomePLACA>";
            echo "ID: " . $row_usuario['id'];
            echo "<br>" . "Placa: " . $row_usuario['placa'] . "<br>";
            echo "</a>";

            echo "<a href='proc_encerrar_automovel.php?id="  . $row_usuario['id'] . "' class= 'final'>Encerrar</a>";
            echo "</div> <br><br>";
            
            
        }
        //Parte do CADASTRAR(LISTA)
        echo "<a id= 'cadastrar' href='cadastro_veiculo_funcionario.php'>Cadastrar</a><br><br>";



        echo "<br><br><br><br>";
        //Quantidade de pagina
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
        //Limitar os links nates depois
        $max_links = 2;

        // &nbsp = parágrafo/espaço do texto
        echo "&nbsp;&nbsp;&nbsp;&nbsp;<a href='index.php?pagina=1'><</a>";

        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                echo"<a href='index.php?pagina=$pag_ant'>$pag_ant</a>";
            }
        }

        echo "$pagina";
        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                echo"<a href='index.php?pagina=$pag_dep'>$pag_dep</a>";
            }
        }

       
        echo "<a href= 'index.php?pagina=$quantidade_pg'>></a>";
        
    ?>

    </div>

    
  <div id="footer">

    
<footer style="background-color: #FAA510;" class="d-flex flex-wrap justify-content-between align-items-center py-3  border-top" id="rodape">
  <p class="col-md-4 mb-0" id="copy" style="padding-left: 1%;">© 2023, DREAM PARKING <br>Marcas e nomes de produtos são marcas registradas de
    seus respectivos donos. <br>
    Trabalho acadêmico sem fins lucrativos.
  </p>
  
  <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    
  </a>
  
  <ul class="nav col-mc-4 justify-content-end">
    <li class="nav-item"><a href="index.php" class="nav-link px-2" id="home" style="font-size: 14px; color: #FFF;">Início</a></li>
    <li class="nav-item"><a href="#" class="nav-link px-1" id="termos" style="font-size: 14px; color: #FFF;">Política de
      Privacidade</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-4" id="ajuda" style="font-size: 14px; color: #FFF;">Ajuda</a></li>
      
    </ul>
  </footer>
</div>

</body>
</html>