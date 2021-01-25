<?php

include '../classes/dbh.class.php';
include '../classes/validation.class.php';

$result = [
    'status' => 'OK',
];

$validation = new Validation();

if ($validation->RequestMethod('POST')) {

    $sanitized_values = [];
    foreach ($_POST as $key => $input) {
        $sanitized_values[$key] = $validation->sanitizeValue($key);
    }

    if ($validation->getErrors()) {
        $result['status'] = 'FAIL';
        $result['errors'] = $validation->getErrors();
    } else {
        $db = new Dbh();

        if (isset($sanitized_values['id'])) {
            $db->updateMovie(
                $sanitized_values['id'],
                $sanitized_values['movie_img'],
                $sanitized_values['movie_title'],
                $sanitized_values['movie_year'],
                $sanitized_values['movie_genre']
            );
        } else {
            $db->insertMovie(
                $sanitized_values['movie_img'],
                $sanitized_values['movie_title'],
                $sanitized_values['movie_year'],
                $sanitized_values['movie_genre']
            );
        }
    }
}

echo json_encode($result);