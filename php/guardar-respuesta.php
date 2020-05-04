<?php
session_start();
//Imlementar sesiones para poder direccionar las reacciones a la tabla de la base de datos por medio del RPE

require 'conexion.php';

$_SESSION['motivo'] = $_POST['respuesta'];

?>