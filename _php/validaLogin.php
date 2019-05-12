<?php
    session_start();
    if(@!$_SESSION['logado']){
        header("Location: index.php");
    }

?>