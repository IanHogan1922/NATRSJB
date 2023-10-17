<?php
    require '/home/ianschro/db3.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
<h1>Natural Resource Job Board</h1>
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
        <th>Apply Now</th>
    </tr>
    </thead>
    <tbody>
    <?php



    $result = @mysqli_query($cnxn, $sql);

    $sql = "SELECT * FROM jobboard";

    $result = @mysqli_query($cnxn, $sql);

    while($row = @mysqli_fetch_assoc($result))
    {
        $title = $row['title'];
        $status = $row['status'];
        $company = $row['company'];
        $category = $row['category'];
        $location = $row['location'];
        $posted = $row['posted'];
        $expiration = $row['expiration'];
        $permanent = $row['permanent'];
        $internship = $row['internship'];
        $paid = $row['paid'];


        echo "<div class = 'table'>$title $status $company $category $location $posted $expiration $permanent $internship $paid 
            </div>";
    }

    ?>

    </tbody>
</table>
<!--<script src="script.js"></script>-->
</body>
</html>