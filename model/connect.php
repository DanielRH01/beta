<?php

    //Conexión a la base de datos con MySQLi.
    $conn = new mysqli("localhost", "root", "", "crud");
    $conn-> set_charset("utf8");

    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }//else{
       // echo "Conectado correctamente";
    //}
    // echo "Connected successfully";


    //Conexión a la base de datos con PDO.
    $dsn = "mysql:host=localhost; dbname=CRUD; charset=utf8";
    $usuario = "root";
    $contraseña = "";

    try {
        $pdo = new PDO($dsn, $usuario, $contraseña);
        // Establecer el modo de error como excepciones para facilitar la depuración
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Error de conexión: ' . $e->getMessage();
        exit;
    }
?>