<?php
    require 'conexion.php';
    session_start();
    // Desactivar toda notificación de error
        error_reporting(0);

    $cac = $_POST['cac'];
    $inicio = $_POST['fecha-inicio'];
    $fin = $_POST['fecha-fin'];

    // $cac = "revolucion";
    // $inicio = "2020-01-6";
    // $fin = "2020-01-25";

    $salida = "";
    //$query = "SELECT * FROM reacciones WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' ORDER BY rpe";
    $query = "SELECT rpe, cac, SUM(great), SUM(good), SUM(ok), SUM(bad) FROM reacciones WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' GROUP BY rpe";

    // $great = 0;
    // $good = 0;
    // $ok = 0;
    // $bad = 0;
    
    $resultado = $conexion->query($query);
    
      if($resultado->num_rows<=0){
        echo "<h2>No hay Datos en esas fechas</h2>
         <a href='admin.php' class='btn btn-warning col-3 centrar'>Regresar</a>
        ";
        exit(0);
    }


    $salida.="
    <p class='bg-dark text-white'>Periodo de Revisión: Desde <span class='text-success'> $inicio </span> hasta <span class='text-success'>$fin</span></p>

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

    echo $salida;
            
    $conexion->close();

?>