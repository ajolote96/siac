<?php
    session_start();
    
    if(isset($_SESSION['rpe'])):
        if($_SESSION['rpe']=="admin"){
            header("Location: admin.php");
        }
        else if($_SESSION['rpe']=="matrix"){
            header("Location: matrix.php");
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
                <form class="col-12" action="static/php/login.php" method="POST" name="formlg" id="formlg" >
                    <div class="form-group" id="user-group">
                        <input type="text" class="form-control" placeholder="Nombre de usuario" pattern="[A-Za-z0-9_-]{1,15}" name="username" id="username" maxlength="13" />
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control" placeholder="Contraseña" pattern="[A-Za-z0-9_-]{1,15}" name="password" id="password" />
                    </div>
                    <!-- <div class="form-group" id="cac-group">
                        <select name="cac" id="cac" class="form-control" required disabled>
                            <option name="opcionmenu" id="opcionmenu" label="-- Elija el CAC --" selected disabled></option>
                            <option id="1" value="camichines">Camichines</option>
                            <option id="2" value="paradero">Paradero</option>
                            <option id="3" value="revolucion">Revolucion</option>
                            <option id="4" value="santa fe">Santa fe</option>
                            <option id="5" value="tlaquepaque">Tlaquepaque</option>
                            <option id="6" value="toluquilla">Toluquilla</option>
                            <option id="7" value="tonala">Tonalá</option>
                            <option style="display:none;" id="8" value="" ></option>
                            <option style="display:none;" id="9" value="" disabled></option>
                            <option style="display:none;" id="10" value="" disabled></option>
                            <option style="display:none;" id="11" value="" disabled></option>
                            <option style="display:none;" id="12" value="" disabled></option>
                            <option style="display:none;" id="13" value="" disabled></option>
                            <option style="display:none;" id="14" value="" disabled></option>
                            <option style="display:none;" id="15" value="" disabled></option>
                            <option style="display:none;" id="16" value="" disabled></option>
                            <option style="display:none;" id="17" value="" disabled></option>
                        </select>
                    </div> -->
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

    // function habilitar() {
    //     var usuario = document.getElementById("username");
        // var cac = document.getElementById("cac");
        // var opcionmenu = document.getElementById("opcionmenu");
        // var opcion = new Array();

        // for(var i=0;i<17;i++){
        //     opcion[i] = document.getElementById(i+1);
        // }            

        // if (usuario.value == "" || usuario.value == null) {
        //     cac.disabled = true;
        // } else {
        //     cac.disabled = false;
        // }      
        
        // if(usuario.value == "admindivision"){
        //     opcionmenu.label = "-- Elija División --";

        //     opcion[0].label = "Baja California";
        //     opcion[0].value = "bajacalifornia";   

        //     opcion[1].label = "Baja California Sur";
        //     opcion[1].value = "bajacaliforniasur";   

        //     opcion[2].label = "Bajío";
        //     opcion[2].value = "bajio";  

        //     opcion[3].label = "Centro Occidente";
        //     opcion[3].value = "centrooccidente";  

        //     opcion[4].label = "Centro Oriente";
        //     opcion[4].value = "centrooriente";   

        //     opcion[5].label = "Centro Sur";
        //     opcion[5].value = "centrosur";   

        //     opcion[6].label = "Golfo Centro";
        //     opcion[6].value = "golfocentro";   

        //     opcion[7].label = "Golfo Norte";
        //     opcion[7].value = "golfonorte";   
        //     opcion[7].style.display = "block";

        //     opcion[8].label = "Jalisco";
        //     opcion[8].value = "jalisco";  
        //     opcion[8].style.display = "block";

        //     opcion[9].label = "Noroeste";
        //     opcion[9].value = "Noroeste";  
        //     opcion[9].style.display = "block";

        //     opcion[10].label = "Norte";
        //     opcion[10].value = "norte";  
        //     opcion[10].style.display = "block";

        //     opcion[11].label = "Oriente";
        //     opcion[11].value = "Oriente";  
        //     opcion[11].style.display = "block";

        //     opcion[12].label = "Península";
        //     opcion[12].value = "peninsula";  
        //     opcion[12].style.display = "block";

        //     opcion[13].label = "Sureste";
        //     opcion[13].value = "Sureste";  
        //     opcion[13].style.display = "block";

        //     opcion[14].label = "Valle de México Centro";
        //     opcion[14].value = "valledemexicocentro";  
        //     opcion[14].style.display = "block";

        //     opcion[15].label = "Valle de México Norte";
        //     opcion[15].value = "valledemexiconorte";  
        //     opcion[15].style.display = "block";

        //     opcion[16].label = "Valle de México Sur";
        //     opcion[16].value = "valledemexicosur";   
        //     opcion[16].style.display = "block";         
        // }

        // else if(usuario.value == "adminzona"){
        //     opcionmenu.label = "-- Elija Zona --";

        //     opcion[0].label = "Altos";
        //     opcion[0].value = "altos";   

        //     opcion[1].label = "Ciénega";
        //     opcion[1].value = "cienega";   

        //     opcion[2].label = "Zapotlán";
        //     opcion[2].value = "zapotlan";  

        //     opcion[3].label = "Costa";
        //     opcion[3].value = "costa";  

        //     opcion[4].label = "Minas";
        //     opcion[4].value = "minas";   

        //     opcion[5].label = "Chapala";
        //     opcion[5].value = "chapala";   

        //     opcion[6].label = "Santiago";
        //     opcion[6].value = "santiago";    
       
        //     opcion[7].label = "Vallarta";
        //     opcion[7].value = "vallarta";
        //     opcion[7].style.display = "block";
            
        //     opcion[8].label = "ZMH";
        //     opcion[8].value = "zmh";
        //     opcion[8].style.display = "block";
            
        //     opcion[9].label = "ZMJ";
        //     opcion[9].value = "zmj";
        //     opcion[9].style.display = "block";
            
        //     opcion[10].label = "ZML";
        //     opcion[10].value = "zml";
        //     opcion[10].style.display = "block";
            
        //     opcion[11].label = "ZMR";
        //     opcion[11].value = "ZMR";
        //     opcion[11].style.display = "block";
            
        //     for(var i=12; i<17;i++){
        //         opcion[i].style.display = "none";
        //     }

        // }
        // else if(usuario.value == "admin" || usuario.value == "matrix"){
            
        //     opcionmenu.label = "-- Elija CAC --";

        //     opcion[0].label = "Camichines";
        //     opcion[0].value = "camichines";   

        //     opcion[1].label = "Paradero";
        //     opcion[1].value = "paradero";   

        //     opcion[2].label = "Revolución";
        //     opcion[2].value = "revolucion";  

        //     opcion[3].label = "Santa Fé";
        //     opcion[3].value = "santa fe";  

        //     opcion[4].label = "Tlaquepaque";
        //     opcion[4].value = "tlaquepaque";   

        //     opcion[5].label = "Toluquilla";
        //     opcion[5].value = "toluquilla";   

        //     opcion[6].label = "Tonalá";
        //     opcion[6].value = "tonala";      

        //     for(var i=7;i<17;i++){
        //         opcion[i].style.display = "none";
        //     } 
        // }
    // }

</script>

</html>