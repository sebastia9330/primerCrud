<?php
    
    $errores = [];


        if(!empty($_POST['btGuardar'])){
            if($_SESSION['csrf_token'] == $_POST['token']){
                    if(empty($_POST['producto']) || strlen($_POST['producto']) > 30){
                        array_push($errores, "<div class='alert alert-warning'>Error en el campo Producto, excede la cantidad de caracteres</div>");
                    }
                    if(empty($_POST['precio']) || !is_numeric($_POST['precio'])){
                        array_push($errores, "<div class='alert alert-warning'>Error en el campo Precio, formato equivocado</div>");
                    }
                    if(empty($_POST['descripcion']) || strlen($_POST['descripcion']) > 30){
                        array_push($errores, "<div class='alert alert-warning'>Error en el campo Descripcion, excede la cantidad de caracteres</div>");
                    }
                    if(empty($_POST['stock']) || !is_numeric($_POST['stock']) || $_POST['stock'] < 0){
                        array_push($errores, "<div class='alert alert-warning'>Error en el campo Stock, formato equivocado o valor menor a cero</div>");
                    }
                    if(empty($_POST['fechaIngreso']) || !strtotime($_POST['fechaIngreso'])){
                        array_push($errores, "<div class='alert alert-warning'>Error en el campo Fecha de ingreso, formato equivocado</div>");
                    }
                    if(!empty($errores)){
                        foreach($errores as $error){
                            echo $error;
                        }
                    }else{

                        $nombre=$_POST['producto'];
                        $precio=$_POST['precio'];
                        $descripcion=$_POST['descripcion'];
                        $stock=$_POST['stock'];
                        $fecha_ingreso=$_POST['fechaIngreso'];
    
                    $sql = $conexion->prepare("insert into productos (nombre, precio, descripcion, stock, fecha_ingreso)
                                                            values (?,?,?,?,?)");
    
                    $resultado = $sql->execute([$nombre, $precio, $descripcion, $stock, $fecha_ingreso]);
    
                        
                    if($resultado){
                        $_SESSION['exito'] = "<div class='alert-success'>Producto registrado con exito</div>";
                        header("Location: index.php");
                        exit;
                    }else{
                        echo "<div class='alert-danger'>Error al registrar el producto</div>";
                    }
                    }
            }else{
                echo '<div>Error de validacion, Token equivocado</div>';
            }
        }


?>