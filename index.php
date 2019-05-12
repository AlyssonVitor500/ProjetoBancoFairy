<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FairyBank</title>
    <link rel="shortcut icon" href="_img/bancoLogo.png" >
   
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> 


</head>

<?php
   
    include_once '_php/validaNaoLogin.php';
?>
<!-- CSS -->
<style>
    @media only screen and (max-width: 600px) {
        #image {
            margin-left: 35vh;
            -webkit-transform: scale(1.5);
        }

        div#imgs {
        height: 20vh;
        overflow: hidden;
      
       
         }
        
   
    }
    ::-webkit-scrollbar {
        width: 2px;
        height: 10px;
        -webkit-border-radius: 16px;
    }

    ::-webkit-scrollbar-track-piece {
        background-color: #ffffff;
        -webkit-border-radius: 1px;
    }
    ::-webkit-scrollbar-thumb:vertical {
        height: 2px;
        background-color: #120a8f;
        -webkit-border-radius: 3px;
    }
    *{
        padding: 0;
        margin: 0;
    }
    div.container-fluid {
        height: 100vh;
    }
    div#imgs {
        height: 80vh;
      
       
    }
    body{
        overflow-x: hidden;
    }

    img#slide1 {
        position:absolute;
        margin-top: -20vh;
    }
    #button-addon2{
        transition: .9s;
        border: 1px rgba(255,255,255,.4) solid;
        outline: none;
    }
    #button-addon2:hover{
        color: aqua;
        background-color: white;
      
    }
    #button-addon2:active {
        outline: none;
    }
    img#imgFooter {
        transition: .5s;
    }
    img#imgFooter:hover{
        -webkit-transform: scale(1.2);
    }
   
