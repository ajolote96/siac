<?
require "conecta.php";
///Recibe Variables

$campana    =   $_POST['camp'];
$pregunta   =  $_POST['ask'];
//Inserta en DB

echo $campana;
echo $pregunta;

$sql = "INSERT INTO preguntas VALUES (0,'$campana','$pregunta',0)";

///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>