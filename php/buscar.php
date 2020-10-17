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
        $salida.="<table class='table table-sm table-hover'>
                        <thead>
                            <tr class='table-success'>
                                <th>RPE</td>
                                <th>Nombre</td>
                                <th>Correo </td>
                                <th>Puesto</td>
                                <th>Estatus</td>  
                                <th colspan='2'>Opciones</th>
                            </tr>
                        </thead>
                    <tbody>";

                    while($fila= $resultado->fetch_assoc()){
                        $salida.="<tr class='list-group-item-action'>
                                    <td>".$fila['rpe']."</td>
                                    <td>".$fila['nombre']."</td>
                                    <td>".$fila['correo']."</td>
                                    <td>".$fila['puesto_contratado']."</td>
                                    <td>".$fila['estatus']."</td>   
                                    <td><a class='btn btn-warning' href='editar-ejecutivo.php?rpe=".$fila['rpe']."'>Editar</a></td>                                 
                                    <td><a class='btn btn-danger' href='php/eliminar-ejecutivo.php?rpe=".$fila['rpe']."'>Eliminar</a></td>                                                                                                       
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