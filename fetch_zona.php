<?php
    $connect = mysqli_connect("localhost", "root", "", "ssbjalis_encuestas");
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