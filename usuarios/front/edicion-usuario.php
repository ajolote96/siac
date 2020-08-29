<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Registros</title>

    <!-- Link para Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php
       require "../back/conectar.php";
       
       $RPE=$_GET["rpe"];

            $sql="SELECT * FROM usuario WHERE rpe='$RPE'";

            $res=mysqli_query($conexion, $sql);
            $row=mysqli_fetch_assoc($res);

    ?>


    <script>
        function validacion() {
            var code = document.formulario.RPE.value;
            var pass = document.formulario.PASSWORD.value;
            var center = document.formulario.CAC.value;

            if (code == "" | pass == "" | center == "") {
                alert("Campos Faltantes")
                return false;
            } else
                return true;
        } // TERMINA EL CODIO JS PARA VALIDAR LOS CAMPOS

        $(document).ready(function() {
            $("#boton").on('click', function() {
                if (validacion()) { ///Si los campos estan llenos
                    var form = $('#formulario')[0];
                    var data = new FormData(form);

                    $.ajax({
                        url: '../back/editar-usuario.php',
                        type: 'POST',
                        dataType: 'text',
                        data: data,
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        success: function(respuesta) {
                            if (respuesta == 0)
                                alert('Registro incorrecto')
                            else {
                                alert('Edicion Completada')
                                location.href = "lista-usuarios.php";
                            }
                        }

                    }); ///Fin del ajax
                } ///Termina el if de la funcion de validacion 
            }); ///Funcion de click en un boton
        }); ///Fin de la funcion ready   

    </script>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #03871f;">
        <!-- Navigation -->
        <div class="container">
        <a href="../../admin.php"> <img src="../img/logo.png" height="50"> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Inicio
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lista-usuarios.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="from-usuario.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit-usuarios.php">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar-usuario.php">Eliminar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <br>
                <br>
                <!-- Formulario -->
                <hr>
                <a href="javascript:history.back()">Regresar</a>
                <form id="formulario" name="formulario" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="formGroupExampleInput">RPE</label>
                        <input type="text" class="form-control" name="RPE" value="<?= $row['rpe'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Contraseña</label>
                        <input type="text" class="form-control" name="PASSWORD" value="<?= $row['contraseña'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">CAC</label>
                        <input type="text" class="form-control" name="CAC" value="<?= $row['cac'] ?>">
                    </div>
                    <input id="boton" onclick="validacion()" class="boton" type="button" value="Mandar">
                </form>

                


                <!-- Fin Del Formulario -->
            </div>
        </div>
    </div>


</body>

</html>
