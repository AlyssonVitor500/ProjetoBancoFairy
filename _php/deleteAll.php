<?php
    include_once 'conexao.php';


    session_start();
    $id = $_SESSION['id'];

    $sql = "DELETE FROM user WHERE id = '$id'";

    if(mysqli_query($conn, $sql)){
        $_SESSION['logado'] = false;
        $_SESSION['APAGADO'] = true;
        header("Location: ../index.php");
    }


?>