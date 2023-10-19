<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function() {
    $view = new View(); // View
    echo $view->render('views/home.php');

});

$f3->route('GET|POST /add_jobs', function() { // don't forget "GET|POST"
    $view = new View();
    echo $view->render('views/dataEntry.php');

});





//Run fat free
$f3->run();