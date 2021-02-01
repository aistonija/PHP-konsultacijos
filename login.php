<?php
require 'bootloader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form

    // Sanitize POST data
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    // Init form
    $data = [
        'nickname' => trim($_POST['nickname']),
        'password' => trim($_POST['password']),
        'email_error' => '',
        'password_error' => '',
    ];

    // Validate Nickname not empty
    if (empty($data['nickname'])) {
        $data['nickname_error'] = 'Please Enter Nickname';
    }

    // Validate Password not empty
    if (empty($data['password'])) {
        $data['password_error'] = 'Please Enter Password';
    }

    $db = new Database();
    $user = $db->getUser($data['nickname']);
    // Check if user exists in database
    if ($user) {
        // User found

        $hashed_password = $user['password'];
        if (!password_verify($data['password'], $hashed_password)) {
            $data['password_error'] = 'User password is incorrect';
        }
    } else {
        $data['nickname_error'] = 'User ' . $data['nickname'] . ' not found';
    }

    // Make sure errors are empty
    if (empty($data['nickname_error']) && empty($data['password_error'])) {
        // Validated
        createUserSession($user);
        header('Location: index.php');
    } else {
        // Load view with Errors
        $data['password_error'] = 'Password incorrect';
    }
}
?>
<?php require ROOT . '/includes/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php
            echo flash('register_success');
            ?>
            <h2>
                Login</h2>
            <p>Please fill in your credentials to login</p>
            <form action="<?php echo URLROOT ?>/login.php" method="POST">
                <div class="form-group">
                    <label for="nickname">Nickname: <sup>*</sup></label>
                    <input type="text" name="nickname"
                        class="form-control form-control-lg <?php echo (!empty($data['nickname_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['nickname'] ?? '' ?>">
                    <span class="invalid-feedback"><?php echo $data['nickname_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Enter Password: <sup>*</sup></label>
                    <input type="password" name="password"
                        class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['password'] ?? '' ?>">
                    <span class="invalid-feedback"><?php echo $data['password_error'] ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/register.php" class="btn btn-light btn-block">No Account?
                            Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require ROOT . '/includes/footer.php' ?>