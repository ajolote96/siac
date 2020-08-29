<?php
require "conectar.php";
$RPE = $_GET["rpe"];

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "DELETE FROM usuario WHERE rpe = '".$RPE."'";
$res = mysqli_query($conexion,$sql);
// if ($res)
//     echo 1;
// else 
//     echo 0;
if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}
?>