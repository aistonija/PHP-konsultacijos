<?php

/**
 * Validates if field is not empty
 */
function validate_field_not_empty($input_value)
{
    return $input_value !== '';
}

/**
 * Validates if field doesn't contain any special characters
 */
function validate_no_special_symbols($input_value)
{
    return preg_match("/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u", $input_value);
}


/**
 * Validates length of a string
 */
function validate_pass_length($input_value, $length)
{
    if (strlen($input_value) < $length) {
        return false;
    }

    return true;
}

/**
 * 
 */
function validate_empty_array($array)
{
    foreach ($array as $value) {
        if (!empty($value)) {
            return false;
        }
    }

    return true;
}