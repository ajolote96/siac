<?php
   require "php/conecta.php";
   /*$sql = "SELECT * FROM campañas WHERE eliminado=0";
   $res = mysqli_query($con, $sql);
   $num = mysqli_num_rows($res);
   
   
   $connect = mysqli_connect("localhost", "root", "", "ssbjalis_encuestas");*/
    $output = '';
    $sql = "SELECT * FROM tbl_zona WHERE div_id = '".$_POST["divisionId"]."' ORDER BY zone_id";
    $result = mysqli_query($con, $sql);
    $output = '<option value="">Selecciona zona</option>';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '<option value="'.$row["zone_id"].'">'.$row["zone_name"].'</option>';
    }

    echo $output;
?>
