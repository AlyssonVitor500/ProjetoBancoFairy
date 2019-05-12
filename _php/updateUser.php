<?php
    include_once 'conexao.php';
    session_start();
    $id = $_SESSION['id'];
    $cep = isset($_POST['cep'])?$_POST['cep']:"";
    $resi = isset($_POST['resi'])?$_POST['resi']:"";
    $celular = isset($_POST['celular'])?$_POST['celular']:"";

    $sql = "UPDATE user SET cep = '$cep', residencia = '$resi', celular = '$celular' WHERE id ='$id'";
    if(mysqli_query($conn, $sql)){
        $_SESSION['ALTER'] = true;
        header("Location: ../logConfig.php");
    }else {
        $_SESSION['NOALTER'] = true;
        header("Location: ../logConfig.php");
        
    }



?>