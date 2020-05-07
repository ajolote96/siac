
<?php
    session_start();

    if($_SESSION['rpe'] == "matrix"){
        header("Location: matrix.html");
    }
    else if($_SESSION['rpe'] != "admin" && $_SESSION['rpe'] !="matrix"){
        header("Location: encuesta.php");
    }
    else if($_SESSION['rpe'] != "admin"){
        header("Location: index.php");   
    }
        
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <!-- Gráficas -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>   

    <title>Encuestas</title>
</head>

<body>

    <header class="container">
        <div>
            <a href="admin.php">
                <img src="img/cfe-contigo.jpg" alt="Logo CFE contigo" class="float-left logo-cfe-contigo">
            </a>
            <img src="img/suterm-logo.png" alt="Logo Suterm" class="float-right suterm-logo">
        </div>
    </header>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <button class="navbar-toggler" data-target="#menu" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mr-auto">                   

                     <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-target="desplegable" data-toggle="dropdown">Evaluación por Cac</a>
                        <div class="dropdown-menu">
                             <a class="dropdown-item" href="#" id="tabla">Tabla</a>  
                             <a class="dropdown-item" href="#" id="enlace-grafico">Gráfica</a> 
                        </div>
                    </li> 

                    <li class="navbar-item">
                      <a href="#" id="datos-ejecutivo" class="nav-link">Evaluación de Ejecutivos</a> 
                    </li>

                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-target="desplegable" data-toggle="dropdown">Sesiones Activas por CAC</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#" nombre="camichines" id="">Camichines</a>    
                            <a class="dropdown-item" href="#" nombre="paradero" id="">Paradero</a>
                            <a class="dropdown-item" href="#" nombre="revolucion" id="">Revolución</a>
                            <a class="dropdown-item" href="#" nombre="tlaquepaque" id="">Tlaquepaque</a>
                            <a class="dropdown-item" href="#" nombre="toluquilla" id="">Toluquilla</a>
                            <a class="dropdown-item" href="#" nombre="tonala" id="">Tonalá</a>
                            <a class="dropdown-item" href="#" nombre="santa fe" id="">Santa Fe</a>
                        </div>
                    </li>
<!-- 
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle " data-target="desplegable" data-toggle="dropdown">Administración</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Empleados</a>
                            <a class="dropdown-item" href="#">Usuarios</a>
                        </div>
                    </li> -->

                    <li class="navbar-item ">
                        <a href="static/php/cerrar-sesion.php" class="nav-link">Cerrar Sesión</a>
                    </li>


                </ul>
            </div>
        </nav>
    </div>


    <div style="display:none" id="contenido"></div>
    <div style="display:none" id="datos">Datos</div>

    </body>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="js/main.js"></script> -->

    <script>
        $(document).on('click', '#tabla', function(){
            $("#datos").hide("slow");
            $("#contenido").show();
            $("#contenido").load("html/datos-ejecutivo.html");
        });

        $(document).on('click', '#enlace-grafico', function(){
            $("#contenido").hide("slow");
            $("#datos").load("html/datos-ejecutivo.html");
            $("#datos").show();
        }); 

    </script>
   

</html