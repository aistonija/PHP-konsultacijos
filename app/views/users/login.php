<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Login</h2>
            <form method="post">
                <div class="form-group">
                    <label for="nickname">Nickname:<sup>*</sup></label>
                    <input type="text" name="nickname" id="nickname"
                        class="<?php echo (!empty($data['nicknameErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg"
                        value="<?php echo $data['nickname'] ?>">
                    <span class='invalid-feedback'><?php echo $data['nicknameErr'] ?></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:<sup>*</sup></label>
                    <input type="password" name="password" id="password"
                        class="<?php echo (!empty($data['passwordErr'])) ? 'is-invalid' : ''; ?> form-control form-control-lg"
                        value="<?php echo $data['password'] ?>">
                    <span class='invalid-feedback'><?php echo $data['passwordErr'] ?></span>
                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" value="Login" class="btn btn-primary btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/users/register" class='btn btn-light btn-block '>No account?
                            Register</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>