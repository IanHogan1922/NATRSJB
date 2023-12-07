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
     * @param $title
     * @param $status
     * @param $company
     * @param $category
     * @param $date
     * @param $location
     * @param $expiration
     * @param $permanent
     * @param $internship
     * @param $paid
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
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param mixed $expiration
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;
    }

    /**
     * @return mixed
     */
    public function getPermanent()
    {
        return $this->permanent;
    }

    /**
     * @param mixed $permanent
     */
    public function setPermanent($permanent)
    {
        $this->permanent = $permanent;
    }

    /**
     * @return mixed
     */
    public function getInternship()
    {
        return $this->internship;
    }

    /**
     * @param mixed $internship
     */
    public function setInternship($internship)
    {
        $this->internship = $internship;
    }

    /**
     * @return mixed
     */
    public function getPaid()
    {
        return $this->paid;
    }

    /**
     * @param mixed $paid
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;
    }


}