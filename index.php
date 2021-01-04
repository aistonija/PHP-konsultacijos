<?php

$two_digit_number = rand(11, 99);

function larger_swap($num)
{
    $reversed_num = intval(strrev(strval($num)));

    return $reversed_num > $num || $reversed_num === $num;

}


var_dump($two_digit_number);

var_dump(intval(strrev(strval($two_digit_number))));

var_dump(larger_swap($two_digit_number));