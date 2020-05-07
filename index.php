<?php
    session_start();
    
    if(isset($_SESSION['rpe'])):
        if($_SESSION['rpe']=="admin"){
            header("Location: admin.ph  p");
        }
        else if($_SESSION['rpe']=="matrix"){
            header("Location: matrix.html");
        }
        else{
            header("Location: encuesta.php");
        }
    endif;
?>

<!DOCTYPE html>
<html lang="es" xmlns:th="http://www.thymeleaf.org">


<head>
    <title>CFE</title>

    <meta charset="UTF-8" />

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Nuestro css-->
    <link rel="stylesheet" type="text/css" href="static/css/index.css" th:href="@{/css/index.css}">

    <link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

    <div class="error">
        <span>Datos de usuario incorrectos, inténtalo de nuevo</span>
    </div>


    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">
                    <img src="static/img/user.png" />
                </div>
                <form class="col-12" action="static/php/login.php" method="POST" name="formlg" id="formlg" onchange="habilitar();">
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" pattern="[A-Za-z0-9_-]{1,15}" name="username" id="username" maxlength="6" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}" name="password" id="password" />
                    </div>
                    <div class="form-group" id="cac-group">
                        <select name="cac" id="cac" class="form-control" required disabled >
                            <option value="" selected disabled>-- Elije el CAC --</option>
                            <option value="camichines">Camichines</option>
                            <option value="paradero">Paradero</option>
                            <option value="revolucion">Revolucion</option>
                            <option value="santa fe">Santa fe</option>
                            <option value="tlaquepaque">Tlaquepaque</option>
                            <option value="toluquilla">Toluquilla</option>
                            <option value="tonala">Tonalá</option>
                        </select>
                    </div>
                    <input type="submit" class="btn btn-primary botonlg" value="Ingresar" name="" id="" style="margin-bottom: 10px;">
                    <!-- <button type="submit " class="btn btn-primary botonlg "><i class="fas fa-sign-in-alt "></i>  Ingresar </button> -->
                </form>

            </div>
        </div>
    </div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/login.js"></script>
<script>
    function habilitar() {
        var usuario = document.getElementById("username");
        var cac = document.getElementById("cac");

        if (usuario.value == "admin" || usuario.value == "" || usuario.value == null || usuario.value == "matrix") {
            cac.disabled = true;
        } else {
            cac.disabled = false;
        }
    }
</script>

</html>