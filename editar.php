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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        
        <form class='col-4 p-4 m-auto' method='POST'>
            <h2>Editar Producto</h2>
            <div class='mb-3'>
                <label for='producto' class="form-label">Prodcuto</label>
                <input  class="form-control" type='text' id='nombre' name='nombre' value="<?php echo $producto['nombre']; ?>">
            </div>
            <div class='mb-3'>
                <label class="form-label" for='precio'>Precio</label>
                <input class="form-control" type='text' id='precio' name='precio' value="<?php echo $producto['precio']; ?>">
            </div>
            <div class='mb-3'>
                <label class="form-label" for='descripcion'>Descripcion</label>
                <input class="form-control" type='text' id='descripcion' name='descripcion' value="<?php echo $producto['descripcion']; ?>">
            </div>
            <div class='mb-3'>
                <label class="form-label" for='stock'>Stock</label>
                <input class="form-control" type='text' id='stock' name='stock' value="<?php echo $producto['stock']; ?>">
            </div>
            <div class='mb-3'>
                <label class="form-label" for='fecha_ingreso'>Fecha Ingreso</label>
                <input class="form-control" type='date' id='fecha_ingreso' name='fecha_ingreso' value="<?php echo $producto['fecha_ingreso']; ?>">
            </div>
            <button class="btn btn-primary" type='submit'>Guradar Cambios</button>
        </form>
    </body>
    </html>