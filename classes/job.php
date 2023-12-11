<?php

namespace classes;

//Start of class
class job {

    //Fields
    private $title;
    private $status;
    private $company;
    private $category;
    private $location;
    private $expiration;
    private $permanent;
    private $internship;
    private $paid;
    private $url;
    private $visibility;



    /**
     * Constructs a job object instance based on the job title, status,company, category, location, expiration,
     * permanent, internship and paid.
     * @param string $title The title of the job.
     * @param bool $status The current status of the job.
     * @param string $company The company that the job is being offered from.
     * @param string $category The category of the job.
     * @param string $location The job's location.
     * @param string $expiration  The expiration date of the job.
     * @param bool $permanent If the job is a permanent position.
     * @param bool $internship  If the job is an internship.
     * @param bool $paid If the job is paid or not.
     */
    //Constructor
    public function __construct($title, $status, $company, $category, $location, $expiration, $permanent, $internship, $paid, $url, $visibility)
    {
        $this->title = $title;
        $this->status = $status;
        $this->company = $company;
        $this->category = $category;
        $this->location = $location;
        $this->expiration = $expiration;
        $this->permanent = $permanent;
        $this->internship = $internship;
        $this->paid = $paid;
        $this->url = $url;
        $this->visibility = $visibility;
    }
    //Getters and Setters
    /**
     * Gets the title of the job.
     * @return string The title of the job.
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title of the job.
     * @param string $title The title of the job.
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets the status of the job, true if the job is active, false otherwise.
     * @return bool The status of the job.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status of the job, true if the job is active, false otherwise.
     * @param bool $status Sets the status of the job.
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Gets the company that is offering the job.
     * @return string The company that is offering the job.
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Sets the company that is offering the job.
     * @param string $company The company that is offering the job.
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Gets the category of the job.
     * @return string The category of the job.
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the category of the job.
     * @param string $category The category of the job.
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * Gets the location of the job.
     * @return string The location of the job.
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location of the job.
     * @param string $location The location of the job.
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * Gets the expiration date of the job.
     * @return string The expiration date of the job.
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Sets the expiration date of the job.
     * @param string $expiration The expiration date of the job.
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * Gets the permanent status of the job (e.g. Is it a permanent job or not).
     * @return bool The type status of the job (e.g. Is it a permanent job or not).
     */
    public function getPermanent()
    {
        return $this->permanent;
    }

    /**
     * Sets the permanent status of the job (e.g. True if permanent job, false otherwise).
     * @param bool $permanent The type status of the job.
     */
    public function setPermanent($permanent)
    {
        $this->permanent = $permanent;
    }

    /**
     * Gets the internship status of the job (e.g. Is it an internship job or not).
     * @return bool The internship status of the job.
     */
    public function getInternship()
    {
        return $this->internship;
    }

    /**
     * Sets the internship status, true if the job is an internship, false otherwise.
     * @param bool $internship The internship status of the job.
     */
    public function setInternship($internship)
    {
        $this->internship = $internship;
    }

    /**
     * Gets the pay status of the job, true if paid position, false otherwise.
     * @return bool The pay status of the job.
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * Sets the pay status of the job, true if paid position, false otherwise.
     * @param bool $paid The pay status of the job.
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }

    /**
     * Gets the URL location of the original job posting.
     * @return string The URL location of the original job posting.
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Sets the URL location of the original job posting.
     * @param string $url The URL location of the original job posting.
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * Gets the visibility status of the job.
     * @return bool The visibility status of the job.
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Sets the visibility status of the job, true if visible, false otherwise.
     * @param bool $visibility The visibilty status of the job.
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }
}
//End of class