<?php

require_once 'functions.php';
require_once 'validators.php';

$show_form = false;
$user_data = [
    'name' => '',
    'email' => '',
    'phone' => '',
    'department' => '',
    'subject' => '',
    'message' => ''
];


if (!empty($_POST)) {

    $errors = [];

    foreach ($_POST as $key => $input_value) {
        # tikrinama ar laukelis nera tuscias
        if (!validate_field_not_empty($input_value)) {

            # jei tuscias idedame error i masyva ir rodome forma su erroru prie to laukelio, kuris tuscias
            $errors[$key] = 'Laukelis turi būti užpildytas';
            $show_form = true;

        } elseif($key === 'email' && !filter_var($input_value, FILTER_VALIDATE_EMAIL)) {
            $errors[$key] = 'Įveskite teisingą el. pašto adresą';
            $show_form = true;
        } elseif ($key === 'message' && !validate_max_symbols($input_value, 10)) {
            $errors[$key] = 'Laukelis negali viršyti daugiau nei 10 simbolių';
            $show_form = true;
        } else {
            if ($key === 'subject') {
                $input_value = get_subject($input_value);
            }

            if ($key === 'department') {
                $input_value = get_department($input_value);
            }
            $user_data[$key] = clean_input($input_value);
            $_SESSION['name'] = $user_data['name'];
        }
    }
} else {
    $show_form = true;
}


