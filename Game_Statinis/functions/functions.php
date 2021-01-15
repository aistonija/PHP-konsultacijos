<?php

/**
 * returns random value from array
 */
function rand_array_value($array)
{
    return $array[rand(0, count($array) - 1)];
}

/**
 * Returns generated and beautified team name
 */
function generate_team_name()
{
    return
        ucfirst(rand_array_value(TEAM_ADJECTIVES)) . ' ' . ucfirst(rand_array_value(TEAM_NOUNS));
}

/**
 * Returns generated and beautified coach name
 */
function generate_coach_name()
{
    return ucfirst(rand_array_value(NAMES)) . ' ' . ucfirst(rand_array_value(SURNAMES));
}



/**
 * Picks random number from 1 to 120 and picks the picture
 */
function assign_logo()
{
    return 'assets/logos/img-' . rand(1, 120) . '.svg';
}

function generate_score()
{
    return rand(50, 150);
}