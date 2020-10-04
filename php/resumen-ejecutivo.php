<?php
require 'conexion.php';
session_start();
error_reporting(0);


$cac = $_POST['cac'];
$inicio = $_POST['fecha-inicio'];
$fin = $_POST['fecha-fin'];

$salida = "";

$query = "SELECT * FROM reacciones WHERE rpe = '".$rpe."' and fecha>= '".$inicio."' and fecha<= '".$fin."' ";

?>