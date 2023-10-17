<?php
    require '/home/ianschro/db3.php';
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
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
        <th>Paid</th>
    </tr>
    </thead>
    <tbody>
<?php
    $sql = "SELECT * FROM jobboard WHERE job_title != ''";

    $result = @mysqli_query($cnxn, $sql);

    while($row = @mysqli_fetch_assoc($result))
    {
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
<!--    <script src="../scripts/script.js"></script>-->
</body>
</html>