<?php 

    require 'conexion.php';

    if(!empty($_POST['id'])){
        $id = $_POST['id'];
        $eliminar = $conexion->prepare(" delete from productos where id = :id");
        $eliminar->execute([':id' => $id]);
        if($eliminar->rowCount() > 0){
            header("Location: index.php");
            exit;
        }else{
            echo '<div>Error al eliminar</div>';
        };
    };

    

    


?>