<?php
    session_start();

//echo $_SERVER['DOCUMENT_ROOT'];
require_once($_SERVER['DOCUMENT_ROOT'] . '/../pdo-config.php');
//include('views/server.php');

class DataLayer
{
    /**
     * @var PDO The database connection object
     */
    private $_dbh;

    /**
     * DataLayer constructor
     */
    function __construct()
    {
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'Connected to database!!';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function getAnnouncements() {

        // Define the query (test first!)
        $sql = "SELECT * FROM announcements WHERE visibility != 0";

        // Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // Bind the parameters

        // Execute
        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getJobs() {

        $sql = "UPDATE jobboard2 SET visibility = '0' WHERE expiration < CURDATE()";
        $statement = $this->_dbh->prepare($sql);
        $statement->execute();

        // Define the query (test first!)
        $sql = "SELECT * FROM jobboard2 WHERE visibility != 0";

        // Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // Bind the parameters

        // Execute
        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function addAnnouncement($announcement) {

        // Define the query
        $sql = "INSERT INTO announcements(title, description, date, visibility)
            VALUES (:title, :description, CURRENT_TIMESTAMP, :visibility)";

        // Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        $title = $announcement->getTitle();
        $description = $announcement->getDescription();
        $visibility = $announcement->getVisibility();

        $statement->bindParam(':title', $title);
        $statement->bindParam(':description', $description);
        $statement->bindParam(':visibility', $visibility);

        // Execute
        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return the result
        if ($result) {
            echo "Fail";
        } else {
            echo "Success!";
        }

    }

    function addJob($job) {

        // Define the query
        $sql = "INSERT INTO jobboard2 (
                        job_title, status, company_name, category, location, post_date,
                        expiration, permanent, internship, paid, url_link, visibility) 
                VALUES (
                        :title, :status, :company, :category, :location, CURRENT_TIMESTAMP, 
                        :expiration, :permanent, :internship, :paid, :url, :visibility)";

        // Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // Bind the parameters
        $title = $job->getTitle();
        $status = $job->getStatus();
        $company = $job->getCompany();
        $category = $job->getCategory();
        $location = $job->getLocation();
        $expiration = $job->getExpiration();
        $permanent = $job->getPermanent();
        $internship = $job->getInternship();
        $paid = $job->getPaid();
        $url = $job->getUrl();
        $visibility = $job->getVisibility();

        $statement->bindParam(':title', $title);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':company', $company);
        $statement->bindParam(':category', $category);
        $statement->bindParam(':location', $location);
        $statement->bindParam(':expiration', $expiration);
        $statement->bindParam(':permanent', $permanent);
        $statement->bindParam(':internship', $internship);
        $statement->bindParam(':paid', $paid);
        $statement->bindParam(':url', $url);
        $statement->bindParam(':visibility', $visibility);

        // Execute
        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return the result
        if ($result) {
            echo "Fail";
        }
    }

    function hideJobs($jobNumbers) {
        foreach ($jobNumbers as $jobNumber) {
            $sql = "UPDATE jobboard2 SET visibility = 0 WHERE job_number = :job_number";
            $statement = $this->_dbh->prepare($sql);
            $statement->bindParam(':job_number', $jobNumber, PDO::PARAM_INT);
            $result = $statement->execute();
        }

        return $result;
    }

    function hideAnnouncement($announcementNumber) {

        $sql = "UPDATE announcements SET visibility = 0 WHERE announcement_number = :announcement_number";
        $statement = $this->_dbh->prepare($sql);
        $statement->bindParam(':announcement_number', $announcementNumber, PDO::PARAM_INT);
        $result = $statement->execute();


        return $result;
    }

    function getJobById($id)
    {

        $sql = "SELECT * FROM jobboard2 WHERE job_number=:id";

        $statement = $this->_dbh->prepare($sql);

        $statement->bindValue(':id', $id);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    function updateJob($jobEdit, $id) {
        $statement = 'UPDATE jobboard2 SET job_title=:title, status=:status, company_name=:company, 
                     category=:category, location=:location, expiration=:expiration, 
                     permanent=:permanent, internship=:internship, paid=:paid, 
                     url_link=:url WHERE job_number=:id';

        $statement = $this->_dbh->prepare($statement);

        // Bind the parameters
        $title = $jobEdit->getTitle();
        $status = $jobEdit->getStatus();
        $company = $jobEdit->getCompany();
        $category = $jobEdit->getCategory();
        $location = $jobEdit->getLocation();
        $expiration = $jobEdit->getExpiration();
        $permanent = $jobEdit->getPermanent();
        $internship = $jobEdit->getInternship();
        $paid = $jobEdit->getPaid();
        $url = $jobEdit->getUrl();

        $statement->bindParam(':title', $title);
        $statement->bindParam(':status', $status);
        $statement->bindParam(':company', $company);
        $statement->bindParam(':category', $category);
        $statement->bindParam(':location', $location);
        $statement->bindParam(':expiration', $expiration);
        $statement->bindParam(':permanent', $permanent);
        $statement->bindParam(':internship', $internship);
        $statement->bindParam(':paid', $paid);
        $statement->bindParam(':url', $url);
        $statement->bindParam(':id', $id);

        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return the result
        if ($result) {
            echo "Fail";
        }
    }

    function signIn($email, $password) {
        // Get the account from the database
        $sql = "SELECT * FROM admin WHERE email = :email AND password = :password";

        // Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // Bind the parameters
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);

        // Execute
        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return the result
        if ($result) {
            $_SESSION['admin'] = true;
            //echo $result[0]['token'];
            return true;
        }
        return false;
    }

    function getCategories() {
        $categories = array("GIS", "Forestry", "Water Quality", "Park Management", "Restoration", "Conservation", "Fish and Wildlife", "Wildland Fire", "Botany", "Interpretation", "Technology");
        return $categories;
    }

    function getOthers() {
        $others = array("Permanent", "Internship", "Paid");
        return $others;
    }

    function userInfo()
    {
        // Check if logged in
        if (!isset($_SESSION['token'])) {
            return false;
        }

        // Get the account from the database
        $sql = "SELECT * FROM admin WHERE token = :token";

        // Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        // Bind the parameters
        $statement->bindParam(':token', $_SESSION['token'], PDO::PARAM_STR);

        // Execute
        $statement->execute();

        // Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        // Return the result
        if ($result) {
            return $result[0];
        }

        return false;
    }

    function isAdmin() {

        return isset($_SESSION['admin']) ? $_SESSION['admin'] : false;
    }

}