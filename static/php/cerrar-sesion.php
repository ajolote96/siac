<?php

    session_start();

    // $_SESSION['counter'] = 1;

    session_destroy();
    session_unset();


    header("Location: ../../index.php");


?>