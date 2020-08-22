<?php

include "conexion.php";
error_reporting(0);


$cac = $_POST['cac'];
$inicio = $_POST['fecha-inicio'];
$fin = $_POST['fecha-fin'];

$query = "SELECT motivo, COUNT(motivo) as motivoContador FROM motivos WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY motivo";

$resultado = $conexion->query($query);

if($resultado->num_rows<=0):
  echo json_encode(array('error'=> true));
  exit(0);
endif;
    
while($row = $resultado->fetch_assoc()){
  $json_array[] = array(
    $row['motivo'],
    (int)$row['motivoContador'],
  );
}

echo json_encode($json_array);



?>