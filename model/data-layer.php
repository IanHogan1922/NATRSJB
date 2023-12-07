<?php


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

        //1. Define the query (test first!)
        $sql = "SELECT * FROM announcements WHERE visibility != '0'";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getJobs() {

        //1. Define the query (test first!)
        $sql = "SELECT * FROM jobboard2 WHERE visibility != 0";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters

        //4. Execute
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}