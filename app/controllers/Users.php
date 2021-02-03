<?php
/*  
 * Users class 
 * Register user 
 * Login user
 * Control Uses behavior and access
*/
class Users extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function register()
    {
        // echo 'Register in progress';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // form process in progress

            // sanitize Post Array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // create data 
            $data = [
                'nickname'      => trim($_POST['nickname']),
                'password'  => trim($_POST['password']),
                'confirmPassword' => trim($_POST['confirmPassword']),
                'nicknameErr'      => '',
                'passwordErr'  => '',
                'confirmPasswordErr' => '',
            ];

            // Validate Name 
            if (empty($data['nickname'])) {
                // empty field
                $data['nicknameErr'] = "Please enter Your Nickname";
            } elseif (!validate_nickname_has_digit($data['nickname'])) {
                $data['nicknameErr'] = "Nickname must include at least 1 digit!";
            } else {
                // Check if user does not exist
                if ($this->userModel->findUserByNickname($data['nickname'])) {
                    $data['nicknameErr'] = 'User with nickname "' . $data['nickname'] . '" already exists';
                }
            }

            // Validate Password 
            if (empty($data['password'])) {
                // empty field
                $data['passwordErr'] = "Please enter a password";
            } elseif (!validate_pass_length($data['password'], 4)) {
                $data['passwordErr'] = "Password must be 4 or more characters";
            }

            // Validate confirmPassword 
            if (empty($data['confirmPassword'])) {
                // empty field
                $data['confirmPasswordErr'] = "Please repeat password";
            } else {
                if ($data['confirmPassword'] !== $data['password']) {
                    $data['confirmPasswordErr'] = "Passwords do not match";
                }
            }

            // if there is no erros
            if (empty($data['nicknameErr']) && empty($data['passwordErr']) && empty($data['confirmPasswordErr'])) {
                // there are no errors; 
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                // Call the model function - register user
                if ($this->userModel->register($data)) {
                    redirect('users/login');
                }
            } else {
                // load view with errors 
                $this->view('users/register', $data);
            }
        } else {
            // load form
            // echo 'load form';

            // create data 
            $data = [
                'nickname'      => '',
                'password'  => '',
                'confirmPassword' => '',
                'nickname'      => '',
                'passwordErr'  => '',
                'confirmPasswordErr' => '',
            ];

            // load view
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
                'nickname' => trim($_POST['nickname']),
                'password' => trim($_POST['password']),
                'nicknameErr' => '',
                'passwordErr' => '',
            ];

            // Validate Email
            if (empty($data['nickname'])) {
                $data['nicknameErr'] = 'Please Enter Nickname';
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['passwordErr'] = 'Please Enter Password';
            }

            // Check for user email in database
            if (!$this->userModel->findUserByNickname($data['nickname'])) {
                $data['nicknameErr'] = 'User ' . $data['nickname'] . ' not found';
            }

            // Make sure errors are empty
            if (empty($data['nicknameErr']) && empty($data['passwordErr'])) {
                // Validated

                // Check and set logged in user
                $loggedInUser = $this->userModel->login($data['nickname'], $data['password']);

                if ($loggedInUser) {
                    // Create Session variables
                    $this->createUserSession($loggedInUser);
                } else {
                    $data['passwordErr'] = 'Password incorrect';
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
                'nickname' => '',
                'password' => '',
                'nicknameErr' => '',
                'passwordErr' => '',
            ];

            // Load View
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nickname'] = $user['nickname'];
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