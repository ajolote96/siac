<?php
    require 'conexion.php';
    session_start();
    // Desactivar toda notificación de error
        error_reporting(0);

    $division = $_POST['division'];
    $zona = $_POST['zona'];
    $cac = $_POST['cac'];
    $inicio = $_POST['fecha-inicio'];
    $fin = $_POST['fecha-fin'];

    // $cac = "revolucion";
    // $inicio = "2020-01-6";
    // $fin = "2020-01-25";



    $salida = "";
    //$query = "SELECT * FROM reacciones WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' ORDER BY rpe";
    //$query = "SELECT rpe, cac, SUM(great), SUM(good), SUM(ok), SUM(bad) FROM reacciones ///////WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY rpe";
     if(isset($_POST['cac'])){
        $query = "SELECT rpe, cac, SUM(great), SUM(good), SUM(ok), SUM(bad) FROM reacciones WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY rpe";
      }
      else if(isset($_POST['zona'])){
        $query = "SELECT rpe, cac, SUM(great), SUM(good), SUM(ok), SUM(bad) FROM reacciones WHERE cac = ANY (SELECT cac FROM cac  WHERE zona = '".$zona."') AND fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY rpe";
      }
      else{
        $query = "SELECT rpe, cac, SUM(great), SUM(good), SUM(ok), SUM(bad) FROM reacciones WHERE cac IN (SELECT cac FROM cac  WHERE division = '".$division."') AND fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY rpe";
      }
           
    // $great = 0;
    // $good = 0;
    // $ok = 0;
    // $bad = 0;
    
    $resultado = $conexion->query($query);
    
    if($resultado->num_rows<=0):
        echo json_encode(array('error'=> true));
        exit(0);
    endif;

    $salida.="
    <table class='container table table-striped'>
                    <thead>
                        <tr>
                            <th>RPE</td>
                            <th>CAC</td>
                            <th><img src='img/great.png' class='ico-table'></td>
                            <th><img src='img/good.png' class='ico-table'></td>
                            <th><img src='img/ok.png' class='ico-table'></td>
                            <th><img src='img/bad.png' class='ico-table'></td>
                        </tr>
                    </thead>
                <tbody>";

    while($fila= $resultado->fetch_assoc()){
        $salida.="<tr>
                    <td>".$fila['rpe']."</td>
                    <td>".$fila['cac']."</td>
                    <td>".$fila['SUM(great)']."</td>
                    <td>".$fila['SUM(good)']."</td>
                    <td>".$fila['SUM(ok)']."</td>
                    <td>".$fila['SUM(bad)']."</td>
                
                    </tr>";
    }
            
    $salida.="</tbody></table>";

    echo json_encode($salida);
            
    $conexion->close();

?>