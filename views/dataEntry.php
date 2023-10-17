<?php
    require '/home/ianschro/db3.php';
//    error_reporting(E_ALL);
//    ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Entry</title>
</head>
    <body>
        <h2 class="container">Placeholder for form data</h2>
        <form class="container" action="" method="POST">
            <p>The Job Title: <input placeholder="Job Title" type="text" name="title"></p>
            <p>Employment Status: <input placeholder="Full-time, Part-time, Seasonal" type="text" name="status"></p>
            <p>Company Name: <input placeholder="Company Name" type="text" name="company"></p>
            <p>Applicable Career Track: <input placeholder="Tracks" type="text" name="category"></p>
            <p>Location: <input placeholder="Location" type="text" name="location"></p>
            <p>Post Expiration: <input type="date" name="expiration"></p>
            <p>Permanent Position: <input placeholder="1 or 0" type="text" name="permanent"></p>
            <p>Internship: <input placeholder="1 or 0" type="text" name="internship"></p>
            <p>Paid: <input placeholder="1 or 0" type="text" name="paid"></p>
            <p><input type="submit" value="Submit"></p>
        </form>
        <?php

        $title = $_REQUEST['title'];
        $status = $_REQUEST['status'];
        $company = $_REQUEST['company'];
        $category = $_REQUEST['category'];
        $location = $_REQUEST['location'];
        $expiration = $_REQUEST['expiration'];
        $permanent = $_REQUEST['permanent'];
        $internship = $_REQUEST['internship'];
        $paid = $_REQUEST['paid'];

        $sql = "INSERT INTO jobboard VALUES ('$title', '$status', '$company', '$category', '$location', 
                             CURRENT_TIMESTAMP, '$expiration', '$permanent', '$internship', '$paid')";

        $result = @mysqli_query($cnxn, $sql);

        ?>

    </body>
</html>