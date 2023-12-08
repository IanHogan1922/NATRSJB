<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('model/data-layer.php');
require_once('vendor/autoload.php');
require_once('controllers/controller.php');

// Connect to Database
$dataLayer = new DataLayer();

//Create an instance of the Base class
$f3 = Base::instance();

//Create an instance of the Controller class
$controller = new Controller($f3);

//Define a default route
$f3->route('GET /', function() {

    $GLOBALS['controller']->home();

});

$f3->route('GET|POST /add_jobs', function() {

    $GLOBALS['controller']->dataEntry();

});

$f3->route('GET /announcements', function() {

    $GLOBALS['controller']->announcements();
});

$f3->route('GET|POST /newAnnouncement', function() {

    $GLOBALS['controller']->newAnnouncement();

});

// route for the login page

$f3->route('GET|POST /login', function() {

    $GLOBALS['controller']->logIn();

});

$f3->route('GET /logout', [$controller, 'logout']);

//Run fat free
$f3->run();