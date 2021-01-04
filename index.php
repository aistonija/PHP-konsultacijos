<?php

function generate_array($counter, $start, $finish)
{
    $array = [];

    for ($x = 0; $x < $counter; $x++) {
        $rand_num = rand($start, $finish);

        $array[$x] = $rand_num;
    }

    return $array;
}

$numbers = generate_array(6, 1, 3000);


function eliminate_odd_numbers(&$array)
{
    foreach ($array as $key => &$number) {
        if ($number % 2 === 1) {
            array_splice($array, $key, 1);
        }
    }
}


var_dump($numbers);

eliminate_odd_numbers($numbers);

var_dump($numbers);
