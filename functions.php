<?php

/**
 * Check if user with provided details ir already in array
 *
 * @param $array
 * @param $email
 * @return bool
 */
function validate_user_email($array, $email): bool
{
    foreach ($array as $user) {
        if ($email === $user['email']) {
            return true;
        }
    }

    return false;
}

/**
 * Check if user with provided details ir already in array
 *
 * @param $array
 * @param $email
 * @param $password
 * @return bool
 */
function validate_user_password($array, $email, $password): bool
{
    foreach ($array as $user) {
        if ($email === $user['email'] && $password === $user['password']) {
            return true;
        }
    }

    return false;
}

/**
 * Check if user is logged in
 */
function is_logged_in()
{
    if (time() > ($_SESSION['time'] + 10)) {
        logout();
    }
}


/**
 * Logout user
 */
function logout()
{
    session_destroy();
    header('Location: index.php');
}