<?php
    session_start();

    if(isset($_SESSION['rpe'])):
        if($_SESSION['rpe'] == "admin")
            header("Location: admin.php");
        else if($_SESSION['rpe'] == "matrix")
           header("Location: matrix.html");
    endif;

?>

<!DOCTYPE html>
<html lang="en">

<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="mobile-web-app-capable" content="yes">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Encuestas</title>
</head>

<body>
    <div class="thanks">
      <h1 id="titulo">Muchas Gracias!</h1>
    </div>

    <header class="container">
        <div>
            <a href="index.php">
                <img src="img/cfe-contigo.png" alt="Logo CFE contigo" class="float-left logo-cfe-contigo">
            </a>
            <img src="img/suterm-logo.png" alt="Logo Suterm" class="float-right suterm-logo">
        </div>
    </header>
    

    <main  class="container" id="container-pregunta">

        <div id="pregunta"></div>

        <div class="faces">

            <div>
                <img src="img/great.png" alt="great" id="great" class="face-ico">
            </div>

            <div>
                <img src="img/good.png" alt="good" id="good" class="face-ico">
            </div>

            <div>
                <img src="img/ok.png" alt="ok" id="ok" class="face-ico">
            </div>

            <div>
                <img src="img/bad.png" alt="bad" id="bad" class="face-ico">
            </div>

        </div>

    </main>
    <footer class="site-footer seccion">

      <a class="cerrar-sesion" href="static/php/cerrar-sesion.php">Cerrar Sesión</a>

    </footer>

</body>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- <script src="js/pregunta-principal.js"></script> -->
   
    <script>
        
        // $(document).ready(function(){
        //     $('#encuesta').load('pregunta.html');
        // });

        // $(document).on('click', '.face-ico-principal', function() {

        //     document.getElementById('encuesta').style.display="none";
        //     document.getElementById('container-pregunta').style.display="inline";
        
        // });

    </script>




</html