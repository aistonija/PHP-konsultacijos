<?php

/**
 * Checks if field value is not empty
 *
 * @param $field_value
 * @return bool
 */
function validate_field_not_empty($field_value): bool
{
    if ($field_value == '') {
        return false;
    }

    return true;
}

/**
 * Checks if field value doesn't exceed the amount of symbols
 *
 * @param $field_value
 * @param $max_symbols
 * @return bool
 */
function validate_max_symbols($field_value, $max_symbols): bool
{
    if (strlen($field_value) > $max_symbols) {
        return false;
    }

    return true;
}


/**
 * Checks if field value has enough symbols
 *
 * @param $field_value
 * @param $min_symbols
 * @return bool
 */
function validate_min_symbols($field_value, $min_symbols): bool
{
    if (strlen($field_value) < $min_symbols) {
        return false;
    }

    return true;
}
