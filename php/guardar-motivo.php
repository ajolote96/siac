<?php

include 'conexion.php';
session_start();



$motivo = $_POST['motivo'];
$detalle = $_POST['detalle'];
$cac = $_SESSION['cac'];

date_default_timezone_set("America/Mexico_City");

$time = time();
$date = date("Y-m-d", $time);

if(isset($_POST['tipo'])){
    $tipo=$_POST['tipo'];
    $query = "INSERT INTO motivos VALUES('".$motivo."','".$detalle."','".$date."', '".$cac."', '".$tipo."')";
}
else{
    $query = "INSERT INTO motivos(motivo, detalle, fecha, cac) VALUES('".$motivo."','".$detalle."','".$date."', '".$cac."')";
}

$conexion->query($query);


?>