<?php

/**
 * Validates if field value is numeric
 */
function validate_numeric_value($input_value)
{
    return is_numeric($input_value);
}

/**
 * Validates if coordinates are within container 
 * returns error message in case of false
 */
function validate_coordinates_within_container_error($post_array)
{
    $pixel_x = intval($post_array['pixel_x']);
    $pixel_y = intval($post_array['pixel_y']);
    $pixel_size = intval($post_array['size']);

    $message = '';

    if (($pixel_x + $pixel_size) > 500) {
        $message = 'Coordinate X must stay within container';
    }

    if (($pixel_y + $pixel_size) > 500) {
        $message = 'Coordinate Y must stay within container';
    }

    return $message;
}

/**
 * Validates if coordinates are not taken
 */
function validate_pixel_coordinates($post_array, $allPixels, $currentPixel = null)
{
    $input_pixel_x = intval($post_array['pixel_x']);
    $input_pixel_y = intval($post_array['pixel_y']);
    $input_pixel_size = intval($post_array['size']);

    foreach ($allPixels as $pixel) {
        if ($pixel['pixel_id'] !== $currentPixel) {
            $db_pixel_x = $pixel['pixel_x'];
            $db_pixel_y = $pixel['pixel_y'];
            $db_pixel_size = $pixel['size'];

            if (
                ($input_pixel_x + $input_pixel_size > $db_pixel_x && $input_pixel_x < $db_pixel_x + $db_pixel_size)
                &&
                ($input_pixel_y + $input_pixel_size > $db_pixel_y && $input_pixel_y < $db_pixel_y + $db_pixel_size)
            ) {
                return false;
            }
        } else {
            continue;
        }
    }

    return true;
}