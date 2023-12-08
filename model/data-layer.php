<?php
    session_start();

/*  NATRSLB/model/data-layer.php

    DROP TABLE orders;
    CREATE TABLE orders (
        order_id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        food VARCHAR(50) NOT NULL,
        meal VARCHAR(20) NOT NULL,
        condiments VARCHAR(100),
        date_time DATETIME DEFAULT NOW()
    );
    INSERT INTO orders (food, meal, condiments)
    VALUES ('burrito', 'breakfast', 'salsa'),
           ('pad thai', 'dinner', NULL),
           ('tacos', 'lunch', 'pork, salsa, guac, sour cream')

     * PDO - Using Prepared Statements
        1. Define the query (test first!)
            $sql = “…”;
        2. Prepare the statement
            $statement = $dbh->prepare($sql);
        3. Bind the parameters
            $statement->bindParam(param_name, value, type);
        4. Execute
            $statement->execute();
        5. Process the result, if there is one
*/

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
            $_SESSION['token'] = $result[0]['token'];
            return true;
        }
        return false;
    }

    function getCategories() {
        $categories = array("GIS", "Forestry", "Water Quality", "Park Management", "Restoration", "Conservation", "Fish and Wildlife", "Wildland Fire", "Botany", "Interpretation", "Technology");
        return $categories;
    }

}