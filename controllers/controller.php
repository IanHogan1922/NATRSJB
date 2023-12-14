<?php
/**
 * Class Name: Controller
 *
 * This class serves as the controller in the MVC, Fat-Free Framework architecture.  The controller is responsible
 * handling user request, and passing this data to different respective views for rendering the webpages.
 */
use classes\job;
use classes\announcement;

class Controller
{
    //fields
    private $_f3;
    private $admin; //= isset($_SESSION['admin']);

    //Constructor
    function __construct($f3) {
        $this->_f3 = $f3;
        $this->admin = $GLOBALS['dataLayer']->isAdmin();
        $this->_f3->set('admin', $this->admin);
    }

    function home()
    {
        //Set the title of the home page to "Job Board".
        $this->_f3->set('title', "Job Board");

        //Retrieves a list of jobs from the data layer.
        $jobs = $GLOBALS['dataLayer']->getJobs();
        //Assign the retrieved jobs to a $jobs variable for the view.
        $this->_f3->set('jobs', $jobs);

        //Creates new template object and renders the view/home page.
        $view = new Template();
        echo $view->render('views/home.html');

        if ($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            $jobNumbers = $_POST['jobs_to_hide'];
            // Call hideJob function
            $GLOBALS['dataLayer']->hideJobs($jobNumbers);
            $this->_f3->reroute('/');
        }
    }

    function announcements()
    {
        // Set the title of the announcement view to "Announcements".
        $this->_f3->set('title', "Announcements");
        // Retrieves a list of announcements from the data layer.
        $announcements = $GLOBALS['dataLayer']->getAnnouncements();
        // Assigns the retrieved announcements to the $announcement variable.
        $this->_f3->set('announcements', $announcements);

        //Creates new template object and renders the view/announcement page.
        $view = new Template();
        echo $view->render('views/announcements.html');
    }

    function dataEntry()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
            //Set the title of the page to "New Job".
            $this->_f3->set('title', "New Job");

            //Check if the form has been submitted via a POST Request.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Retrieves form data for new job entry.
                $title = $_REQUEST['title'];
                $status = $_REQUEST['status'];
                $company = $_REQUEST['company'];
                //Categories might be an array, so we implode it to a string seperated by commas.
                $category = $_REQUEST['category'];
                $category = implode(", ", $category);
                $location = $_REQUEST['location'];
                $expiration = $_REQUEST['expiration'];
                //Checkboxes for job attributes, defaulting to 0 if not set.
                $permanent = isset($_REQUEST['permanent']) ? 1 : 0;
                $internship = isset($_REQUEST['internship']) ? 1 : 0;
                $paid = isset($_REQUEST['paid']) ? 1 : 0;
                $url = $_REQUEST['url'];
                $visibility = 1;

                //Creates a new job object with the form data.
                $newJob = new job($title, $status, $company, $category, $location,
                    $expiration, $permanent, $internship, $paid, $url, $visibility);

                // Add the new job to the database using the data layer.
                $GLOBALS['dataLayer']->addJob($newJob);
            }
            // Retrieves categories from the data layer for selection within the form options.
            $categories = $GLOBALS['dataLayer']->getCategories();
            $this->_f3->set('categories', $categories);

            // Retrieve other data needed for the form.
            $others = $GLOBALS['dataLayer']->getOthers();
            $this->_f3->set('others', $others);

            //Creates new template object and renders the view/dataEntry page.
            $view = new Template();
            echo $view->render('views/dataEntry.html');
        } else {
            $this->_f3->reroute('/');
        }
    }

    function newAnnouncement()
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

            //Set the title of the page to "New Announcement".
            $this->_f3->set('title', "New Announcement");

            //Checks that the request method is POSTed.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                //Retrieves the title and description from the POSTed data.
                $title = $_REQUEST['title'];
                $description = $_REQUEST['description'];
                //Sets the default visibility for new announcements to 1.
                $visibility = 1;

                //Create a new announcement object with the data provided.
                $newAnnouncement = new announcement($title, $description, $visibility);

                // Add the new announcement to the database through the data layer.
                $GLOBALS['dataLayer']->addAnnouncement($newAnnouncement);
            }

            //Creates new template object and renders the view/newAnnouncement page.
            $view = new Template();
            echo $view->render('views/newAnnouncement.html');
        } else {
            $this->_f3->reroute('/');
        }
    }

    function logIn()
    {
        // Set the title of the log-in screen to Admin Login.
        $this->_f3->set('title', "Admin Login");

        //Check if the request method is POSTed.
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Retrieves the email and password from the POSTed form submission.
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];

            // Validating the user sign-in credentials
            if ($GLOBALS['dataLayer']->signIn($email, $password)) {
                echo 'Sign in successful!';
                $this->_f3->set('admin', true);
                $this->_f3->reroute('/');
            } else {
                echo 'Sign in failed!';
            }
        }
        //Creates new template object and renders the view/login page.
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function logout()
    {
        //If the user logs out, destroy the session because we do not need to keep instance of them anymore.
        session_destroy();
        //Reroute to the default route in the site.
        $this->_f3->reroute('/');
    }

    public function hide($id)
    {
        //send post data to the model
        $GLOBALS['dataLayer']->hideJob($id);
        $this->_f3->reroute('/');
    }

    public function deleteAnnouncement($id)
    {
        //send post data to the model
        $GLOBALS['dataLayer']->hideAnnouncement($id);
        $this->_f3->reroute('/announcements');
    }

    public function recoverAnnouncement($id)
    {
        //send post data to the model
        $GLOBALS['dataLayer']->returnAnnouncement($id);
        $this->_f3->reroute('/announcements');
    }



    function edit($id)
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

            //Set the title of the page to "Edit Job Post".
            $this->_f3->set('title', "Edit Job Post");

            $jobEdit = $GLOBALS['dataLayer']->getJobById($id);
            $this->_f3->set('jobEdit', $jobEdit);

            //Check if the form has been submitted via a POST Request.
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Retrieves form data for new job entry.
                $title = $_REQUEST['title'];
                $status = $_REQUEST['status'];
                $company = $_REQUEST['company'];
                //Categories might be an array, so we implode it to a string seperated by commas.
                $category = $_REQUEST['category'];
                $category = implode(", ", $category);
                $location = $_REQUEST['location'];
                $expiration = $_REQUEST['expiration'];
                //Checkboxes for job attributes, defaulting to 0 if not set.
                $permanent = isset($_REQUEST['permanent']) ? 1 : 0;
                $internship = isset($_REQUEST['internship']) ? 1 : 0;
                $paid = isset($_REQUEST['paid']) ? 1 : 0;
                $url = $_REQUEST['url'];
                $visibility = 1;

                //Creates a new job object with the form data.
                $jobEdit = new job($title, $status, $company, $category, $location,
                    $expiration, $permanent, $internship, $paid, $url, $visibility);

                // Add the new job to the database using the data layer.
                $GLOBALS['dataLayer']->updateJob($jobEdit, $id);
                $this->_f3->reroute('/');
            }
            // Retrieves categories from the data layer for selection within the form options.
            $categories = $GLOBALS['dataLayer']->getCategories();
            $this->_f3->set('categories', $categories);

            // Retrieve other data needed for the form.
            $others = $GLOBALS['dataLayer']->getOthers();
            $this->_f3->set('others', $others);

            //Creates new template object and renders the view/dataEntry page.
            $view = new Template();
            echo $view->render('views/jobEdit.html');
        } else {
            $this->_f3->reroute('/');
        }
    }

}