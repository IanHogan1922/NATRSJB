<?php

    require '../../db.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Entry</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/newStyle.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="shortcut icon" href="">
</head>
    <body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="dataEntry.php">Data Entry</a></li>
        </ul>
    </nav>
        <h2 class="form-vertical">Job Entry Sheet</h2>
        <form class="container" action="" method="POST">
            <p>The Job Title: <input placeholder="Job Title" type="text" name="title"></p>
            <p>Employment Status: <input placeholder="Full-time, Part-time, Seasonal" type="text" name="status"></p>
            <p>Company Name: <input placeholder="Company Name" type="text" name="company"></p>
            <p>Location: <input placeholder="Location" type="text" name="location"></p>
            <p>Post Expiration: <input type="date" name="expiration"></p>
            <p>Applicable Career Track: <input placeholder="Career Track" type="text" name="category"></p>
<!--            <div class="col-sm-12">-->
<!--                <div class="col-xs-12 input-group">-->
<!--                    <fieldset class="form-group" id="checkbox-display">-->
<!--                        <h4>Applicable Career Track:<h4>-->
<!--                                <div class="col-xs-12">-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="GIS"><span>GIS</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Forestry"><span>Forestry</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Water Quality"><span>Water Quality</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Park Management"><span>Park Management</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Restoration"><span>Restoration</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Conservation"><span>Conservation</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Fish and Wildlife"><span>Fish and Wildlife</span></label>-->
<!--                                    </div>-->
<!--                                    <div class="checkbox">-->
<!--                                        <label><input type="checkbox" name="category[]" value="Wildland Fire"><span>Wildland Fire</span></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                    </fieldset>-->
<!--                </div>-->
<!--            </div>-->
<!--            <p>Permanent Position: <input placeholder="1 or 0" type="text" name="permanent"></p>-->
<!--            <p>Internship: <input placeholder="1 or 0" type="text" name="internship"></p>-->
<!--            <p>Paid: <input placeholder="1 or 0" type="text" name="paid"></p>-->
            <div class="col-sm-12">
                <div class="col-xs-12 input-group">
                    <fieldset class="form-group" id="payment-checkbox-display">
                        <h4>Select all that apply for the job:</h4>
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label><input type="checkbox" name="permanent" value="1"><span>Permanent</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="internship" value="1"><span>Internship</span></label>
                            </div>
                            <div class="checkbox">
                                <label><input type="checkbox" name="paid" value="1"><span>Paid</span></label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <p><input type="submit" value="Submit"></p>
        </form>
        <?php


        $title = $_REQUEST['title'];
        $status = $_REQUEST['status'];
        $company = $_REQUEST['company'];
        $category = $_REQUEST['category'];
//        $category = serialize($_REQUEST['category']);
        $location = $_REQUEST['location'];
        $expiration = $_REQUEST['expiration'];
        $permanent = isset($_REQUEST['permanent']) ? 1 : 0;
        $internship = isset($_REQUEST['internship']) ? 1 : 0;
        $paid = isset($_REQUEST['paid']) ? 1 : 0;

        $sql = "INSERT INTO jobboard VALUES ('$title', '$status', '$company', '$category', '$location', 
                             CURRENT_TIMESTAMP, '$expiration', '$permanent', '$internship', '$paid')";

        $result = @mysqli_query($cnxn, $sql);

        ?>

    </body>
</html>