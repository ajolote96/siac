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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


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
                            <a href="sitios.php">Gestión de Sitios</a>
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
            <div class="col-lg-12 text-center">
                <div id="contenido-principal">
                    <center>
                        <h2>Registrar nuevo Usuario:</h2>
                        <a class="btn btn-success" href="registrar-usuario.php">Registrar</a>
                    </center>
                    <table class='tabla_datos table-hover'>
                        <thead>
                            <tr>
                                <th>RPE</th>
                                <th>CAC</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>


                        <?php
                require "php/conecta.php";
                $sql = "SELECT * FROM usuario WHERE eliminado='0' ";
                $res = mysqli_query($con, $sql);
                $num = mysqli_num_rows($res);
            
            for($i = $num; $objeto = $res->fetch_object() ; $i++)
            {
                ?>

                        <tbody>
                            <tr>
                                <td><?= $objeto->rpe?></td>
                                <td><?= $objeto->cac?></td>
                                <td><button type="button" class="btn btn-warning"><a href="edicion-usuario.php?rpe=<?=$objeto->rpe?>">Editar</button></a></td>
                                <td><button type="button" class="btn btn-danger"><a href="eliminar-usuario.php?rpe=<?=$objeto->rpe?>">Eliminar</button></a></td>


                            </tr>


                            <?php
            }
            ?>
                        </tbody>
                    </table>
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
