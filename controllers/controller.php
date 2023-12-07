<?php

class Controller {
    private $_f3;

    function __construct($f3) {
        $this->_f3 = $f3;
    }


    function home() {
        $jobs = $GLOBALS['dataLayer']->getJobs();
        $this->_f3->set('jobs', $jobs);

        $view = new Template();
        echo $view->render('views/home.html');
    }

    function announcements() {

        // Get data
        $announcements = $GLOBALS['dataLayer']->getAnnouncements();
        $this->_f3->set('announcements', $announcements);

        $view = new Template();
        echo $view->render('views/announcements.html');
    }

    function dataEntry() {

        $errors = [];

//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//            $title = isset($_POST['title']) ? $_POST['title'] : "";
//            $status = isset($_POST['status']) ? $_POST['status'] : "";
//            $company = isset($_POST['company']) ? $_POST['company'] : "";
//            $category = isset($_POST['category']) ? $_POST['category'] : "";
//            $data = isset($_POST['category']) ? $_POST['category'] : "";
//            $location = isset($_POST['location']) ? $_POST['location'] : "";
//            $expiration = isset($_POST['expiration']) ? $_POST['expiration'] : "";
//            $permanent = isset($_POST['permanent']) ? $_POST['permanent'] : "";
//            $internship = isset($_POST['internship']) ? $_POST['internship'] : "";
//            $paid = isset($_POST['paid']) ? $_POST['paid'] : "";
//
//        }

//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//
//            $title = $_REQUEST['title'];
//            $status = $_REQUEST['status'];
//            $company = $_REQUEST['company'];
//            $category = $_REQUEST['category'];
//            $category = implode(", ", $category);
//            $data['category'] = $category;
//            $location = $_REQUEST['location'];
//            $expiration = $_REQUEST['expiration'];
//            $permanent = isset($_REQUEST['permanent']) ? 1 : 0;
//            $internship = isset($_REQUEST['internship']) ? 1 : 0;
//            $paid = isset($_REQUEST['paid']) ? 1 : 0;
//            $url = $_REQUEST['url'];
//            $job_number = null;
//            $visibility = 1;
//
//            $sql = "INSERT INTO jobboard2 (job_title, status, company_name, category, location, post_date, expiration, permanent, internship, paid, url_link, visibility)
//                                VALUES ('$title', '$status', '$company', '$category', '$location', CURRENT_TIMESTAMP, '$expiration', '$permanent', '$internship', '$paid', '$url', '$visibility')";
//
//            $result = @mysqli_query($cnxn, $sql);
//
//        }

        $view = new Template();
        echo $view->render('views/dataEntry.php');
    }

    /*// Method to display the login page
    public function loginPage($f3) {
        echo Template::instance()->render('login.php');
    }

    // Method to process the login form
    public function processLogin($f3) {
        // Your login logic here

        // Assuming login is successful, redirect to some page (e.g., dashboard)
        $f3->reroute('/admin/dashboard');
    }*/
}