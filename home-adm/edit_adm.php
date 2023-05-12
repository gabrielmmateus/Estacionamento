<?php
    session_start();
    include_once('conexao.php');
    $usuario = $_SESSION["usuario"];
    $result_usuarios = "SELECT * FROM admin WHERE id = '$usuario'";
    $resultado_usuarios = mysqli_query($conn , $result_usuarios);
    $row_usuario = mysqli_fetch_assoc($resultado_usuarios); //retornar uma matriz associativa representando a próxima linha no conjunto de resultados representado pelo parâmetro result , aonde cada chave representa o nome de uma coluna do conjunto de resultados.
    $id = $row_usuario['id'];
    $senha = $row_usuario['senha'];

    if (is_numeric($senha)){
        $senha = $senha;
    }
    else{
        $senha = base64_decode($senha);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
  <link rel="stylesheet" href="edit_adm.css">
  <title>DREAM PARKING - EDIT-ADM</title>
  <link rel="shortcut icon" href="img/carro.png" type="image/x-icon">

</head>

<body id="body">

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #FAA510;">
    <div class="container-fluid">
      <img src="./img/carro.png" alt="" style="width:55px">
      <a class="navbar-brand" id="nome">DREAM PARKING</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-5" id="mynavbar">    
          
        <li class="nav justify-content-end col-12">
            <a class="nav-link text-md-center"  href="../home-adm/index.php" style="color: #FFF; background-color: #FAA510; font-weight: bold; margin-left: 90px; border-style: none;" id="login_button">Voltar</a>
        </li>

      </div>
    </div>
  </nav>


  
  <section style="background-color:#D9D9D9;" class="vh-100 gradient-custom" id="fundo">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5" >
          <div  class="card  text-warning" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
  
              <div class="mb-md-1 mt-md-1 pb-1">
  
                <h2 class="fw-bold mb-2 ">EDITAR</h2><br><br>
                <?php
                  if(isset($_SESSION["msg"])) {   // isset() verifica se a variavel existe;
                    echo $_SESSION["msg"];
                    unset($_SESSION["msg"]);    // unset() destrói a variável passada como argumento, melhor utilizada em escopo global
                  }
                ?>
                
                <form action="proc_edit_adm.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
                  <div class="form-outline form-white mb-4">
                    <label  for="usuario">Usuário</label>
                    <input type="text" id="usuario" name="usuario" class="form-control form-control-lg" placeholder="Insira o Usuário" value="<?php echo $row_usuario['usuario']; ?>" required/>
                  </div>
  
                  <div class="form-outline form-white mb-4">
                    <label  for="senha">Senha</label>
                    <input type="password" id="senha" name="senha" class="form-control form-control-lg" placeholder="Insira a Senha" value="<?php echo $senha; ?>" required/>
                    <br><br><button type="button" onclick="mostrarSenha()" style="border: none; background-color: #FFF;"><img id="olho" src="./img/visivel.png"/></button>
                  </div>

                  <br><br><br><button style=" border-color: #FAA530; background-color: #FAA510;" class="btn btn-outline-light btn-lg px-5" type="submit">Editar</button>
                </form>
  
              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                  <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                  <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>
                
    
  
              </div>
  
              
  
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div id="footer">

    
    <footer style="background-color: #FAA510;" class="d-flex flex-wrap justify-content-between align-items-center py-3  border-top" id="rodape">
      <p class="col-md-4 mb-0" id="copy" style="padding-left: 1%;">© 2023, DREAM PARKING <br>Marcas e nomes de produtos são marcas registradas de
        seus respectivos donos. <br>
        Trabalho acadêmico sem fins lucrativos.
      </p>
      
      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        
      </a>
      
      <ul class="nav col-mc-4 justify-content-end">
        <li class="nav-item"><a href="edit_adm.php" class="nav-link px-2" id="home" style="font-size: 14px; color: #FFF;">Início</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-1" id="termos" style="font-size: 14px; color: #FFF;">Política de
          Privacidade</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-4" id="ajuda" style="font-size: 14px; color: #FFF;">Ajuda</a></li>
          
        </ul>
      </footer>
    </div>

    <script>
      function mostrarSenha(){
        let tipo = document.getElementById("senha");
        let icon = document.getElementById("olho");

        if (tipo.type == "password"){
          icon.src = './img/invisivel.png';
          tipo.type = ("text");
        }
        else{
          icon.src = './img/visivel.png';
          tipo.type = "password";
        }
      }
    </script>

   
</body>
</html>


