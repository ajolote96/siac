<?php
include "conexion.php";

$rpeObtenido = $_GET['rpe'];

$query = "SELECT * FROM ejecutivo WHERE rpe = '".$rpeObtenido."'";

$resultado = $conexion->query($query);
$filas = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">   
     <style>
                /*EDITAR EJECUTIVO*/

        .formulario-modificar label,
        .formulario-modificar input {
            display: block;
        }

        legend {
            font-size: 2rem;
            color: #534f4f;
        }

        label {
            display: block;
            font-weight: 700;
            text-transform: uppercase;
        }

        .formulario-modificar input:not([type="submit"]),
        textarea {
            padding: 1rem;
            display: block;
            width: 100%;
            background-color: #E1E1E1;
            margin-bottom: 2rem;
            border: none;
            border-radius: 1rem;
        }
       
    </style>
    <title>Edición de ejecutivo</title>
</head>
<body>

    <main class="container-sm">
        <form method="POST"  action="editarEjecutivo.php" class="formulario-modificar">
            <fieldset>
                <legend>Modificar Ejecutivo</legend>

                <label for="rpe">RPE</label>
                <input type="text" name="rpe" id="rpe" value="<?php echo $filas['rpe'];?>" readonly>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php echo $filas['nombre'];?>" >

                <label for="contrato">Contrato</label>
                <input type="text" name="contrato" id="contrato" value="<?php echo $filas['contrato'];?>" >

                <label for="correo">Correo</label>
                <input type="text" name="correo" id="correo" value="<?php echo $filas['correo'];?>" >

                <label for="celular">Celular</label>
                <input type="text" name="celular" id="celular" value="<?php echo $filas['celular'];?>" >

                <label for="puesto">Puesto Contratado</label>
                <input type="text" name="puesto" id="puesto" value="<?php echo $filas['puesto_contratado'];?>" >

                <input type="submit" name="" id="" value="EDITAR" class="btn-lg btn-success btn-block">
            </fieldset>
        </form>
    </main>
        
   
</body>
</html>