</style>
<body>

    <?php

        if(@$_SESSION['APAGADO']){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                    <strong>Conta Apagada! Obrigado por ter feito parte da nossa equipe. <br> Atenciosamente: Equipe FairyBank <img class='img' src='_img/imgSlides/bancoLogo.svg' width='30' height='30'></strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['APAGADO']);
        }    
        if(@$_SESSION['ERROR']){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Cadastro não Completado - Verifique suas credencias e tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['ERROR']);
        }
        if(@$_SESSION['SUCCESS']){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                    <strong>Cadastrado com Sucesso!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['SUCCESS']);
        }
        if(@$_SESSION['NOLOG']){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Email ou Senha estão incorretos, verifique e tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['NOLOG']);
        }
        
        
        
    ?>

    <!-- NavMenu -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <a class="navbar-brand mb-1" href="#">
            <img id="image" src="_img/imgSlides/bancoLogo.svg" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            
                <button type="button" id="logarBtn" class="nav-item btn text-sm-center "  data-toggle="modal" data-target="#exampleModal">
                    Logar
                </button>
                <button type="button" id="logarBtn" class="nav-item btn text-sm-center ml-lg-4 ml-md-2"  data-toggle="modal" data-target="#modalCadastro">
                    Cadastrar-se
                </button>
            
            </div>
            
        </div>
    </nav>
        
    <!-- Carroussel Index -->
            
        <div class="bd-example" >
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
            <div id="imgs" class="carousel-item active">
                <img id="slide1" src="_img/imgSlides/s1.jpg" class="d-block w-100 img-fluid"  alt="0">
                <div class="carousel-caption d-none d-md-block">
                <h1>Projete seu Futuro</h1>
                <p>Temos auxílio para lhe ajudar onde quiser.</p>
                </div>
            </div>
            <div id="imgs" class="carousel-item">
                <img id="slide2" src="_img/imgSlides/s2.jpg" class="d-block w-100 img-fluid"  alt="1">
                <div class="carousel-caption d-none d-md-block">
                <h1>Economize com a gente!</h1>
                <p>Faça o menos virar mais, para viver os bons momentos.</p>
                </div>
            </div>
            <div id="imgs" class="carousel-item">
                <img id="slide3" src="_img/imgSlides/s3.jpg" class="d-block w-100 img-fluid" alt="2">
                <div class="carousel-caption d-none d-md-block">
                <h1>Projete suas despesas!</h1>
                <p>Consiga aumentar seu dinheiro ao fim do mês.</p>
                </div>
            </div>
            <div id="imgs" class="carousel-item">
                <img id="slide4" src="_img/imgSlides/s4.jpg" class="d-block w-100 img-fluid" alt="3">
                <div class="carousel-caption d-none d-md-block">
                <h1>Acesse onde quiser</h1>
                <p>através do site.</p>
                </div>
            </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
        </div>





             
        

        <!-- Modal Login -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h2  class="modal-title" style="margin-left: 35%;" id="exampleModalLabel"><i class="fas fa-user fa-2x mr-2"></i>Logar</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="_php/logar.php" method="post" class="form-group">
                    <div class="row">
                        <div class="col-md-12">Email</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12"><input type="email" placeholder="Digite Aqui" required class="form-control" name="email" id=""></div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">Senha</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-group mb-3">
                                <input type="password" id="senha" name="senha" required class="form-control" placeholder="Digite Aqui"  aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn form-control" onclick="changeTxt()" type="button" id="button-addon2"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 text-right">
                            <h6 style="text-size: 9pt">Ainda não se cadastrou?</h6> 
                        </div>
                        <div class="col-md-4 col-sm-4 text-left">
                             <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCadastro">Cadastra-se</a> 
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <input type="submit"  value="Logar" class="btn btn-success">
            </div>
            </div>
            </form> 
        </div>
        </div> 
        <!-- MODAL CADASTRO -->
                <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-center">
                <h2 class="modal-title " style="margin-left: 30%;" id="modalLabel"> <i class="fas fa-user-plus fa-2x"></i> Cadastro</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="_php/cadastrarUser.php" method="post" class="form-group">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <label for="">Primeiro Nome*</label>
                            <input type="text" name="nome" required class="form-control" style="width: 100%;"> 
                        </div>
                        <div class="col-md-4">
                            <label for="">Email*</label>
                            <input type="email" name="email1" required class="form-control" style="width: 100%;"> 
                        </div>
                        <div class="col-md-4">
                            <label for="">Senha*</label>
                            <input type="password" name="senha1" required class="form-control" style="width: 100%;"> 
                        </div>
                     </div>

                     <div class="row text-center mt-2">
                        <div class="col-md-6">
                            <label for="">Data de Nascimento*</label>
                            <input type="date" name="dataNasc" required class="form-control" style="width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <label for="">CPF*</label>
                            <input type="text" id="cpf" name="cpf" required class="form-control" style="width: 100%;">
                        </div>
                     </div>

                     <div class="row text-center mt-2">
                        <div class="col-md-6">
                            <label for="">RG*</label>
                            <input type="text" name="rg" id="rg" required class="form-control" style="width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <label for="">Telefone Celular*</label>
                            <input type="text" name="tel" required class="form-control" id="num" style="width: 100%;">
                        </div>
                     </div>
                     <div class="row text-center mt-2">
                        <div class="col-md-6">
                            <label for="">CEP*</label>
                            <input type="text" name="cep" required class="form-control" id="cep"  style="width: 100%;">
                        </div>
                        <div class="col-md-6">
                            <label for="">Residência</label>
                            <input name="resi" class="form-control" max-length="100" style=" width: 100%;">
                        </div>
                     </div>
                     
                </div>   
                    
            
            </div>
            <div class="modal-footer">
                <input type="reset" class="btn btn-warning btn-md" value="Apagar Valores">
                <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancelar</button>
                <input type="submit" class="btn btn-success btn-md" value="Cadastrar">
            </div>
            
            </div>
            </form> 
        </div>
        </div>
        <!-- IMAGE 1 -->
        <section class="mt-1 pt-5 pr-4" style="background-attachment: fixed; background-image: url('_img/image1.jpg'); height: 100vh; background-position: 50% 50%; background-size: cover">
            <div class="container text-right" style="margin-top: 50vh">
                <h1 class="text-light" style="font-size: 60pt">Viaje!</h1>
            </div>
        </section>       

        <!-- IMAGE 2 -->
        <section class="mt-1 pt-5 pr-4" style="background-attachment: fixed; background-image: url('_img/image2.jpg'); height: 100vh; background-position: 50% 100%; background-size: cover">
            <div class="container text-right" style="margin-top: 50vh">
                <h1 class="text-light" style="font-size: 60pt">Faça novas memórias!</h1>
            </div>
        </section> 
        <!-- IMAGE 3 -->
        <section class="mt-1 pt-5 pr-4" style="background-attachment: fixed; background-image: url('_img/image3.jpg'); height: 100vh; background-position: 50% 50%; background-size: cover">
         <div class="container text-right" style="margin-top: 50vh">
                <h1 class="text-light" style="font-size: 60pt">Viva!</h1>
            </div>
        </section>       

        <!-- FOOTER -->
        <div class="card text-center">
            
            <div class="card-body">
                <h5 class="card-title">Projeto desenvolvido por Alysson Vitor</h5>
                
                <p class="card-text"><i class="fab fa-facebook-square fa-lg"></i> <a href="https://www.facebook.com/alyssonvitor500" target="_blank" rel="noopener noreferrer">Alysson Vitor</a> | <i class="fab fa-instagram fa-lg"></i> <a href="https://www.instagram.com/alyssonvitor500/" target="_blank" rel="noopener noreferrer">@AlyssonVitor500</a> | <i class="fab fa-twitter-square fa-lg"></i> <a href="https://twitter.com/AlyssonVitor123" target="_blank" rel="noopener noreferrer">@AlyssonVitor123</a> | <i class="fab fa-github fa-lg"></i> <a href="https://github.com/AlyssonVitor500" target="_blank" rel="noopener noreferrer">Alyssonvitor500</a></p>
                <p class="card-text "> Todos os direitos reservados à FairyBank&copy; </p>
                <p class="class-text"><img src="_img/bancoLogo.png" width="50" id="imgFooter" alt=""></p>
            </div>
            
        </div>
    
</body>
</html>

 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    var cont = 1;
    function changeTxt() {
        if (cont == 1){
            document.getElementById("senha").type = "text";
            cont++;
        }else {
            document.getElementById("senha").type = "password";
            cont--;
        }
    }

    
   

    
</script>

<script>
     $(document).ready(function () { 
          $("#num").mask('(99) 99999 - 9999');
          $("#cpf").mask('999.999.999-99');
          $("#rg").mask('9999999999-9');
          $("#cep").mask('99999-999');
       
    });
</script>