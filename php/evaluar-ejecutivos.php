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
    $query = "SELECT * FROM reacciones WHERE cac='".$cac."' and fecha>='".$inicio."' and fecha<='".$fin."' ";

    $resultado = $conexion->query($query);
    
      if($resultado->num_rows<=0){
        echo "<h2>No hay Datos en esas fechas</h2>
         <a href='admin.php' class='btn btn-warning col-3 centrar'>Regresar</a>
        ";
        exit(0);
    }


    $salida.="<table class='container table table-striped'>
                    <thead>
                        <tr>
                            <th>RPE</td>
                            <th>Fecha</td>
                            <th>CAC</td>
                            <th>Motivo</td>
                            <th><img src='../img/great.png' class='ico-table'></td>
                            <th><img src='../img/good.png' class='ico-table'></td>
                            <th><img src='../img/ok.png' class='ico-table'></td>
                            <th><img src='../img/bad.png' class='ico-table'></td>
                        </tr>
                    </thead>
                <tbody>";

                while($fila= $resultado->fetch_assoc()){
                    $salida.="<tr>
                                <td>".$fila['rpe']."</td>
                                <td>".$fila['fecha']."</td>
                                <td>".$fila['cac']."</td>
                                <td>".$fila['motivo_visita']."</td>
                                <td>".$fila['great']."</td>
                                <td>".$fila['good']."</td>
                                <td>".$fila['ok']."</td>
                                <td>".$fila['bad']."</td>
                            
                                </tr>";
                }
            
            $salida.="</tbody></table>";

    echo $salida;
            
    $conexion->close();

?>