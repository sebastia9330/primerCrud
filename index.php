<?php
    require 'conexion.php';

    $consulta = "SELECT * FROM PRODUCTOS";
    $ejecuta = $conexion->query($consulta);
    $productos = $ejecuta->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>INDEX</title>
    </head>
    <body>
        <table border = '1'>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>stock</th>
                <th>fecha de ingreso</th>
            </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['stock']; ?></td>
                <td><?php echo $producto['fecha_ingreso']; ?></td>
                <td><a href='editar.php?id=<?php echo $producto['id']; ?>'>Editar</a></td>
            </tr>
        
        <?php endforeach; ?>
        </table>
    </body>
    </html>