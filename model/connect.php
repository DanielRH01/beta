<?php

    $conn = new mysqli("localhost", "root", "", "crud");
    $conn-> set_charset("utf8");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }//else{
       // echo "Conectado correctamente";
    //}
    // echo "Connected successfully";


?>