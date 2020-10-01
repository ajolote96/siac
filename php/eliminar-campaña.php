<?
require "conecta.php";
///Recibe Variables
$identificador = $_POST['id'];
//Inserta en DB
$sql = "UPDATE campañas SET eliminado='1' WHERE id='$identificador'";
///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);
if($respuesta)
    echo 1;
else 
    echo 0;
?>