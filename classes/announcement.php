<?php

namespace classes;

class announcement
{

    private $title;
    private $description;
    private $visibility;

    /**
     * @param $title
     * @param $description
     * @param $visibility
     */
    public function __construct($title, $description, $visibility)
    {
        $this->title = $title;
        $this->description = $description;
        $this->visibility = $visibility;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param mixed $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }



}