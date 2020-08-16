<?php

include 'conexion.php';
session_start();



$motivo_principal = $_POST['motivo'];
$motivo_general = $_POST['motivo2'];
$cac = $_SESSION['cac'];

date_default_timezone_set("America/Mexico_City");

$time = time();
$date = date("Y-m-d", $time);

if(isset($_POST['tipo'])){
    $tipo=$_POST['tipo'];
    $query = "INSERT INTO motivos VALUES('".$motivo_principal."','".$motivo_general."','".$date."', '".$cac."', '".$tipo."')";
}
else{
    $query = "INSERT INTO motivos(motivo, detalle, fecha, cac) VALUES('".$motivo_principal."','".$motivo_general."','".$date."', '".$cac."')";
}

$conexion->query($query);


?>