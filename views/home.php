<?php

    require '../../db.php';

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
    <link rel="stylesheet" type="text/css" href="bootstrap-css/newBootstrap.css">
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
        <!--<nav class="navbar navbar-default">
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
        </nav>-->
    </header>
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
    <div class="container-fluid">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div id="filterButton" onclick="toggleContent()">
                Keyword Filter &#62;
            </div>
            <div class="overlay" id="filterOverlay">
                <div class="content" id="hiddenContent" style="display: none;">
                    <br>
                    <form>
                        <label><strong>Employment Type:</strong></label>
                        <br>
                        <input type="checkbox" id="fullTime" name="fullTime" value="Full-Time" onchange="filterTable()">
                        <label for="fullTime">Full Time</label>
                        <br>
                        <input type="checkbox" id="partTime" name="partTime" value="Part-Time" onchange="filterTable()">
                        <label for="fullTime">Part Time</label>
                        <br>
                        <input type="checkbox" id="internship" name="internship" value="Internship" onchange="filterTable()">
                        <label for="internship">Internship</label>
                        <br>
                        <label for="userDateChoice"><strong>Date Posted:</strong></label>
                        <input type="month" name="userDateChoice" id="userDateChoice" oninput="filterTable()">
                        <br>
                        <label><strong>Location:</strong></label>
                        <br>
                        <input type="text" id="location" name="location" placeholder="Enter a Location" oninput="filterTable()">
                        <br>
                        <label><strong>Industry/Field:</strong></label>
                        <br>
                        <input type="text" id="industryField" name="Industry/Field" placeholder="Enter a Field/Industry" oninput="filterTable()">
                        <br>
                        <br>
                        <button type="submit"  id="backToPageButton" form="backToPageButton" value="backToPageButton"
                                onclick="toggleContent()">Show Filtered Content</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
            <select id="sortOptions" onchange="sortTable()">
                <option value="0">Sort by Title</option>
                <option value="1">Sort by Employment Status</option>
                <option value="2">Sort by Company</option>
                <option value="3">Sort by Category</option>
                <option value="4">Sort by Location</option>
                <option value="5">Sort by Date Posted</option>
                <option value="6">Sort by Expiry</option>
                <option value="7">Sort by Permanent Position</option>
                <option value="8">Sort by Internship</option>
                <option value="9">Sort by Paid Job</option>
            </select>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="jobs-table">
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
                                <th>Apply Now</th>
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
        $data = $row['category'];
        $category = explode(", ", $data);
        $category = $row['category'];
        $location = $row['location'];
        $dataBaseDate = $row['post_date'];
        $formattedDate = date("M d,Y", strtotime($dataBaseDate));
        $dataBaseExpire = $row['expiration'];
        $formattedExpiration = date("M d,Y", strtotime($dataBaseExpire));
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
             <td>$formattedDate</td>
             <td>$formattedExpiration</td>
             <td>$permanentText</td>
             <td>$internshipText</td>
             <td>$paidText</td>
             <td><a href='#'>Apply</a></td> <!-- TODO: include link to application flier -->
          </tr>";
    }
?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="scripts/newJobBoard.js"></script>
</body>
</html>