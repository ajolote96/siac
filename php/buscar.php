<?php
    
    require 'conexion.php';

    $salida = "";
    $query = "SELECT * FROM ejecutivo ORDER BY nombre";

    if(isset($_POST['consulta'])){
        $q = $conexion->real_escape_string($_POST['consulta']);
        $query =  "SELECT * FROM ejecutivo WHERE nombre LIKE '%".$q."%' OR rpe LIKE '%".$q."%' ";

    }

    $resultado = $conexion->query($query);

    if($resultado->num_rows > 0){
        $salida.="<table class='tabla_datos'>
                        <thead>
                            <tr>
                                <th>RPE</td>
                                <th>Nombre</td>
                                <th>Correo </td>
                                <th>Puesto</td>
                                <th>Estatus</td>  
                            </tr>
                        </thead>
                    <tbody>";

                    while($fila= $resultado->fetch_assoc()){
                        $salida.="<tr>
                                    <td>".$fila['rpe']."</td>
                                    <td>".$fila['nombre']."</td>
                                    <td>".$fila['correo']."</td>
                                    <td>".$fila['puesto_contratado']."</td>
                                    <td>".$fila['estatus']."</td>   
                                    <td><a class='btn btn-warning' href='php/editar-ejecutivo.php?rpe=".$fila['rpe']."'>Editar</a></td>                                 
                                                                   
                                  </tr>";
                    }
               
                $salida.="</tbody></table>";
    }
    else{
        $salida.="No existe ese ejecutivo";
    }

    echo $salida;

    $conexion->close();

?>