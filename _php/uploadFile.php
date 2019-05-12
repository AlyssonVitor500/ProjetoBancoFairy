<?php
    include_once 'conexao.php';
    session_start();
    $id = $_SESSION['id'];
    if (isset($_FILES['arqv'])){
        $extensao = strtolower(substr($_FILES['arqv'] ['name'], -4));
        $novo_nome = md5(time()).$extensao;
        $diretorio = "imgProfile/";
        move_uploaded_file($_FILES['arqv']['tmp_name'], $diretorio.$novo_nome);

        $sql = "UPDATE user SET foto = '$novo_nome' WHERE id = '$id'";
        if(mysqli_query($conn, $sql)){
            $_SESSION['UPDATED'] = true;
            header("Location: ../logado.php");
        }else {
            $_SESSION['NOTUPDATED'] = true;
            header("Location: ../logado.php");
        }
    }

?>