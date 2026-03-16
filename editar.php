<?php

    require 'conexion.php';

    $id = $_GET['id'];

    $buscar = 'SELECT * FROM productos where id = ?';
    $ejecutar = $conexion->prepare($buscar);
    $ejecutar->execute([$id]);
    $producto = $ejecutar->fetch(PDO::FETCH_ASSOC);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $descripcion = $_POST['descripcion'];
        $stock = $_POST['stock'];
        $fecha_ingreso = $_POST['fecha_ingreso'];

        $consulta = "UPDATE productos
                    SET nombre=?, precio=?, descripcion=?, stock=?, fecha_ingreso=?
                    WHERE id=?";
        
        $ejecutaup = $conexion->prepare($consulta);
        $ejecutaup->execute([$nombre, $precio, $descripcion, $stock, $fecha_ingreso, $id]);

        header("Location: index.php");
    }
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INDEX</title>
    </head>
    <body>
        <h2>Editar Producto</h2>

        <form method='POST'>
            <label for='producto'>Prodcuto</label>
            <input type='text' id='nombre' name='nombre' value="<?php echo $producto['nombre']; ?>">
            <br><br>
            <label for='precio'>Precio</label>
            <input type='text' id='precio' name='precio' value="<?php echo $producto['precio']; ?>">
            <br><br>
            <label for='descripcion'>Descripcion</label>
            <input type='text' id='descripcion' name='descripcion' value="<?php echo $producto['descripcion']; ?>">
            <br><br>
            <label for='stock'>Stock</label>
            <input type='text' id='stock' name='stock' value="<?php echo $producto['stock']; ?>">
            <br><br>
            <label for='fecha_ingreso'>Fecha Ingreso</label>
            <input type='date' id='fecha_ingreso' name='fecha_ingreso' value="<?php echo $producto['fecha_ingreso']; ?>">
            <br><br>
            <button type='submit'>Guradar Cambios</button>
        </form>
    </body>
    </html>