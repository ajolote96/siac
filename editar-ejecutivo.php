<?php
include "php/conexion.php";
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
$rpeObtenido = $_GET['rpe'];

$query = "SELECT * FROM ejecutivo WHERE rpe = '".$rpeObtenido."'";

$resultado = $conexion->query($query);
$filas = $resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Administración</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/styles-admin.css">
    <link rel="stylesheet" href="css/styles.css">
 
    <style>
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

        .contenedor{
            margin: 20px 30px;
        }

    </style>

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
                
 
                <!-- <li class="active">
                    <a href="#homeSubmenuMatrix" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Motivos de Visitas</a>
                    <ul class="collapse list-unstyled" id="homeSubmenuMatrix">
                        
                        <li>
                            <a href="#">Motivo de Visitas</a>
                            Mostrar resultado de visitas, a qué vino cada cliente, registrar, por día y seleccionar rango
                        </li> 
                       
                         <li id="motivoDivision">
                            <a href="#">División</a>
                        </li>

                        <li id="motivoZona">
                            <a href="#">Zona</a>
                        </li>

                        <li id="motivoCAC">
                            <a href="#">CAC</a>
                        </li>

                        <li>
                            <a href="#">Generar Reporte Específico</a>
                        </li>
                       
                    </ul>
                </li>                                                                                    
                 -->
                 <li id="motivoCAC">
                    <a href="#">Motivos de Visitas</a>
                </li>

                <li id="ejecutivoCAC">
                    <a href="#">Resultado de Encuestas</a>
                </li>
                <!-- <li class="active">
                    <a href="#homeSubmenuEjecutivo" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Evaluación de Ejecutivo</a>
                    <ul class="collapse list-unstyled" id="homeSubmenuEjecutivo">
                        
                        <li>
                            <a href="#">Motivo de Visitas</a>
                            Mostrar resultado de visitas, a qué vino cada cliente, registrar, por día y seleccionar rango
                        </li> 
                       
                         <li>
                            <a href="#">División</a>
                        </li>

                        <li>
                            <a href="#">Zona</a>
                        </li>

                        <li id="ejecutivoCAC">
                            <a href="#">CAC</a>
                        </li>

                        <li>
                            <a href="#">Generar Reporte Específico</a>
                        </li>
                       
                    </ul>
                </li>   -->
                
                <!-- <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestión de Ejecutivo</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        
                        <li>
                            <a href="#">Alta</a>
                        </li>
                        <li>
                            <a href="#">Baja</a>
                        </li>
                        <li>
                            <a href="#">Modificación</a>
                        </li>
                    </ul>
                </li> -->
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
<!-- 
                            <form id="formulario" name="formulario" enctype="multipart/form-data">

                                <label>Campaña:</label>
                                <input type="text" class="form-control" name="campaña">

                                <label>Pregunta:</label>
                                <input type="text" class="form-control" name="pregunta">
                                <hr><br>
                                <input id="boton" onclick="validacion()" class="btn btn-success" type="button" value="Registrar">
                                <a href="javascript:history.back()">Regresar</a>
                            </form> -->
                            
                            <form method="POST"  action="php/editarEjecutivo.php" class="formulario-modificar">
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
                            

                            <!-- Fin Del Formulario -->
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>



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