<?php

class GameMatch
{
    private $teams = [];
    private $date;
    private $time;
    private $location;

    public function __construct()
    {
        $this->teams[] =
            [
                'team1' => new Team(),
                'team2' => new Team()
            ];
        $this->location = LOCATIONS[array_rand(LOCATIONS)];
    }

    public function getTeams()
    {
        return $this->teams;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getLocation()
    {
        return $this->location;
    }
}