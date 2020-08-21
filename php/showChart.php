<?php

include "conexion.php";
error_reporting(0);


$cac = $_POST['cac'];
$inicio = $_POST['fecha-inicio'];
$fin = $_POST['fecha-fin'];

$query = "SELECT motivo, COUNT(motivo) as motivoContador FROM motivos WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY motivo";


$resultado = $conexion->query($query);
    
while($row = $resultado->fetch_assoc()){
  $json_array[] = array(
    $row['motivo'],
    (int)$row['motivoContador'],
  );
}

echo json_encode($json_array);

// if($resultado->num_rows<=0){
//   echo "<h2>No hay Datos en esas fechas</h2>
//    <a href='admin.php' class='btn btn-warning col-3 centrar'>Regresar</a>
//   ";
//   exit(0);
// }




?>