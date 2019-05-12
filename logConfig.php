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
        $nome = $dados['primeiroNome'];
        $email = $dados['email'];
        $cpf = $dados['cpf'];
        
        $celular = $dados['celular'];
        $cep = $dados['cep'];
        $resi = $dados['residencia'];
        $dataNasc = $dados['dataNasc'];
        $RG = $dados['rg'];
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
   div#config input[type="text"], div#config input[type="date"]{
       
       background-color: rgba(0,0,0,.2);
       text-align: center;
       color: white
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
        if(@$_SESSION['SenhaErrada']){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Senha atual incorreta, tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['SenhaErrada']);
        }
        if(@$_SESSION['AlteradoSucesso']){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                    <strong>Senha alterada com Sucesso!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['AlteradoSucesso']);
        }
        if(@$_SESSION['NaoAlterado']){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Senha não Alterada, tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['NaoAlterado']);
        }
        if(@$_SESSION['NOALTER']){
            echo "
                <div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                    <strong>Valores não Alterados, tente novamente!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['NOALTER']);
        }
        if(@$_SESSION['ALTER']){
            echo "
                <div class='alert alert-success alert-dismissible fade show text-center' role='alert'>
                    <strong>Valores Alterados!</strong>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Clos'e>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>
            
            ";
            unset($_SESSION['ALTER']);
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

                <div class="nav-item dropdown" style="width: 30vh; margin-left: 125vh">
                    <button class="btn dropdown ml-2"  type="button" style="width:10vh; height: 9vh; " id="opc" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="container-fluid" style="border-radius: 50%;width: 6vh;height: 5vh; overflow:hidden; background-image: url('<?php echo '_php/imgProfile/'.$foto;?>'); background-size: cover; background-position: 50% 50%" >
                            
                        </div>

                       
                       
                    </button>
                    <div class="dropdown-menu" aria-labelledby="opc">
                        <h5 class="btn dropdown-item" disabled>Olá <?php echo $nome;?></h5>
                        <hr>
                        <a class="btn dropdown-item" data-toggle="modal" data-target="#modalFile" >Mudar imagem de perfil</a>
                        <a logConfig.php class="btn dropdown-item" >Configurações</a>
                        <a href="#" class="btn dropdown-item" >Gerenciar minhas contas</a>
                        <hr>
                        <a href="_php/logout.php" class="btn dropdown-item" >Sair</a>
                        
                    </div>
                </div>
            
            </div>
            
        </div>
    </nav>
        
    





             
        

      
        
        <!-- IMAGE 3 -->
        <section class="mt-1 " style="background-attachment: fixed; background-image: url('_img/image5.jpg'); padding-bottom: 1vh; background-position: 50% 50%; background-size: cover">
            <div id="config" class="container text-center text-light pt-3 pb-2" style="border: 1px solid white;">
                
                
               <div class="row">
                    <div class="col-md-12 text-center">
                        <i class="fas fa-id-card fa-5x"  ></i> <h3>Configuração de Usuário</h3>
                    </div>
               
               </div>
                    <div class="text-center container" >
                        <label for="">Profile</label>
                        <div class="container" style="width: 20%; height: 50vh; border: .5px solid white; background-image: url('<?php echo '_php/imgProfile/'.$foto;?>'); background-position: 50% 50%; background-size: cover"></div>
                    </div>
               <div class="row text-center mt-2" >
                    
                    <div class="col-md-4 text-center">
                        <label for="">Nome</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $nome; ?>">
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $email; ?>">
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="">Data de Nascimento</label>
                        <input type="date" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $dataNasc; ?>">
                    </div>
               </div>
               <div class="row text-center mt-2" >
                    
                    <div class="col-md-4 text-center">
                        <label for="">Cpf</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $cpf; ?>">
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="">RG</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $RG; ?>">
                    </div>
                    <div class="col-md-4 text-center">
                        <label for="">CEP</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $cep; ?>">
                    </div>
               </div>
               <div class="row text-center mt-2" >
                    
                    
                    <div class="col-md-6 text-center">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $celular; ?>">
                    </div>
                    <div class="col-md-6 text-center">
                        <label for="">Residência</label>
                        <input type="text" class="form-control" name="" disabled id="" style="width: 100%" value="<?php echo $resi; ?>">
                    </div>
               </div>

               <div class="row  mt-4 text-center">
                    <div class="col-md-4">
                        <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#changePass" style="width: 95%"> Modificar Senha <i class="fab fa-keycdn ml-5"></i></button>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-warning btn-lg" data-target="#AlterValues" data-toggle="modal" style="width: 95%"> Modificar Valores <i class="fas fa-exchange-alt ml-5"></i></button>
                    </div>
               
               
                    <div class="col-md-4">
                        <button class="btn btn-danger btn-lg" data-toggle="modal" data-target="#delete" style="width: 95%"> Deletar Conta <i class="far fa-trash-alt ml-5"></i></button>
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

       

    <!-- Modal para Modificar Img PROFILE -->
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
    <!-- Modal para atualizar senha -->
    <form action="_php/trocaSenha.php" class="form-group" method="post">
    <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <i class="fab fa-keycdn fa-3x"></i><h2 class="modal-title" id="exampleModalLabel">Atualizar Senha</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="row text-center">
                    <div class="col-md-12">
                        <label for="">Senha Antiga</label>
                            <div class="input-group mb-3">
                                <input type="password" id="senhaA" name="senhaA" required class="form-control" placeholder="Digite Aqui"  aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn form-control" onclick="changeTxt()" type="button" id="button-addon2"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                    </div>

                </div>
                <hr>
                <div class="row text-center">
                    <div class="col-md-12">
                        <label for="">Nova Senha</label>
                            <div class="input-group mb-3">
                                <input type="password" id="senhaN" name="senhaN" required class="form-control" placeholder="Digite Aqui"  aria-label="Recipient's username" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn form-control" onclick="changeTxt()" type="button" id="button-addon2"><i class="fas fa-eye"></i></button>
                                </div>
                            </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="zeraCampo()" class="btn btn-danger" data-dismiss="modal">Cancelar </button>

                <input type="submit" class="btn btn-success" value="Atualizar ">
            </div>
            </div>
        </div>
       
    </div>
    </form>
            <!-- Modal Alterar Valores -->
        <form action="_php/updateUser.php" class="form-group" method="post">    
            <div class="modal fade" id="AlterValues" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            
                            <i class="fas fa-user-cog fa-3x"></i> <h2 class="modal-title" id="exampleModalLabel1"> Modificar Valores</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <label for="">CEP</label>
                                    <input type="text" name="cep" id="cep" style="text-align: center" class="form-control" value="<?php echo $cep; ?>">
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <label for="">Celular</label>
                                    <input type="text" name="celular" id="celular" style="text-align: center" class="form-control" value="<?php echo $celular;?>">
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-md-12">
                                    <label for="">Residência</label>
                                    <input type="text" name="resi" style="text-align: center" class="form-control" value="<?php echo $resi;?>">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-success" value="Salvar mudanças">
                        </div>
                    </div>
                    
                </div>
            </div>
        </form>

                <!-- MODAL PARA DELETAR CONTAGERAL -->
        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
            <i class="fas fa-exclamation-triangle fa-3x" style="color: #ffa500;"></i><h3 class="modal-title" id="exampleModalLabel2">Tem certeza disso?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4 style="text-align: justify; font-size: 15pt; font-weight: normal;">Ao deletar sua conta geral, todas os seus arquivos serão removido permanentemente.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <a href="_php/deleteAll.php" class="btn btn-warning">Estou ciente e desejo continuar</a>
            </div>
            </div>
        </div>
        </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="_js/jquery.mask.js"></script>
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

    function zeraCampo(){
        document.getElementById("senhaN").value = "";
        document.getElementById("senhaA").value = "";
    }
    
   
   
    
</script>
<script>
     $(document).ready(function () {
        $("#cep").mask('99999-999');
        $("#celular").mask('(99) 99999 - 9999');
    });
</script>