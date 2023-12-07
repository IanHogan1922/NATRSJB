<?php

//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require the autoload file
require_once('vendor/autoload.php');
require_once('model/data-layer.php');
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
    $view = new View();
    echo $view->render('views/dataEntry.php');
});

//$f3->route('GET|POST /add_jobs', [$controller, 'dataEntry']);

$f3->route('GET /login', function() {
    $view = new View(); // View
    echo $view->render('views/login.php');
});

$f3->route('GET /announcements', function() {

    $GLOBALS['controller']->announcements();
});

$f3->route('GET|POST /newAnnouncement', function() {
    $view = new View(); // View
    echo $view->render('views/newAnnouncement.php');
});

// route for the login page

$f3->route('POST /login', function() {
    // Handle the form submission here
    session_start();

    // initializing variables
    $username = "";
    $email    = "";
    $errors = array();

    // connect to the database
    $db = mysqli_connect('localhost', 'natrsjob', 'MMU6[0bjxm8O7(', 'natrsjob_login');

    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }

    // LOGIN USER
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $query = "SELECT * FROM users WHERE email='$email'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                $_SESSION['success'] = "You are now logged in";
                header('location:views/dataEntry.php');
            } else {
                array_push($errors, "Wrong password");
            }
        } else {
            array_push($errors, "Email not found");
        }
    }

    // Handle errors or redirection here (if needed)
});

//Run fat free
$f3->run();