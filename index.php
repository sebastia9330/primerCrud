
<?php
    require 'conexion.php'; #me trae los datos de la conexion para poder usar consultas sql

    #consulta que se ejecuta para traer todos los datos de la tabla desde la base de datos
    $consulta = "SELECT * FROM PRODUCTOS";
    $ejecuta = $conexion->query($consulta);
    $productos = $ejecuta->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- llamamos a bootstrap para os estilos-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <title>INDEX</title>
        <!-- llamamos a fontawesome para los iconos -->
        <script src="https://kit.fontawesome.com/4fdeae7d7c.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- hachemos un formulario para ingresar un poructo nuevo -->
        <div class='container-fluid row'>
            <form class='col-4 p-4' method='POST'>
                <h3 class='text-center text-secondary'>Registro de productos</h3>
                <?php
                #llamamos los datos del archivo crear.php para usar su codigo sobre el formulario
                include 'crear.php';
                ?>
                <div class="mb-3">
                    <label for="producto" class="form-label">Producto</label>
                    <input type="text" class="form-control" name="producto">
                </div>
                <div class="mb-3">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="text" class="form-control" name="precio">
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <input type="text" class="form-control" name="descripcion">
                </div>
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" name="stock">
                </div>
                <div class="mb-3">
                    <label for="fechaIngreso" class="form-label">Fecha de ingreso</label>
                    <input type="date" class="form-control" name="fechaIngreso">
                </div>
                <button type="submit" class="btn btn-primary" name='btGuardar' value='ok'>Guardar</button>
            </form>
            <!-- creamos la tabla para mostrar los productos -->
            <div class='col-8 p-4'>
                <table class='table table-dark table-striped'>
                    <thead class='bg-info'>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Descripcion</th>
                            <th>Stock</th>
                            <th>Fecha de ingreso</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php #usamos un ciclo foreach que recorre la tabla y nos va mostrando cada registo 
                        foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto['id']; ?></td>
                        <td><?php echo $producto['nombre']; ?></td>
                        <td><?php echo $producto['precio']; ?></td>
                        <td><?php echo $producto['descripcion']; ?></td>
                        <td><?php echo $producto['stock']; ?></td>
                        <td><?php echo $producto['fecha_ingreso']; ?></td>
                        <!-- creamos el boton con la accion editar enlazado al archivo editar -->
                        <td><a class='btn btn-small btn-warning' href='editar.php?id=<?php echo $producto['id']; ?>'><i class="fa-solid fa-pen-to-square"></i></a>
                        <!-- creamos un form para enviar una peticion post que es mucho mas segura para la accion de eliminar -->
                            <form method='POST' action='eliminar.php' style='display:inline'>
                                <input type='hidden' name='id' value="<?php echo $producto['id']; ?>">
                                <button class='btn btn-small btn-danger' type='submit'><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>        
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
        </div>
        

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
    </html>
