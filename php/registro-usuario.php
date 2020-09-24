<?
require "conecta.php";
///Recibe Variables

$name=$_POST['rpe'];
$password=$_POST['pass'];
$cac=$_POST['cac'];
//Inserta en DB
$sql = "INSERT INTO usuario VALUES ('$name','$password','$cac',0)";


///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>