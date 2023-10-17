<?php

$username = 'ianschro';
$password = 'kY3iIta15EJ;(8';
$hostname = 'localhost';
$database = 'ianschro_NATRS_Job_Board_2.0';
$cnxn = @mysqli_connect($hostname, $username, $password, $database) or
die("Error Connecting to DB: " . mysqli_connect_error());
echo 'connected to Database!';
?>