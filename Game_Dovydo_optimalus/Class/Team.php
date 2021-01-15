<?php

class Team
{
    protected $coach;
    protected $teamName;
    protected $teamLogo;
    protected $players = [];

    public function __construct()
    {
        $this->coach = NAMES[array_rand(NAMES)] . ' ' . SURNAMES[array_rand(SURNAMES)];
        $this->teamName = ucfirst(TEAM_ADJECTIVES[array_rand(TEAM_ADJECTIVES)]) . ' ' . ucfirst(TEAM_NOUNS[array_rand(TEAM_NOUNS)]);

        $random_logo = rand(0, 120);
        $this->teamLogo = "./assets/logos/img-$random_logo.svg";

        $players_counter = rand(5, 6);
        for ($x = 0; $x < $players_counter; $x++) {
            $this->players[] = new Player();
        }
    }

    public function getCoachName()
    {
        return $this->coach;
    }

    public function getTeamName()
    {
        return $this->teamName;
    }

    public function getTeamLogo()
    {
        return $this->teamLogo;
    }

    public function getPlayersArray()
    {
        return $this->players;
    }
}