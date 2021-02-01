<?php

class Gameboard
{

    private $images;

    public function __construct()
    {
        $this->images = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    }

    public function getImages()
    {
        return $this->images;
    }

    public function randomizeImages()
    {
        foreach ($this->images as &$image) {
            $image = rand(1, 3);
        }
    }

    public function isWinner()
    {
        return $this->images[3] === $this->images[4] && $this->images[3] === $this->images[5];
    }

    public function getLucky($amount, $multiplier)
    {
        return $amount * $multiplier;
    }
}