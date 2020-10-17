<?
require "conecta.php";
$ID = $_POST['id'];
///Se tiene que tener un IDENTIFICADOR para saber cual usuario se quiere editar
//Inserta en DB

$sql = "UPDATE sitios SET eliminado='0' WHERE id='$ID'";
///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);
if($respuesta)
    echo 1;
else 
    echo 0;
?>