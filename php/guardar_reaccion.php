<?php

session_start();
//Imlementar sesiones para poder direccionar las reacciones a la tabla de la base de datos por medio del RPE
require 'conexion.php';

$cac = $_SESSION['cac'];
$reaccion = $_POST['reaccion'];
$rpe = $_SESSION['rpe'];
$motivo = $_SESSION['motivo'];

date_default_timezone_set("America/Mexico_City");

    $time = time();
    $date = date("Y-m-d", $time);

//El rpe será capturado dependiendo de la sesión que sea iniciada
$query = "INSERT INTO reacciones(rpe,fecha,cac,motivo_visita,$reaccion) VALUES('".$rpe."','$date','".$cac."','".$motivo."',1)";

$conexion->query($query);


?>