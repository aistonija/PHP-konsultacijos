<?php require ROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>
                Become a family member of Pixelotrons</h2>
            <p>Create and Account</p>
            <form action="<?php echo URLROOT ?>/users/register" method="POST">
                <div class="form-group">
                    <label for="first_name">First Name: <sup>*</sup></label>
                    <input type="text" name="first_name"
                        class="form-control form-control-lg <?php echo (!empty($data['first_name_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['first_name'] ?? null ?>">
                    <span class="invalid-feedback"><?php echo $data['first_name_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name: <sup>*</sup></label>
                    <input type="text" name="last_name"
                        class="form-control form-control-lg <?php echo (!empty($data['last_name_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['last_name'] ?? null  ?>">
                    <span class="invalid-feedback"><?php echo $data['last_name_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="email" name="email"
                        class="form-control form-control-lg <?php echo (!empty($data['email_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['email'] ?? null  ?>">
                    <span class="invalid-feedback"><?php echo $data['email_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Create Password: <sup>*</sup></label>
                    <input type="password" name="password"
                        class="form-control form-control-lg <?php echo (!empty($data['password_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['password'] ?? null  ?>">
                    <span class="invalid-feedback"><?php echo $data['password_error'] ?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password"
                        class="form-control form-control-lg <?php echo (!empty($data['confirm_password_error'])) ? 'is-invalid' : ''; ?>"
                        value="<?php echo $data['confirm_password_error'] ?? null  ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_error'] ?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/users/login" class="btn btn-light btn-block">Have an Account?
                            Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require ROOT . '/views/inc/footer.php' ?>