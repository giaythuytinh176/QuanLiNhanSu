<?php

namespace Models;

class Employee
{
    private $fname;
    private $lname;
    private $birthday;
    private $address;
    private $position;

    public function __construct($fname, $lname, $birthday, $address, $position)
    {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->position = $position;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }


}