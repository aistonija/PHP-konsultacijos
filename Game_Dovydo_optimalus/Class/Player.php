<?php

class Player
{
    protected $name;
    protected $lastname;
    protected $height;
    protected $position;
    protected $number;

    public function __construct()
    {
        $this->name = NAMES[array_rand(NAMES)];
        $this->lastname = SURNAMES[array_rand(SURNAMES)];
        $this->height = rand(177, 230);
        $this->position = POSITION_TYPES[array_rand(POSITION_TYPES)];
        $this->number = rand(1, 100);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function getNumber()
    {
        return $this->number;
    }
}