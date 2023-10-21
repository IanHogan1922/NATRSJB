<?php

    require '../../db.php'; // CHANGE IT IF YOU NEED!!

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

?>

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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <link rel="shortcut icon" href="">
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
                    <li><a href="" id="home-link" target="_self">All Jobs</a></li>
                    <li><a href="https://www.greenriver.edu/students/academics/degrees-programs/natural-resources/"
                           target="_blank" >GRC NATRS Home page</a></li>
                    <li><a href="add_jobs">Data Entry</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <table id="job-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Employment Status</th>
                <th>Company</th>
                <th>Category</th>
                <th>Location</th>
                <th>Date Posted</th>
                <th>Expires</th>
                <th>Permanent Position</th>
                <th>Internship</th>
                <th>Paid</th>
            </tr>
        </thead>
        <tbody>

    <?php

        $sql = "SELECT * FROM jobboard WHERE job_title != ''";

        $result = @mysqli_query($cnxn, $sql);

        while($row = @mysqli_fetch_assoc($result)) {
            $title = $row['job_title'];
            $status = $row['status'];
            $company = $row['company_name'];
            $category = $row['category'];
            $location = $row['location'];
            $posted = $row['post_date'];
            $expiration = $row['expiration'];
            $permanent = $row['permanent'];
            $internship = $row['internship'];
            $paid = $row['paid'];

            // Convert 1 to "Yes" and 0 to "No" for boolean fields
            $permanentText = ($permanent == 1) ? "Yes" : "No";
            $internshipText = ($internship == 1) ? "Yes" : "No";
            $paidText = ($paid == 1) ? "Yes" : "No";

            echo "<tr>
                 <td>$title</td>
                 <td>$status</td>
                 <td>$company</td>
                 <td>$category</td>
                 <td>$location</td>
                 <td>$posted</td>
                 <td>$expiration</td>
                 <td>$permanentText</td>
                 <td>$internshipText</td>
                 <td>$paidText</td>
              </tr>";
        }
        ?>

        </tbody>
    </table>


</body>
</html>