<?
require "conecta.php";
///Recibe Variables

$campana=$_POST['campaña'];
$pregunta=$_POST['pregunta'];


//Inserta en DB
$sql = "INSERT INTO preguntas VALUES (0,'$campana','$pregunta',0)";


///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>