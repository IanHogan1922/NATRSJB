<?php include 'views/modules/header.php'; ?>
<?php include('views/server.php') ?>

    <div class="container login-form">
        <div class="col-sm-12 split-top">
            <div class="col-sm-12">
                <form class="form-horizontal" action="/login" method="post">
                <div class="form-group">
                        <label class="control-label col-sm-2">Email:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="Enter email" name="email" required autofocus>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2">Password:</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control" placeholder="Enter password" name="password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-primary col-xs-12 col-sm-offset-2 col-sm-8 split-top" name="submit">
                        </div>
                    </div>
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