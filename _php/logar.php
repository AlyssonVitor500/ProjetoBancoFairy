<?php
    include_once 'conexao.php';
    session_start();
    $email = isset($_POST['email'])?$_POST['email']:"";
    $senha = isset($_POST['senha'])?$_POST['senha']:"";
    $email = strtolower($email);
    $senha = md5($senha);


    $sql = $conn->query("SELECT * FROM user WHERE email = '$email' and senha = '$senha'");
    
    if(mysqli_num_rows($sql)>0){
        $_SESSION['logado'] = true;
        $_SESSION['email'] = $email;
        
        

        while($dados = $sql->fetch_assoc()){
            $_SESSION['nome'] = $dados['primeiroNome'];
            $_SESSION['id'] = $dados['id'];
         
        }

        header("Location: ../logado.php");
        
    }else {
        $_SESSION['NOLOG'] = true;
        header("Location: ../index.php");
    }
?>