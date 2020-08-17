<?php

session_start();
//Imlementar sesiones para poder direccionar las reacciones a la tabla de la base de datos por medio del RPE
require 'conexion.php';

$rpe = $_SESSION['rpe'];
$cac = $_SESSION['cac'];
$reaccion = $_POST['reaccion'];

date_default_timezone_set("America/Mexico_City");

    $time = time();
    $date = date("Y-m-d", $time);

//El rpe será capturado dependiendo de la sesión que sea iniciada
$query = "INSERT INTO reacciones(rpe,fecha,cac,$reaccion) VALUES('".$rpe."','$date','".$cac."',1)";

$conexion->query($query);

?>