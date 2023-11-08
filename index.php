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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $title = isset($_POST['title']) ? $_POST['title'] : "";
        $status = isset($_POST['status']) ? $_POST['status'] : "";
        $company = isset($_POST['company']) ? $_POST['company'] : "";
        $category = isset($_POST['category']) ? $_POST['category'] : "";
        $data = isset($_POST['category']) ? $_POST['category'] : "";
        $location = isset($_POST['location']) ? $_POST['location'] : "";
        $expiration = isset($_POST['expiration']) ? $_POST['expiration'] : "";
        $permanent = isset($_POST['permanent']) ? $_POST['permanent'] : "";
        $internship = isset($_POST['internship']) ? $_POST['internship'] : "";
        $paid = isset($_POST['paid']) ? $_POST['paid'] : "";

    }
    $view = new View();
    echo $view->render('views/dataEntry.php');
});

$f3->route('GET /login', function() {
    $view = new View(); // View
    echo $view->render('views/login.php');
});

$f3->route('GET /announcements', function() {
    $view = new View(); // View
    echo $view->render('views/announcements.php');
});


//Run fat free
$f3->run();