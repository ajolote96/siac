<?
require "conecta.php";
///Recibe Variables

$identificador = $_POST['id'];
$campana=$_POST['campaña'];
$inicio=$_POST['inicio'];
$final=$_POST['fin'];

//Inserta en DB
$sql = "UPDATE campañas SET nombre='$campana', fechaInicio='$inicio', fechaFin='$final' WHERE id='$identificador'";
///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>