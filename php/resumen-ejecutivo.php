<?php
require 'conexion.php';
session_start();
error_reporting(0);

$data = $_POST['data'];
$data = json_decode($data, true);

$division = $data[0]["value"];
$zona = $_POST['zona'];
$inicio = $data[1]["value"];
$fin = $data[2]["value"];
$rpe = $data[3]["value"];
$cac = $data[4]["value"];

if($cac=="santa"){
    $cac = "santa fe";
}

//FALTA OBTENER EL CAC PARA HACER LA CONSULTA 
// if(isset($cac)){
//     $query = "SELECT * FROM reacciones WHERE rpe = '".$rpe."' and cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' ";
//   }
//   else if(isset($zona)){
//     $query = "SELECT * FROM reacciones WHERE rpe = '".$rpe."' and cac = ANY (SELECT nombre FROM cac WHERE zona = '".$zona."') AND fecha>='".$inicio."' and fecha<='".$fin."' ";
//   }
//   else{
    // $query = "SELECT * FROM reacciones WHERE rpe = '".$rpe."' and cac IN (SELECT nombre FROM cac WHERE division = '".$division."') AND fecha>='".$inicio."' and fecha<='".$fin."' ";
//   }
$query = "SELECT * FROM reacciones WHERE cac = '".$cac."' and rpe = '".$rpe."' and fecha>='".$inicio."' and fecha<='".$fin."' ";

$resultado= $conexion->query($query);

if($resultado->num_rows<=0):
    echo json_encode(array('error'=> true));
    exit(0);
endif;

$salida.="
    <table class='container table table-hover'>
                    <thead>
                        <tr>
                            <th>Campaña</td>
                            <th>Pregunta</td>
                            <th>Respuesta</td>                            
                        </tr>
                    </thead>
                <tbody>";


        while($fila= $resultado->fetch_assoc()){

            $pregunta = "SELECT * FROM preguntas WHERE id = '".$fila['idPregunta']."' AND campaña='".$fila['campaña']."' ";

            $respuesta = $conexion->query($pregunta);

            $filas_pregunta = $respuesta->fetch_assoc();

            if($fila['great'] == 1){
                $reaccion_dato = "Muy bien";
            }else if($fila['good'] == 1){
                $reaccion_dato = "Bien";
            }else if($fila['ok'] == 1){
                $reaccion_dato = "Regular";
            }else{               
                $reaccion_dato = "Mal";
            }

            $salida.="<tr class='list-group-item-action'>
                            <td>".$fila['campaña']."</td>
                            <td>".$filas_pregunta['preguntas']."</td>  
                            <td>$reaccion_dato</td>                                  
                      </tr>";
        }
                
        $salida.="</tbody></table>";
        

echo json_encode($salida);

?>