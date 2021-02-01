<?php

require '../classes/Validation.php';
require '../classes/Database.php';
require '../helpers/form_validators.php';

$validation = new Validation();

$result = [
    'status' => 'Success',
];

if ($validation->requestMethod('POST')) {
    // Process the form

    // Sanitize POST data
    $validation->sanitize($_POST);

    // Init form
    $data = [
        'nickname' => trim($_POST['nickname']),
        'password' => trim($_POST['password']),
        'confirm_password' => trim($_POST['confirm_password']),
    ];

    $errors = [
        'nickname' => '',
        'password' => '',
        'confirm_password' => '',
    ];

    $db = new Database();

    // Validate Nickname not empty
    if (empty($data['nickname'])) {
        $errors['nickname'] = 'Please Enter Nickname';
    } elseif (!validate_nickname_has_digit($data['nickname'])) {
        $errors['nickname'] = 'Nickname must include at least 1 digit!';
    } else {
        // Check if user does not exist
        if ($db->getUser($data['nickname'])) {
            $errors['nickname'] = 'User with nickname "' . $data['nickname'] . '" already exists';
        }
    }

    // Validate Password not empty
    if (empty($data['password'])) {
        $errors['password'] = 'Please Enter Password';
    } elseif (!validate_pass_length($data['password'], 4)) {
        $errors['password'] = 'Password must be at least 4 characters';
    }


    // Validate Confirm Password
    if (empty($data['confirm_password'])) {
        $errors['confirm_password'] = 'Please Confirm Password';
    } elseif ($data['password'] !== $data['confirm_password']) {
        $errors['confirm_password'] = 'Passwords do not match';
    }

    //if at least one error, send it back to front end
    foreach ($errors as $key => $error) {
        if (!empty($error)) {
            $result['status'] = 'Fail';
            $result['errors'][$key] = $error;
        }
    }

    if ($result['status'] === 'Success') {
        $result['data'] = $data;
        // Hash the password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Add User to Database
        $db->createUser($data['nickname'], $data['password']);
    }
}

echo json_encode($result);