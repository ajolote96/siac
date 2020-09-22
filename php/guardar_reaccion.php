<?php

session_start();
//Imlementar sesiones para poder direccionar las reacciones a la tabla de la base de datos por medio del RPE
require 'conexion.php';

$rpe = $_SESSION['rpe'];
$cac = $_SESSION['cac'];
$reaccion = $_POST['reaccion'];
$idPregunta = $_SESSION['counter'];

date_default_timezone_set("America/Mexico_City");

    $time = time();
    $date = date("Y-m-d", $time);

//El rpe será capturado dependiendo de la sesión que sea iniciada

if($idPregunta>1){
    $idPregunta-=1;
}

$pregunta = "SELECT * FROM preguntas WHERE id = $idPregunta";
$resultado = $conexion->query($pregunta);
$fila= $resultado->fetch_assoc();

$query = "INSERT INTO reacciones(rpe,fecha,cac,$reaccion, idPregunta, campaña) VALUES('".$rpe."','$date','".    $cac."',1, ".$fila['id'].", '".$fila['campaña']."' )";

$conexion->query($query);

?>