<?php

$username = 'natrsjob';
$password = 'MMU6[0bjxm8O7(';
$hostname = 'localhost';
$database = 'natrsjob_db';
$cnxn = @mysqli_connect($hostname, $username, $password, $database) or
die("Error Connecting to DB: " . mysqli_connect_error());
echo 'connected to Database!';