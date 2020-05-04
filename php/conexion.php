<?php
    $conexion = new mysqli("localhost","ssbjaliscocom","Guadalajara1","ssbjalis_encuestas");
    if($conexion->connect_errno):
        echo "Error al conectarse a la base de datos debido al error: ". $conexion->connect_error;
    endif;  
    
?>
