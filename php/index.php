<?php
    
    
    session_start();

    if(isset($_SESSION['counter'])){
        
        if($_SESSION['counter']==5){                    
            $_SESSION['counter']=1; 
            echo "exit";           
            exit(0);              
        }
        else if($_SESSION['counter']>=1) {
            mandarPregunta();
            $_SESSION['counter']+=1;
        }        
    }
    else{
    $_SESSION['counter']=1;
        mandarPregunta(); 
        $_SESSION['counter']+=1;
    }

    function mandarPregunta(){
        include 'conexion.php';
        $contador = $_SESSION['counter'];

        $respuesta = "";


        $query = "SELECT * FROM preguntas WHERE id=$contador";
        $respuesta = $conexion->query($query);
        $filas = $respuesta->fetch_assoc();


        $respuesta = "<h2>¿".$filas['preguntas']."?</h2>";

        echo $respuesta;

        $conexion->close();
    }

    ?>