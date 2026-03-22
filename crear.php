<?php

    if(!empty($_POST['btGuardar'])){
        if(!empty($_POST['producto']) && 
        !empty($_POST['precio']) && 
        !empty($_POST['descripcion']) &&
        !empty($_POST['stock']) &&
        !empty($_POST['fechaIngreso'])){
            
            $nombre=$_POST['producto'];
            $precio=$_POST['precio'];
            $descripcion=$_POST['descripcion'];
            $stock=$_POST['stock'];
            $fecha_ingreso=$_POST['fechaIngreso'];

            $sql = $conexion->prepare("insert into productos (nombre, precio, descripcion, stock, fecha_ingreso)
                                                    values (?,?,?,?,?)");

            $resultado = $sql->execute([$nombre, $precio, $descripcion, $stock, $fecha_ingreso]);


            if($resultado){
                echo "<div class='alert-success'>Producto registrado con exito</div>";
                exit;
            }else{
                echo "<div class='alert-danger'>Error al registrar el producto</div>";
            }
        }else{
            echo "<div class='alert alert-warning'>Alguno de los campos esta vacio</div>";
        }
    }
?>