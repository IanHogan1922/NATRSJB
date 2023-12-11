<?php

namespace classes;

//Start of Class
class announcement
{
    //fields
    private $title;
    private $description;
    private $visibility;

    /**
     * Constructs an announcement object instance based on the job title, description, and visibility.
     * @param string $title The title of the job announcement
     * @param string $description A description of the job announcement.
     * @param bool $visibility The visibility status of the Job Announcement.  (e.g. admin-level or user-level).
     */
    //Constructor
    public function __construct($title, $description, $visibility)
    {
        $this->title = $title;
        $this->description = $description;
        $this->visibility = $visibility;
    }
    //Getters and Setters
    /**
     * Gets the title of the job posting announcement.
     * @return string The title of the job posting announcement.
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * Sets the title of the job posting announcement.
     * @param string $title Sets the title of the job posting announcement.
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Gets the description of the job posting announcement.
     * @return string The description of the job posting announcement.
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description of the job posting announcement.
     * @param string $description Sets the description of the job posting announcement.
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Gets the visibility status of the Job Announcement.  (e.g. admin-level or user-level).
     * @return bool The visibility status of the Job Announcement (e.g. admin-level or user-level
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Sets the visibility status of the Job Announcement.
     * @param bool $visibility Sets the visibility status of the Job Announcement.
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }
}
//End of class