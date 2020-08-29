<?php
require "conectar.php";
///Recibe Variables

$RPE        = $_POST['RPE'];
$PASSWORD   = $_POST['PASSWORD'];
$CAC        = $_POST['CAC'];

//Inserta en DB
$sql = "INSERT INTO usuario VALUES('".$RPE."','".$PASSWORD."','".$CAC."')";

///true o false (si el codigo de Sql ingresado esta correcto)
$res = mysqli_query($conexion, $sql);

if($res)
    echo 1;
else 
    echo 0;
 ?>
    
   