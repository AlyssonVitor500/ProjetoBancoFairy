<?php

    $conn = mysqli_connect("localhost:3306","root","121202","fairybank");
    $conn->set_charset("utf8");
    if(!$conn){
        echo "ERROR: " . mysqli_connect_error();
    }else {
       
    }

?>