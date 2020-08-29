<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">

    <title>Registros</title>

    <!-- Link para Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <?php require "../back/conectar.php";
        $campaña=$_GET["campaña"];

            $sql="SELECT * FROM preguntas WHERE campaña='$campaña'";

            $res=mysqli_query($conexion, $sql);
            $row=mysqli_fetch_assoc($res);

            ?>


    <script>
        function validacion() {
            var id = document.formulario.eliminado.value;

            if (id == "" ) {
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
                        url: '../back/eliminar-pregunta.php',
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
                                location.href = "lista-preguntas.php";
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
            <img src="../img/logo.png" height="50">
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
                        <a class="nav-link" href="lista-preguntas.php">Preguntas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="form-pregunta.php">Registro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="edit-preguntas.php">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eliminar-pregunta.php">Eliminar</a>
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
                        <label for="formGroupExampleInput">0 = Activo / 1 = Eliminado</label>
                        <input type="text" class="form-control" name="eliminado" value="<?= $row['eliminado'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Campaña</label>
                        <input readonly type="text" class="form-control" name="campaña" value="<?= $row['campaña'] ?>">
                    </div>
                    <input id="boton" onclick="validacion()" class="boton" type="button" value="Mandar">
                </form>

                


                <!-- Fin Del Formulario -->
            </div>
        </div>
    </div>


</body>

</html>