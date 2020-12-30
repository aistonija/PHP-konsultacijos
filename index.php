<?php

$array = [
    'first' => 7,
    'second' => 2,
    'third' => 8,
    'fourth' => 267,
    'fifth' => 5,
    'sixth' => 7
];

var_dump($array);

$every_second = [];

$counter = 0;

foreach ($array as $key => $value) {
    $counter++;

    if ($counter % 2 === 0) {
        $every_second[$key] = $value;
    }
}

var_dump($every_second);
