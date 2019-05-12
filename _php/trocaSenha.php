<?php
    session_start();
    include_once 'conexao.php';
    $senhaA = isset($_POST['senhaA'])?$_POST['senhaA']:"";
    $senhaN = isset($_POST['senhaN'])?$_POST['senhaN']:"";

    $senhaA = md5($senhaA);
    $senhaN = md5($senhaN);

    $id = $_SESSION['id'];
    $sql = $conn->query("SELECT senha FROM user WHERE id = '$id'");
    while($dado = $sql->fetch_assoc()){
        $senhaCfrm = $dado['senha'];
    }
    if(!($senhaCfrm == $senhaA)){
        $_SESSION['SenhaErrada'] = true;
        header("Location: ../logConfig.php");
    }else {
        $sql_cmd = "UPDATE user SET senha = '$senhaN' WHERE id = '$id'";
        if(mysqli_query($conn, $sql_cmd)){
            $_SESSION['AlteradoSucesso'] = true;
            header("Location: ../logConfig.php");
        }else {
            $_SESSION['NaoAlterado'] = true;
            header("Location: ../logConfig.php");
        }
    }

?>