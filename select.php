<?php
    require 'conexion.php'; #me trae los datos de la conexion para poder usar consultas sql

    #consulta que se ejecuta para traer todos los datos de la tabla desde la base de datos
    $consulta = "SELECT * FROM PRODUCTOS";
    $ejecuta = $conexion->query($consulta);
    $productos = $ejecuta->fetchAll(PDO::FETCH_ASSOC);

?>