<?php

require_once 'users.php';
require_once('functions.php');

if (!empty($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $message = '';
    $message_class = '';
    if (!validate_user_email($users, $email)) {
        $message = 'Toks el. pašto adresas neegzistuoja';
        $message_class = 'error';
    } elseif (!validate_user_password($users, $email, $password)) {
        $message = 'Įvedėte neteisingą slaptažodį';
        $message_class = 'error';
    } elseif (validate_user_email($users, $email) && validate_user_password($users, $email, $password)) {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['time'] = time();

        header('Location: home.php');
    }
}