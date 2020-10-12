<?
require "conecta.php";
///Recibe Variables

$nombre = $_POST['name'];
$zona = $_POST['zone'];
$division = $_POST['div'];
$efectivo = $_POST['cash'];
$disponible = $_POST['open'];

$sql = "INSERT INTO sitios VALUES (0,'$nombre','$zona','$division','$efectivo','$disponible')";

///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>