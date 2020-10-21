<?php
    session_start();

    if($_SESSION['rpe'] == "matrix"){
        header("Location: matrix.php");
    }
    else if($_SESSION['rpe'] != "admin" && $_SESSION['rpe'] !="matrix" && $_SESSION['rpe'] != "adminzona" && $_SESSION['rpe'] != "admindivision"){
        header("Location: encuesta.php");
    }
    else if($_SESSION['rpe'] != "admin" && $_SESSION['rpe'] != "adminzona" && $_SESSION['rpe'] != "admindivision"){
        header("Location: index.php");   
    }
        
?>
<!DOCTYPE html>
<html>

<head>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
            function validacion() {
            var CAMP = document.formulario.campaña.value;
            if (CAMP == "") {
                alert("Campos Faltantes")
                return false;
            } else
                return true;

        } // TERMINA EL CODIgO JS PARA VALIDAR LOS CAMPOS

        $(document).ready(function() {
            $("#boton").on('click', function() {
                if (validacion()) { ///Si los campos estan llenos
                    var CAMP = document.formulario.campaña.value;
                    var ini = document.formulario.inicio.value;
                    var final = document.formulario.fin.value;
                    var site = $('#cac option:selected').text();
                    var zone = $('#zona option:selected').text();
                    var divition = $('#division option:selected').text();
                    $.ajax({
                        url: 'php/registro-campaña.php',
                        type: 'POST',
                        dataType: 'text',
                        data: {campaña:CAMP, inicio:ini, fin:final, sitio:site, zona:zone, division:divition},
            
                        success: function(respuesta) {
                            if (respuesta == 0)
                                alert('Seleccion invalida')
                            else {
                                alert('Seleccion Valida')
                                location.href = "encuestas.php";
                            }
                        }

                    }); ///Fin del ajax
                } ///Termina el if de la funcion de validacion 
            }); ///Funcion de click en un boton
        }); ///Fin de la funcion ready   
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Administración</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/styles-admin.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- HIGHCHARTS -->
   

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <a href="admin.php">
                <h2>Menú</h2>
                <a>
            </div>

            <ul class="list-unstyled components">
            <a href="admin.php">
                <p>Panel Administrativo</p>
            </a>

                 <li id="motivoCAC">
                    <a href="#">Motivos de Visitas</a>
                </li>

                <li id="ejecutivoCAC">
                    <a href="#">Resultado de Encuestas</a>
                </li>
 
                <li id="ejecutivo">
                    <a href="#">Gestión de Ejecutivo</a>
                </li>

                <li>  
                    <a href="encuestas.php">Gestión de Encuestas</a>
                    <!-- Alta, baja, modificar preguntas -->
                </li> 

                <li class="active">
                    <!-- Sólo  jefes de cac, sólo podrá modificar lo de sus cacs  -->
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Configuración</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li id="usuarios">
                            <a href="usuarios.php">Usuarios</a>
                        </li>
                        <li>
                            <a href="#">Gestión de Sitios</a>
                        </li> 
                    </ul>
                </li>               
            </ul>            
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <div class="header-content" style="display:flex; justify-content: space-between;">
                <h2>Inicio</h2>
                <a href="static/php/cerrar-sesion.php" style="padding: 10px;">Cerrar Sesión</a>
            </div>
            <div class="logo">
                <a href="admin.php">
                    <img style="width: 20%; margin-left: 50px;" src="img/cfe-suministros.jpg" alt="LOGO">
                </a>
            </div>
            <div id="contenido-principal">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <br>
                            <br>
                            <!-- Formulario -->
                            <hr>

                            <form id="formulario" name="formulario" enctype="multipart/form-data">

                                <label>Nombre de la Campaña:</label>
                                <input type="text" class="form-control" name="campaña">
                                
                                <br>
                                <label>Fecha de inicio:</label><br><input type="date" class="form-control" name="inicio">
                                <br><br>
                                <label>Fecha de finalización:</label><br><input type="date" class="form-control" name="fin">
                                <br><br>
                                <div class="row">


                                    <!--Primera Nota-->
                                    <div id="primera" class="col-sm-4">
                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Division</h5>

                                            <?php
                                                function load_division()
                                                {
                                                    $connect = mysqli_connect("localhost", "root", "", "ssbjalis_encuestas");
                                                    $output='';
                                                    $sql="SELECT * FROM tbl_division ORDER BY div_id";
                                                    $result = mysqli_query($connect, $sql);
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                        $output .= '<option value="'.$row["div_id"].'">'.$row["div_name"].'</option>';
                                                    }
                                                    return $output;
                                                }
                                            ?>

                                            <p><select name="division" id="division">
                                                <option value="">Selecciona División</option>
                                                <?php echo load_division(); ?>
                                            </select></p>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Segunda Nota-->
                                    <div id="segunda" style="display: none" class="col-sm-4">
                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Zona</h5>

                                            <p>
                                            <select name="zona" id="zona">
                                                <option value="">Selecciona Zona</option>
                                            </select></p>

                                        </div>
                                        </div>
                                    </div>
                                    <!--Tercera Nota-->
                                    <div id="tercera" style="display: none" class="col-sm-4">
                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Centro de Atención</h5>
                                            
                                            <p>
                                            <select name="cac" id="cac">
                                                <option value="">Selecciona cac</option>
                                            </select></p>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr><br>
                                <input id="boton" onclick="validacion()" class="btn btn-success" type="button" value="Registrar">
                                <a href="javascript:history.back()">Regresar</a>
                            </form>
                            <br>
                            <!-- Fin Del Formulario -->
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        $(function(){
 

            $( "#division" ).change(function() {
                $( "#segunda" ).show( "slow", function() {
                });
            });

            $( "#segunda" ).change(function() {
                $( "#tercera" ).show( "slow", function() {
                });
            });

            $("#division").change(function () { 
               var valorSeleccionado = $(this).children(":selected").text();
            });

            $('#division').change(function(){
            var division_id = $(this).val();
            $.ajax({
                url:"fetch_zona.php",
                method:"POST",
                data:{divisionId:division_id},
                dataType:"text",
                success:function(data)
                {
                    $('#zona').html(data);
                }
                });
            });

            $('#zona').change(function(){
            var zona_id = $(this).val();
            $.ajax({
                url:"fetch_cac.php",
                method:"POST",
                data:{zonaId:zona_id},
                dataType:"text",
                success:function(data)
                {
                    $('#cac').html(data);
                }
                });
            });

        });
    </script>
    <script>




    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });

        $('#ejecutivo').click(function() {
            $("#contenido-principal").load("html/buscar.html");

        });

        $('#ejecutivoCAC').click(function() {
            $("#contenido-principal").load("html/datos-ejecutivo.html");

        });

        $('#motivoCAC').click(function() {
            $("#contenido-principal").load("html/grafica-cac.html");

        });

        $('#motivoZona').click(function() {
            $("#contenido-principal").load("html/grafica-zona.html");

        });

        $('#motivoDivision').click(function() {
            $("#contenido-principal").load("html/grafica-division.html");

        });

    </script>
</body>

</html>
