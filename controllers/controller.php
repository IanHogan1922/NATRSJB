<?php


class Controller {
    private $_f3;

    function __construct($f3) {
        $this->_f3 = $f3;
    }


    function home() {
        $view = new Template();
        echo $view->render('views/home.php');
    }

    function announcements() {
        $view = new Template();
        echo $view->render('views/announcements.php');
    }

    function dataEntry($f3) {

        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $title = isset($_POST['title']) ? $_POST['title'] : "";
            $status = isset($_POST['status']) ? $_POST['status'] : "";
            $company = isset($_POST['company']) ? $_POST['company'] : "";
            $category = isset($_POST['category']) ? $_POST['category'] : "";
            $data = isset($_POST['category']) ? $_POST['category'] : "";
            $location = isset($_POST['location']) ? $_POST['location'] : "";
            $expiration = isset($_POST['expiration']) ? $_POST['expiration'] : "";
            $permanent = isset($_POST['permanent']) ? $_POST['permanent'] : "";
            $internship = isset($_POST['internship']) ? $_POST['internship'] : "";
            $paid = isset($_POST['paid']) ? $_POST['paid'] : "";

        }

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