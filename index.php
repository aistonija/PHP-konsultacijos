<?php

# 8. Sum of Missing Numbers

# 1st example -
$numbers = [1, 3, 5, 7, 10];

# 2nd example -
$numbers2 = [10, 20, 30, 40, 50, 60];

function sumOfMissingNumbers($array)
{
    # 1. reikes maziausio skaiciaus;
    # 2. reikes didziausio skaiciaus;
    # 3. reikes fiksuoti skaicius, kuriu nera masyve;

    $lowest = min($array);
    $highest = max($array);
    $missing_numbers = [];
    $sum = 0;

    for ($x = $lowest; $x < $highest; $x++) {
        if (!in_array($x, $array)) {
            $missing_numbers[$x] = $x;
            $sum += $x;
        }
    }
    var_dump($missing_numbers);
    return $sum;
}

var_dump(sumOfMissingNumbers($numbers2));
