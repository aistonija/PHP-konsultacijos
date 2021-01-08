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
    $is_new_user = user_exists($users, $temporary_users, $_POST['email']);

    if (!$is_new_user) {
        $message = 'Vartotojas ' . $_POST['email'] . ' jau egzistuoja!';
        $message_class = 'error';

    } elseif (!$pass_valid) {
        $message = 'Slaptažodžiai NESUTAMPA';
        $message_class = 'error';

    } else {
        $message = 'Sveikiname užsiregistravus!';
        $message_class = 'message';
    }

}

var_dump($users);