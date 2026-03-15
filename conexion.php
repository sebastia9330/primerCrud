<?php

    $host = 'localhost';
    $db = 'PrimerCRUD';
    $user = 'root';
    $password = '';

    try{
        $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $password);
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo 'Conexion exitosa';
    }catch (PDOException $e){
        echo "Error de conexión: " . $e->getMessage();
    }
