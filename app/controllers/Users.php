<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {

        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init form
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'first_name_error' => '',
                'last_name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            //Validate First Name
            if (!validate_field_not_empty($data['first_name'])) {
                $data['first_name_error'] = 'Please Enter First Name';
            } elseif (!validate_no_special_symbols($data['first_name'])) {
                $data['first_name_error'] = 'Make sure your name doesn\'t contain any shizznit symbols';
            }

            //Validate Last Name
            if (!validate_field_not_empty($data['last_name'])) {
                $data['last_name_error'] = 'Please Enter Last Name';
            } elseif (!validate_no_special_symbols($data['last_name'])) {
                $data['last_name_error'] = 'Make sure your last name doesn\'t contain any shizznit symbols';
            }

            // Validate Email
            if (!validate_field_not_empty($data['email'])) {
                $data['email_error'] = 'Please Enter Email';
            } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                $data['email_error'] = 'Please Provide Valid Email';
            } else {
                // Check if email exist in db
                if ($this->userModel->findUserByEmail($data['email'])) {
                    $data['email_error'] = 'Email is already registered';
                }
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please Enter Password';
            } elseif (!validate_pass_length($data['password'], 4)) {
                $data['password_error'] = 'Password must be at least 6 characters';
            }

            // Validate Confirm Password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Please Enter Confirm Password';
            } else {
                if ($data['password'] !== $data['confirm_password']) {
                    $data['confirm_password_error'] = 'Passwords do not match';
                }
            }

            // Make sure data errors are empty
            if (empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
                // Validated
                // Hash the password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Call the model function - register user
                if ($this->userModel->register($data)) {
                    redirect('users/login');
                } else {
                    die('SOMETHING WENT WRONG');
                }
            } else {
                // Load view with Erros
                $this->view('users/register', $data);
            }
        } else {
            // Load the form

            // init data
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            // Load View
            $this->view('users/register', $data);
        }
    }

    public function login()
    {

        //Check for POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process the form

            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init form
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please Enter Email';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please Enter Password';
            }

            // Check for user email in database
            if (!$this->userModel->findUserByEmail($data['email'])) {
                $data['email_error'] = 'User ' . $data['email'] . ' not found';
            }

            // Make sure data are empty
            if (empty($data['email_error']) && empty($data['password_error'])) {
                // Validated

                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if ($loggedInUser) {
                    // Create Session variables
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['password_error'] = 'Password incorrect';
                    // Load view with Erros
                    $this->view('users/login', $data);
                }
            } else {
                // Load view with Erros
                $this->view('users/login', $data);
            }
        } else {
            // Load the form

            // init data
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];

            // Load View
            $this->view('users/login', $data);
        }
    }

    public function profile()
    {

        $data = [
            'title' => 'This is going to be profile page'
        ];

        // Load View
        $this->view('users/profile', $data);
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['first_name'];
        redirect('index');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['name']);
        session_destroy();
        redirect('users/login');
    }
}