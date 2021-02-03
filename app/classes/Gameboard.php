<?php

class Gameboard
{
    private array $images;

    public function __construct()
    {
        $this->images = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    }

    public function getImages(): array
    {
        return $this->images;
    }

    public function randomizeImages(): void
    {
        foreach ($this->images as &$image) {
            $image = rand(1, 3);
        }
    }

    public function isWiener(): bool
    {
        return $this->images[3] === $this->images[4] && $this->images[3] === $this->images[5];
    }

    public function getLucky($amount, $multiplier): int
    {
        return $amount * $multiplier;
    }
}