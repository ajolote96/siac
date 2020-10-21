<?php
    $connect = mysqli_connect("localhost", "root", "", "ssbjalis_encuestas");
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