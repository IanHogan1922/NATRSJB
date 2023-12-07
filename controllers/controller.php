<?php

use classes\job;
use classes\announcement;

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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $title = $_REQUEST['title'];
            $status = $_REQUEST['status'];
            $company = $_REQUEST['company'];
            $category = $_REQUEST['category'];
            $data['category'] = $category;
            $category = implode(", ", $data);
            $location = $_REQUEST['location'];
            $expiration = $_REQUEST['expiration'];
            $permanent = isset($_REQUEST['permanent']) ? 1 : 0;
            $internship = isset($_REQUEST['internship']) ? 1 : 0;
            $paid = isset($_REQUEST['paid']) ? 1 : 0;
            $url = $_REQUEST['url'];
            $visibility = 1;

            $newJob = new job($title, $status, $company, $category, $location,
                $expiration, $permanent, $internship, $paid, $url, $visibility);

            $GLOBALS['dataLayer']->addJob($newJob);
        }

        $view = new Template();
        echo $view->render('views/dataEntry.html');
    }

    function newAnnouncement() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $title = $_REQUEST['title'];
            $description = $_REQUEST['description'];
            $visibility = 1;

            $newAnnouncement = new announcement($title, $description, $visibility);

            $GLOBALS['dataLayer']->addAnnouncement($newAnnouncement);
        }

        $view = new Template();
        echo $view->render('views/newAnnouncement.html');
    }

    function logIn()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the form data
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];


            if ($GLOBALS['dataLayer']->signIn($email, $password)) {
                echo 'Sign in successful!';
//                $f3->reroute('/');
            } else {
                echo 'Sign in failed!';
            }
        }

        $view = new Template();
        echo $view->render('views/login.html');
    }
}