<?php
include 'conexion.php';

$rpe = $_GET['rpe'];


$query = "DELETE FROM ejecutivo WHERE rpe = '".$rpe."'";
$conexion->query($query);


if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}

?>