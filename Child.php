<?php

require_once 'Kid.php';


class Child extends Kid
{
    private $age;

    public function __construct($name, $gender, $age)
    {
        parent::__construct($name, $gender);
        $this->age = $age;
    }


    public function getName()
    {
        return $this->name;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function whichGrade()
    {
        $result = '';

        if ($this->getAge() < 7) {
            $result = 'Pre-School';
        } elseif ($this->getAge() >= 7 && $this->getAge() <= 10) {
            $result = 'Primary-School';
        } elseif ($this->getAge() > 10 && $this->getAge() <= 16) {
            $result = 'Secondary-School';
        } elseif ($this->getAge() > 16 && $this->getAge() <= 18) {
            $result = 'High-School';
        } elseif ($this->getAge() > 18) {
            $result = 'School is finished!';
        }

        return $result;
    }

    // helper function
    public function objectToArray()
    {
        $array = [];
        $array['name'] = $this->name;
        $array['gender'] = $this->gender;
        $array['age'] = $this->age;
        $array['school'] = $this->whichGrade();

        return $array;
    }
}