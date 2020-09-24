<?
require "conecta.php";
///Recibe Variables
$ID         = $_POST['id'];
$RPE        = $_POST['rpe'];
$PASSWORD   = $_POST['pass'];
$CAC        = $_POST['cac'];

///Se tiene que tener un IDENTIFICADOR para saber cual usuario se quiere editar
//Inserta en DB

$sql = "UPDATE usuario SET eliminado='1' WHERE id='$ID'";


///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>