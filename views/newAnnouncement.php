<?php

require '../../db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'views/modules/header.html'
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>New Announcement</h2>
            <form class="container" action="" method="POST">
                <p>Title: <input placeholder="Title" type="text" name="title"></p>
                <p>Description:</p>
                <p><textarea placeholder="Enter description" rows="8" cols="50" type="text" name="description"></textarea></p>

                <!--                        <p>Applicable Career Track: <input placeholder="Career Track" type="text" name="category"></p>-->
                <div class="checkbox">
                    <label><input type="checkbox" name="visibility" value="1"><span>Make it visible</span></label>
                </div>
                <p><input type="submit" value="Submit"></p>
            </form>
        </div>
    </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $visibility = isset($_REQUEST['visibility']) ? 1 : 0;

    $sql = "INSERT INTO announcements(title, description, date, visibility) 
            VALUES ('$title', '$description', CURRENT_TIMESTAMP, '$visibility')";

    $result = @mysqli_query($cnxn, $sql);

}
?>


<?php include 'views/modules/footer.php'; ?>
