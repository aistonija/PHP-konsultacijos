<?php

include '../classes/dbh.class.php';
include '../classes/validation.class.php';
include '../classes/Validator.php';

function validateValidators($validators_array, $sanitized_values, &$result)
{
    foreach ($validators_array as $key => $validators) {
        foreach ($validators as $validator) {
            if (!$validator->validate($sanitized_values[$key])) {
                $result['status'] = 'FAIL';
                $result['errors'] = [$key => $validator->getErrorText()];
                return false;
            }
        }
    }

    return true;
}

// noriu, kad movie_year butu pravaliduotas skaicius
$validators_array = [
    'movie_year' => [
        new YearValidator(2000, 3000)
    ],
    'movie_title' => [
        new MaxSymbolsValidator(100),
    ]
];

$result = [
    'status' => 'OK',
];

$validation = new Validation();

if ($validation->RequestMethod('POST')) {
    $response = [];

    $sanitized_values = [];
    foreach ($_POST as $key => $input) {
        $sanitized_values[$key] = $validation->sanitizeValue($key);
    }

    if ($validation->getErrors()) {
        $result['status'] = 'FAIL';
        $result['errors'] = $validation->getErrors();
    } else {
        if (validateValidators($validators_array, $sanitized_values, $result)) {
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
}

echo json_encode($result);