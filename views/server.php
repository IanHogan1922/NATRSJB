<?php
session_start();

// initializing variables
$hostname = 'localhost';
$username = 'natrsjob';
$password = 'MMU6[0bjxm8O7(';
$database = 'MMU6[0bjxm8O7(';
$email    = 'natrsjob_login';
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
