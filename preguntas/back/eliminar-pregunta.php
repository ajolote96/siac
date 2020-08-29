<?php
require "conectar.php";

$CAMPAÑA          =$_POST["campaña"];
$eliminado        = $_POST['eliminado'];

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "UPDATE preguntas SET eliminado = '$eliminado' Where campaña = '$CAMPAÑA'";
$res = mysqli_query($conexion,$sql);
if ($res)
    echo 1;
else 
    echo 0;
?>