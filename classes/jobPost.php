<?php

namespace classes;

class jobPost {

    private $title;
    private $status;
    private $company;
    private $category;
    private $date;
    private $location;
    private $expiration;
    private $permanent;
    private $internship;
    private $paid;

    /**
     * @param string $title The title of the job post.
     * @param bool $status The current status of the job post.
     * @param string $company The company that offered the job posting.
     * @param string $category The category of the job post.
     * @param int $date The date the job was posted.
     * @param string $location The job's location.
     * @param string $expiration The expiration date of the job post.
     * @param bool $permanent If the job post is a permanent position.
     * @param bool $internship If the job post is an internship.
     * @param bool $paid If the job is paid or not.
     */
    public function __construct($title, $status, $company, $category, $date, $location, $expiration, $permanent, $internship, $paid)
    {
        $this->title = $title;
        $this->status = $status;
        $this->company = $company;
        $this->category = $category;
        $this->date = $date;
        $this->location = $location;
        $this->expiration = $expiration;
        $this->permanent = $permanent;
        $this->internship = $internship;
        $this->paid = $paid;
    }

    /**
     * Gets the title of the job post.
     * @return string The title of the job post.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title of the job post.
     * @param string $title The title of the job post.
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets the status of the job posting, true if the job is active, false otherwise.
     * @return bool The status of the job post.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status of the job posting, true if the job is active, false otherwise.
     * @param bool $status Sets the status of the job post.
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Gets the company that is offering the job posting.
     * @return string The company that is offering the job post.
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the company that is offering the job posting.
     * @param string $company The company that is offering the job post.
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Gets the category of the job posting.
     * @return string The category of the job post.
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category of the job posting.
     * @param string $category The category of the job post.
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Gets the date of the job posting
     * @return int The date of the job posting
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date of the job posting
     * @param int $date The date of the job posting.
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Gets the location of the job posting.
     * @return string The location of the job post.
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location of the job posting.
     * @param string $location The location of the job post.
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Gets the expiration date of the job posting.
     * @return string The expiration date of the job post.
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Sets the expiration date of the job posting.
     * @param string $expiration The expiration date of the job post.
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * Gets the permanent status of the job posting (e.g. Is it a permanent job or not).
     * @return bool The type status of the job post (e.g. Is it a permanent job or not).
     */
    public function getPermanent()
    {
        return $this->permanent;
    }

    /**
     * Sets the permanent status of the job posting (e.g. True if permanent job, false otherwise).
     * @param bool $permanent The type status of the job post.
     */
    public function setPermanent($permanent)
    {
        $this->permanent = $permanent;
    }

    /**
     * Gets the internship status of the job posting (e.g. Is it an internship job or not).
     * @return bool The internship status of the job post.
     */
    public function getInternship()
    {
        return $this->internship;
    }

    /**
     * Sets the internship status, true if the job posting is an internship, false otherwise.
     * @param bool $internship The internship status of the job post.
     */
    public function setInternship($internship)
    {
        $this->internship = $internship;
    }

    /**
     * Gets the pay status of the job posting, true if paid position, false otherwise.
     * @return bool The pay status of the job post.
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Sets the pay status of the job posting, true if paid position, false otherwise.
     * @param bool $paid The pay status of the job post.
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }


}