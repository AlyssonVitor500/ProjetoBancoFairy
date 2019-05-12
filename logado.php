<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FairyBank</title>
    <link rel="shortcut icon" href="_img/bancoLogo.png" >
    <link rel='stylesheet' href='_css/bootstrap.min.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>
<?php
    include_once '_php/conexao.php';
    include_once '_php/validaLogin.php';

    $nome = $_SESSION['nome'];
    $id = $_SESSION['id'];
    $sql = $conn->query("SELECT * FROM user WHERE id = '$id'");
    
    while($dados = $sql->fetch_assoc()){
        $foto = $dados['foto'];
    }
    
?>
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
        
        if(@$_SESSION['UPDATED']){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                    <strong>Imagem alterada com sucesso!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['UPDATED']);
        }
        if(@$_SESSION['NOTUPDATED']){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Imagem não alterada!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['NOTUPDATED']);
        }
        
        
        
        
    ?>
    <!-- NavMenu -->
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
        <a class="navbar-brand mb-1" href="#">
            <img id="image" src="_img/imgSlides/bancoLogo.svg" width="40" height="40" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
            
                <a href="" style="height:8vh" class="nav-item btn text-center text-sm-center mt-2">
                    Home
                </a>
                <a href="" style="height:8vh" class="nav-item btn text-sm-center text-center mt-2 ml-lg-4 ml-md-2">
                    Contas
                </a>

                <div class="nav-item dropdown" style="width: 30vh;margin-left: 125vh">
                    <button class="btn dropdown"  type="button" style="width:10vh; height: 9vh" id="opc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="container-fluid" style="border-radius: 50%;width: 6vh;height: 5vh; overflow:hidden; background-image: url('<?php echo '_php/imgProfile/'.$foto;?>'); background-size: cover; background-position: 50% 50%" >
                            
                        </div>

                       
                       
                    </button>
                    <div class="dropdown-menu" aria-labelledby="opc">
                        <h5 class="btn dropdown-item" disabled>Olá <?php echo $nome;?></h5>
                        <hr>
                        <a class="btn dropdown-item" data-toggle="modal" data-target="#modalFile" >Mudar imagem de perfil</a>
                        <a href="logConfig.php" class="btn dropdown-item" >Configurações</a>
                        <a href="#" class="btn dropdown-item" >Gerenciar minhas contas</a>
                        <hr>
                        <a href="_php/logout.php" class="btn dropdown-item" >Sair</a>
                        
                    </div>
                </div>
            
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





             
        

      
        
        <!-- IMAGE 3 -->
        <section class="mt-1  pr-4" style="background-attachment: fixed; background-image: url('_img/image4.jpg'); height: 90vh; background-position: 50% 50%; background-size: cover">
            <div class="container text-center text-light">
                
                
                
                <div class="row ">
                    <div class="col-md-12">
                        <a href="" style="font-size: 30pt;width: 80%; margin-top: 50vh" class="btn btn-lg btn-outline-info" > Gerenciar minhas contas <i class="fas fa-globe fa-lg"></i></a>
                    </div>
                
                </div>
                
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

       

    <!-- Modal -->
    <div class="modal fade" id="modalFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-user-cog fa-2x"></i> Modificar Imagem de Perfil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="_php/uploadFile.php" class="from-group" method="post" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="container text-center">
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Escolha o Local do arquivo</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <div class="input-group mb-3">
                                    
                                    <div class="custom-file">
                                        <input type="file" required name="arqv" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Escolher arquivo</label>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <input type="submit" class="btn btn-success" value="Enviar">
            </div>
            </div>
        </form>
    </div>
    </div>
    
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="_js/jquery.mask.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
