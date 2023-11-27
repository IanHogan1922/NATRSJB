<?php

require '../../db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'views/modules/header.html'
?>

<div class="container announcement-form">
            <h2 class="text-center">New Announcement</h2>
            <form action="" method="POST">
                <p>Title: <br><input type="text" class="announcement-title" name="title" required></p>
                <p>Description:<br><textarea class="announcement-description" rows="6" name="description" required></textarea></p>
            <!--<p>Applicable Career Track: <input placeholder="Career Track" type="text" name="category"></p>-->
                <div class="checkbox">
                    <label><input type="checkbox" name="visibility" value="1"><span>Make it visible</span></label>
                </div>
                <p><input type="submit" value="Submit" id="dataEntrySubmitButton"></p>
            </form>
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
