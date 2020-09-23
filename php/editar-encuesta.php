<?
require "conecta.php";
///Recibe Variables

$identificador = $_POST['id'];
$campana=$_POST['campaña'];
$pregunta=$_POST['preguntas'];


//Inserta en DB
$sql = "UPDATE preguntas SET campaña='$campana', preguntas='$pregunta' WHERE id='$identificador'";




///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>