<?php
    $conexion = new mysqli("localhost","ssbjaliscocom","Z5jtrL!@W@*22DDxW6KgsEzco","ssbjalis_encuestas");
    if($conexion->connect_errno):        
        echo "Error al conectarse a la base de datos debido al error: ". $conexion->connect_error;
    endif; 
    $output = '';
    $sql = "SELECT * FROM tbl_zona WHERE div_id = '".$_POST["divisionId"]."' ORDER BY zone_id";
    $result = mysqli_query($connect, $sql);
    $output = '<option value="">Select zona</option>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["zone_id"].'">'.$row["zone_name"].'</option>';
    }

    echo $output;
?>
