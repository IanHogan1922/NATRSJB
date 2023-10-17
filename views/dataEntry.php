<?php
    require '/home/ianschro/db3.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h2 class="container">Placeholder for form data</h2>
    <form class="container" action="" method="POST">
        <p>The Job Title: <input placeholder="Job Title" type="text" name="title"></p>
        <p>Employment Status: <input placeholder="Full-time, Part-time, Seasonal" type="text" name="status"></p>
        <p>Company Name: <input placeholder="Company Name" type="text" name="company"></p>
        <p>Applicable Career Track: <input placeholder="Tracks" type="text" name="category"></p>
        <p>Location: <input placeholder="Location" type="text" name="Location"></p>
        <p>Post Date: <input placeholder="Date of Entry" type="text" name="posted"></p>
        <p>Post Expiration: <input placeholder="Post expiration date" type="text" name="expires"></p>
        <p>Permanent Position: <input type="checkbox" name="permanent"></p>
        <p>Internship: <input type="checkbox" name="internship"></p>
        <p>Paid: <input type="checkbox" name="paid"></p>
        <p><input type="submit" value="Submit"></p>
    </form>


</body>
</html>