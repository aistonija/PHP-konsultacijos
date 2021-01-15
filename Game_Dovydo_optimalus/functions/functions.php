<?php

/**
 * Generates random date inbetween
 */
function generate_rand_date($start, $end)
{
    $min = strtotime($start);
    $max = strtotime($end);
    $value = mt_rand($min, $max);

    return date('Y-m-d', $value);
}

/**
 * Generates time between 18:30 - 22:30
 */
function generate_time()
{
    $hours = mt_rand(18, 22);
    $minutes = mt_rand(0, 1);

    if ($minutes === 0) {
        $minutes = '00';
    } else {
        $minutes *= 30;
    }

    return "$hours:$minutes";
}