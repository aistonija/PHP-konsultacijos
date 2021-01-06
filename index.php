<?php

$string = 'labas rytas lietuva';
var_dump($string);


function alternatingCaps(&$string)
{
    # pasiverciu stringa i masyva
    $array = str_split($string);
    var_dump($array);
    $count = 0;

    foreach ($array as &$char) {
        if ($count % 2 == 0 && $char != ' ') {
            $char = strtoupper($char);
            $count++;
        } elseif ($char != ' ') {
            $char = strtolower($char);
            $count++;
        }
    }

    $string = implode($array);
}


alternatingCaps($string);
var_dump($string);
