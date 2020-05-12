<?php

    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
        session_start();
        require '../../php/conexion.php';
        sleep(2);

        $conexion->set_charset('utf8');

        $user = $conexion->real_escape_string($_POST['username']);
        $contraseña = $conexion->real_escape_string($_POST['password']);     
        $cac = $_POST['cac'];           

        if($nueva_consulta = $conexion->prepare("SELECT * FROM usuario WHERE rpe = ? AND contraseña = ?")){
            $nueva_consulta->bind_param('ss', $user, $contraseña);
            $nueva_consulta->execute();
            $resultado = $nueva_consulta->get_result();

            if($resultado->num_rows==1 && ($user == "admin" || $user == "adminzona" || $user == "admindivision")):
                $filas = $resultado->fetch_assoc();
                $_SESSION['rpe'] = $user;    
                $_SESSION['cac'] = $cac;    
                echo json_encode(array('error'=> false, 'tipo'=> $filas['rpe']));  
                exit(0);     
            endif;
            
             if($resultado->num_rows==1 && $user == "matrix"):
                $filas = $resultado->fetch_assoc();
                $_SESSION['rpe'] = $user;        
                echo json_encode(array('error'=> false, 'tipo'=> $filas['rpe']));  
                exit(0);     
            endif;


            if($resultado->num_rows == 1){
                $filas = $resultado->fetch_assoc();
                $update = $conexion->query("UPDATE ejecutivo SET puesto_laboral = '".$cac."' WHERE rpe = '".$filas['rpe']."'");
                $_SESSION['rpe'] = $user;
                $_SESSION['cac'] = $cac;
                echo json_encode(array('error'=> false, 'tipo'=> $filas['rpe']));
            }else{
                echo json_encode(array('error'=>true));
            }

            $nueva_consulta->close();
         }
}

$conexion->close();
    // $usuario = $_POST['username'];
    // $contraseña = $_POST['password'];
    // $cac = $_POST['cac'];

    // if($usuario=='admin'){
    //     $_SESSION['usuario'] = $usuario;
    //     header("Location: ../../admin.php");   
    //     exit;     
    // }
    
    // //Query
    // $query = "SELECT * FROM ejecutivo WHERE rpe='$usuario'";

    // $resultado = $conexion->query($query);

    // if($resultado->num_rows>0 and $contraseña==$usuario){
    //     $_SESSION['rpe'] = $usuario;
    //     $_SESSION['cac'] = $cac;
    //     header("Location: ../../encuesta.php");        
    // }
    // else{
    //     echo "<script>alert('No existe un usuario con ese RPE');                         
    //         window.history.go(-1);
    //         </script>";  

    //         $conexion->close();
    //         session_destroy();
    // }




    /*Login de SSBJALISCO */

    // session_start();
    // require '../../php/conexion.php';

    // $usuario = $_POST['username'];
    // $cac = $_POST['cac'];
    //  $contrase単a = $_POST['password'];
     
    //  if($usuario=='admin'){
    //     $_SESSION['usuario'] = $usuario;
    //     header("Location: ../../admin.php");   
    //     exit;     
    // }
    
    // //Query
    // $query = "SELECT * FROM ejecutivo WHERE rpe='$usuario'";

    // $resultado = $conexion->query($query);

    // if($resultado->num_rows>0 and $contrase単a==$usuario){
    //     $_SESSION['rpe'] = $usuario;
    //     $_SESSION['cac'] = $cac;
    //     header("Location: ../../encuesta.php");        
    // }
    // else{
    //     echo "<script>alert('No existe un usuario con ese RPE');                         
    //         window.history.go(-1);
    //         </script>";  

    //         $conexion->close();
    //         session_destroy();
    // }



?>