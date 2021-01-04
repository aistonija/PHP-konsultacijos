<?php

$array = [80, 29, 4, -95, -24, 85, 1, 2, 10, 50, 5];

function sort_regular(&$array)
{
    sort($array);
}


var_dump($array);

sort_regular($array);

var_dump($array);