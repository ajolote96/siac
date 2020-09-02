<?php

require 'conexion.php';

$rpe = $_POST['rpe'];
$nombre = $_POST['nombre'];
$contrato = $_POST['contrato'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$puesto_contratado = $_POST['puestoContratado'];
$puesto_laboral = $_POST['puestoLaboral'];


$query = "INSERT INTO ejecutivo (rpe,nombre,contrato,correo,celular,puesto_contratado,puesto_laboral) VALUES('".$rpe."','".$nombre."','".$contrato."','".$correo."','".$celular."','".$puesto_contratado."','".$puesto_laboral."')";

$conexion->query($query);


if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}


?>