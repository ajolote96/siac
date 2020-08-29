<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registros</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
                        <a class="nav-link" href="form-pregunta.php">Crear</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="edit-preguntas.php">Editar</a>
                        <span class="sr-only">(current)</span>
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
                <h1 class="mt-5">Lista de Preguntas</h1>


                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                           <th scope="col">ID</th>
                            <th scope="col">CAMPAÑA</th>
                            <th scope="col">PREGUNTA</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
            <?php
                require "../back/conectar.php";
                $sql = "SELECT * FROM preguntas";
            $res = mysqli_query($conexion, $sql);
            $num = mysqli_num_rows($res);
            
            for($i = $num; $objeto = $res->fetch_object() ; $i++)
            {
                ?>

                    <tbody>
                        <tr>
                            <th scope="row"><?= $objeto->id?></th>
                            <td><?= $objeto->campaña?></td>
                            <td><?= $objeto->preguntas?></td>
                    <td>
                        <a href="edicion-preguntas.php?id=<?=$objeto->id?>"><input class="boton2" type="button" value="Editar"/></a>   
                    </td> 
                        </tr>
                    </tbody>



                    <?php
            }
            ?>
                </table>
            </div>
        </div>
    </div>



</body>

</html>
