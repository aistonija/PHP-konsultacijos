<?php

/**
 * Check if passwords match
 *
 * @param $pass1
 * @param $pass2
 * @return bool
 */
function pass_match($pass1, $pass2)
{
    return $pass1 === $pass2;
}

/**
 * Check if user exists in array, and add new one in case of false
 *
 * @param $users_array
 * @param $temporary_array
 * @param $email
 * @return bool
 */
function user_exists(&$users_array, $temporary_array, $email)
{
    foreach ($users_array as $user) {
        if ($user['email'] === $email) {
            return false;
        }
    }

    $users_array[] = $temporary_array;

    return true;
}