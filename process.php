<?php

require_once 'functions.php';
require_once 'users.php';

$message = '';
$message_class = '';

if (isset($_POST['login'])) {
    $pass1 = $_POST['password'];
    $pass2 = $_POST['password2'];

    $pass_valid = pass_match($pass1, $pass2);
    if ($pass_valid) {
        $message = 'Slaptažodžiai sutapo, sveikiname užsiregistravus';
        $message_class = 'message';
    } else {
        $message = 'Slaptažodžiai NESUTAMPA';
        $message_class = 'error';
    }

}
