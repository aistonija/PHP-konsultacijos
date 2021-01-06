<?php

$numbers_array = [838, 121, 344, 557, 768, 878, 987, 345, 565];


function palindromes_only(&$array)
{
    foreach ($array as $key => $number) {
        if (strval($number) !== strrev(strval($number))) {
            array_splice($array, $key, 1);
        }
    }
    unset($number);
}


var_dump($numbers_array);

palindromes_only($numbers_array);

var_dump($numbers_array);
