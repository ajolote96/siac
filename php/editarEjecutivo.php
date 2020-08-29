<?php

require 'conexion.php';

$rpe = $_POST['rpe'];
$nombre = $_POST['nombre'];
$contrato = $_POST['contrato'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$puesto = $_POST['puesto'];

$query = "UPDATE ejecutivo SET rpe = '".$rpe."', nombre='".$nombre."', contrato = '".$contrato."', correo = '".$correo."', celular = '".$celular."', puesto_contratado = '".$puesto."' WHERE rpe = '".$rpe."'";

$conexion->query($query);


if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: ../admin.php");
}
?>