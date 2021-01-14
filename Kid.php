<?php


abstract class Kid
{
    protected $name;
    protected $gender;

    public function __construct($name, $gender)
    {
        $this->name = $name;
        $this->gender = $gender;
    }

    abstract public function whichGrade();

    // TODO: implement method to find out which grade the child is going in school

    abstract public function objectToArray();
    // TODO: implement method in children class to convert each object to array

}