<?php

class Team
{
    private $coach;
    private $team_name;
    private $team_logo;
    private $players;

    public function __construct($coach, $team_name, $players, $team_logo)
    {
        $this->coach = $coach;
        $this->team_name = $team_name;
        $this->players = $players;
        $this->team_logo = $team_logo;
    }

    public function getLogo()
    {
        return $this->team_logo;
    }

    public function getCoach()
    {
        return $this->coach;
    }

    public function getTeamName()
    {
        return $this->team_name;
    }

    public function getPlayers()
    {
        return $this->players;
    }
}