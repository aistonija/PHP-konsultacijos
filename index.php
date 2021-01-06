<?php

# 7. Sorting Integer Descending (using reference)

$high_num = rand(100000, 100000000);

function sortDescending(&$number)
{
    $array = str_split($number);
    rsort($array);
    $number = intval(implode($array));
}

var_dump($high_num);
sortDescending($high_num);
var_dump($high_num);
