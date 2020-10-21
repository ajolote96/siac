<?php
    $conexion = new mysqli("localhost","ssbjaliscocom","Z5jtrL!@W@*22DDxW6KgsEzco","ssbjalis_encuestas");
    if($conexion->connect_errno):        
        echo "Error al conectarse a la base de datos debido al error: ". $conexion->connect_error;
    endif; 
    $output = '';
    $sql = "SELECT * FROM tbl_cac WHERE zone_id = '".$_POST["zonaId"]."' ORDER BY cac_id";
    $result = mysqli_query($connect, $sql);
    $output = '<option value="">Selecciona cac</option>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["cac_id"].'">'.$row["cac_name"].'</option>';
    }

    echo $output;
?>
