<?
require "conecta.php";
///Recibe Variables

$campana=$_POST['campaña'];
$inicio=$_POST['inicio'];
$final=$_POST['fin'];
$sitio=$_POST['sitio'];
$zona=$_POST['zona'];
$division=$_POST['division'];

//Inserta en DB
$sql = "INSERT INTO campañas VALUES (0,'$campana','$sitio','$zona','$division','$inicio','$final',0)";


///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>