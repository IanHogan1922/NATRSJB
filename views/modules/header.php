<!DOCTYPE html>
<html lang="en">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <title>NATRS Job Board</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/newStyle.css">
    <link rel="stylesheet" type="text/css" href="bootstrap-css/newBootstrap.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="icon" href="pictures/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>
<body>

<header>
    <div class="image-container">
        <img src="pictures/helmet-newstickersupercrop.jpg" alt="Helmet Image" class="main-image">
        <img src="pictures/GRC_Logo_White.png" alt="GRC logo" class="upper-left-image">
        <div class="text-overlay">
            <h1>Natural Resources</h1>
            <p>Job Board</p>
        </div>
    </div>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar" aria-expanded="false">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div class="navbar-collapse collapse" id="myNavbar" role="navigation" aria-expanded="false" style="height: 1px;">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="/NATRSJB" id="home-link" target="_self">All Jobs</a></li>
                <li><a href="https://www.greenriver.edu/students/academics/degrees-programs/natural-resources/"
                       target="_blank" >GRC NATRS Home page</a></li>
                <li><a href="announcements">Announcements</a></li>
                <li><a href="add_jobs">Data Entry</a></li>
                <li><a href="newAnnouncement">New Announcement</a></li>
                <li class="right">
                    <!-- Check for a condition (in this case, whether $_SESSION['logged'] is set) -->
                    <?php
                    if (isset($_SESSION['logged'])) {
                        echo '<a href="' . $BASE . '/logout" target="_self">Logout</a>';
                    } else {
                        echo '<a href="login">Admin Login</a>'; // Link to login.php
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>