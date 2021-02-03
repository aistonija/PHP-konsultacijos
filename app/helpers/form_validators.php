<?php

function validate_nickname_has_digit($input_value)
{
    $array = str_split($input_value);

    foreach ($array as $character) {
        if (is_numeric($character)) {
            return true;
        }
    }

    return false;
}

function validate_pass_length($input_value, $length)
{
    if (strlen($input_value) < $length) {
        return false;
    }

    return true;
}