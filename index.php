<?php

//1.
$hurdle_heights = [rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10), rand(1, 10)];

//2.

function generate_hurdles($hurdle_count, $start, $finish)
{
    $array = [];

    for ($x = 0; $x < $hurdle_count; $x++) {
        $diapason = rand($start, $finish);
        $array[$x] = $diapason;
    }

    return $array;
}

$hurdles = generate_hurdles(5, 1, 10);


$jump_height = rand(5, 12);


function hurdle_jump($array, $number)
{

    foreach ($array as $hurdle) {
        if ($hurdle > $number) {
            return false;
        }
    }

    return true;
}


var_dump($hurdles);
var_dump($jump_height);
var_dump(hurdle_jump($hurdles, $jump_height));


