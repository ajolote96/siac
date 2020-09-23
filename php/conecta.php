<?php
if(!defined ('HOST')) define('HOST', 'localhost');
if(!defined ('BD')) define('BD', 'ssbjalis_encuestas');
if(!defined ('USER_BD')) define('USER_BD', 'ssbjaliscocom');
if(!defined ('PASS_BD')) define('PASS_BD', 'Z5jtrL!@W@*22DDxW6KgsEzco');

$con = mysqli_connect(HOST,USER_BD,PASS_BD,BD) or die ("Error".mysqli_error($con));
?>

