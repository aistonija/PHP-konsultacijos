<?php

class Player
{
    private $name;
    private $surname;
    private $height;
    private $position;
    private $shirt_number;

    public function __construct($name, $surname, $height, $position, $shirt_number)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->height = $height;
        $this->position = $position;
        $this->shirt_number = $shirt_number;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getShirt()
    {
        return $this->shirt_number;
    }
}