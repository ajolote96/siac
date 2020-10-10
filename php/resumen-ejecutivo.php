<?php
require 'conexion.php';
session_start();
error_reporting(0);

echo(json_decode($_POST['string'], true));

// $salida = "";

// $query = "SELECT * FROM reacciones WHERE rpe = '".$rpe."' and fecha>= '".$inicio."' and fecha<= '".$fin."' ";

// echo $rpe;
?>