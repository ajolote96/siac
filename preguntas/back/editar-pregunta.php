<?php
require "conectar.php";
///Recibe Variables

$ID              = $_POST['id'];
$CAMPAÑA         = $_POST['campaña'];
$PREGUNTA        = $_POST['pregunta'];

//Inserta en DB
$sql = "UPDATE preguntas SET id='$ID', preguntas='$PREGUNTA', campaña='$CAMPAÑA' WHERE id='$ID'";

///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($conexion, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>