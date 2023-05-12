<!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css">
  <title>HOME - ADM</title>
  <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
  <link rel="shortcut icon" href="img/carro.png" type="image/x-icon">
</head>

<body id="body">
  
  <!-- APRESENTAÇÃO DO HEADER  ----------------------------------------------------------------------------------------------------------------------->

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #FAA510;">
    <div class="container-fluid">
      <img src="./img/carro.png" alt="" style="width:55px">
      <a class="navbar-brand" id="nome">DREAM PARKING</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-5" id="mynavbar">
                 
        <form action="../login e cadastros/proc_sair.php" method="post" class="nav justify-content-end col-12">
          <li class="nav justify-content-end col-12">
            <button class="nav-link text-md-center" type="submit" href="" style="color: #FFF; background-color: #FAA510; font-weight: bold; margin-left: 90px; border-style: none;" id="login_button">Sair</button>
          </li>
        </form>

      </div>
    </div>
  </nav>

  <?php
    if(isset($_SESSION["msg"])) {   // isset() verifica se a variavel existe;
      echo $_SESSION["msg"];
      unset($_SESSION["msg"]);    // unset() destrói a variável passada como argumento, melhor utilizada em escopo global
    }
  ?>



<!-- Inserindo botões com determinadas funções | Cadastrar = Funcionários ou Automóveis | Relatório Final---->
    <p style="opacity: 0.6;">Se deseja alterar sua senha, role a pagina para baixo, aonde encontrará um botão.</p>




<div id="alinhamento">
<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="../listar_funcionario/index.php">
          <div class="wrimagecard-topimage_header" style="background-color:  #add8e6">
            <center><img src="img/worker.png" alt="" style="width: 70px; height: 70px;"></center>
          </div>
          <div class="wrimagecard-topimage_title" >
            <h4>Funcionários
           
            </h4>
          </div>
          
        </a>
      </div>
	</div>
	<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="../listar_automovel/index.php">
          <div class="wrimagecard-topimage_header" style="background-color: #f7A156">
             <center><img src="img/carro.png" alt="" style="width: 75px; height: 70px;"></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Automóveis
              
            </h4>
          </div>
          
        </a>
      </div>
	</div>
	<div class="col-md-3 col-sm-4">
      <div class="wrimagecard wrimagecard-topimage">
          <a href="../rendimento/index.php">
          <div class="wrimagecard-topimage_header" style="background-color:  #ebf3e7 ">
             <center><img src="img/money.png" alt="" style="width: 70px; height: 70px;"></center>
          </div>
          <div class="wrimagecard-topimage_title">
            <h4>Rendimento</h4>
          </div>
         
        </a>
      </div>
	</div>

</div>

<form action="edit_adm.php" method="post">
  <br><br><br><button style=" border-color: #FAA530; background-color: #FAA510;" class="btn btn-outline-light btn-lg px-5" type="submit">Alterar senha</button>
</form>
	
	


<!-- footer ---------------------------------------------------------------------------------------------- -->
  <div id="footer">

    
    <footer style="background-color: #FAA510;" class="d-flex flex-wrap justify-content-between align-items-center py-3  border-top" id="rodape">
      <p class="col-md-12 mb-0" id="copy" style="padding-left: 1%;">© 2023, DREAM PARKING <br>Marcas e nomes de produtos são marcas registradas de
        seus respectivos donos. <br>
        Trabalho acadêmico sem fins lucrativos.
      </p>
      
      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        
      </a>
      
      <ul class="nav col-mc-4 justify-content-end">
        <li class="nav-item"><a href="../home-adm/index.php" class="nav-link px-2" id="home" style="font-size: 14px; color: #FFF;">Início</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-1" id="termos" style="font-size: 14px; color: #FFF;">Política de
          Privacidade</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-4" id="ajuda" style="font-size: 14px; color: #FFF;">Ajuda</a></li>
          
        </ul>
      </footer>
    </div>