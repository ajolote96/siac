<?
require "conecta.php";
///Recibe Variables
$ID = $_POST['id'];
$nombre = $_POST['name'];
$zona = $_POST['zone'];
$division = $_POST['div'];
$efectivo = $_POST['cash'];
$disponible = $_POST['open'];

$sql = "UPDATE sitios SET nombre='$nombre', zona='$zona', division='$division',efectivo='$efectivo',eliminado='$disponible' WHERE id='$ID'";

///true o false (si el codigo de Sql ingresado esta correcto)
$respuesta = mysqli_query($con, $sql);

if($respuesta)
    echo 1;
else 
    echo 0;
?>