<?php 

    session_start();
    require 'conexion.php';


    if($_SESSION['csrf_token'] == $_POST['token']){
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
    }else{
        echo '<div>Error de validacion, Token equivocado</div>';
    }

    

    


?>