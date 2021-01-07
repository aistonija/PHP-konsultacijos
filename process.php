<?php

require_once 'functions.php';
require_once 'users.php';

$message = '';
$message_class = '';

$temporary_users = [];

if (!empty($_POST)) {
    $temporary_users['email'] = $_POST['email'];
    $temporary_users['password'] = $_POST['password'];
}

if (isset($_POST['login'])) {
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password2'];

    $pass_valid = pass_match($pass1, $pass2);

    if ($pass_valid) {
        $user_registered = user_exists($users, $temporary_users, $_POST['email']);

        if ($user_registered) {
            $message = 'Sveikiname užsiregistravus!';
            $message_class = 'message';

        } else {
            $message = 'Vartotojas ' . $_POST['email'] . ' jau egzistuoja!';
            $message_class = 'error';
        }

    } else {
        $message = 'Slaptažodžiai NESUTAMPA';
        $message_class = 'error';
    }

}

var_dump($users);
