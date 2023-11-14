<?php

require '../../db.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'views/modules/header.html';
?>

<div class="container">
    <div id ="announcements" class="col-xs-12">
        <div class="col-xs-12 split-top">
            <h2 class="text-center">Announcements</h2>
            <?php

            $sql = "SELECT * FROM announcements WHERE visibility != '0'";

            $result = @mysqli_query($cnxn, $sql);

            while($row = @mysqli_fetch_assoc($result)) {
                $date = $row['date'];
                $description = $row['description'];
                $title = $row['title'];
                $visibility = $row['visibility'];

                echo "
                <div class='panel panel-success'>
                <div class='panel-heading'>
                    <strong>$title</strong>
                    <span class='pull-right'><strong>$date</strong></span>
                    <div class='panel-body wrap-text'>
                        $description
                    </div>
                </div>
            </div>
            ";
            }

            ?>
        </div>
    </div>
</div>

<?php include 'views/modules/footer.php'; ?> <!-- footer -->


