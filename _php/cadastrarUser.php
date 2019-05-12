<?php
    include_once 'conexao.php';
    session_start();
    echo $nome = isset($_POST['nome'])?$_POST['nome']:"";
    echo $email1 = isset($_POST['email1'])?$_POST['email1']:"";
    echo $senha1 = isset($_POST['senha1'])?$_POST['senha1']:"";
    echo $dataNasc = isset($_POST['dataNasc'])?$_POST['dataNasc']:"";
    echo $cpf = isset($_POST['cpf'])?$_POST['cpf']:"";
    echo $rg = isset($_POST['rg'])?$_POST['rg']:"";
    echo $tel = isset($_POST['tel'])?$_POST['tel']:"";
    echo $cep = isset($_POST['cep'])?$_POST['cep']:"";
    echo "<br>";
    echo $resi = isset($_POST['resi'])?$_POST['resi']:null;
    $senha1 = md5($senha1);
    $email1 = strtolower($email1);

    $sql = "INSERT INTO user (primeiroNome, email, senha, dataNasc, cpf, rg, celular, cep, residencia) 
        VALUES ('$nome', '$email1', '$senha1', '$dataNasc', '$cpf', '$rg', '$tel', '$cep', '$resi')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['SUCCESS'] = true;
        header("Location: ../index.php");
    }else {
        $_SESSION['ERROR'] = true;
        header("Location: ../index.php");
        
       
    }   

?>