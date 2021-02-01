<?php
require 'bootloader.php';

?>
<?php require ROOT . '/includes/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>
                Create An Account</h2>
            <p>Please fill out this form to register with us</p>
            <form action="<?php echo URLROOT ?>/register.php" method="POST" id="register-form">

                <div class="form-group">
                    <label for="nickname">Create Nickname: <sup>*</sup></label>
                    <input type="text" name="nickname" class="form-control form-control-lg">
                    <div class="invalid-feedback userError" id="nickname_error"></div>
                </div>

                <div class="form-group">
                    <label for="nickname">Create Password: <sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg">
                    <div class="invalid-feedback userError" id="password_error"></div>
                </div>

                <div class="form-group">
                    <label for="nickname">Confirm Password: <sup>*</sup></label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg">
                    <div class="invalid-feedback userError" id="confirm_password_error"></div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="Register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/login.php" class="btn btn-light btn-block">Have an Account?
                            Login</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require ROOT . '/includes/footer.php' ?>
<!-- js script starts here -->
<script>
const registerForm = document.getElementById('register-form');
if (registerForm) {
    const createUser = () => {
        const formdata = new FormData(registerForm);

        fetch('api/createUser.php', {
                method: 'POST',
                body: formdata,
            })
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                console.log(data)

                let errors = document.querySelectorAll('.userError')
                errors.forEach((value) => {
                    value.textContent = '';
                });

                if (data.status === "Fail") {
                    for (let key in data.errors) {
                        let value = data.errors[key];
                        let error_element = document.getElementById(`${key}_error`);
                        let inputClass = document.querySelector(`[name="${key}"]`)
                        console.log(error_element)
                        if (error_element) {
                            error_element.textContent = value
                            inputClass.classList.add('is-invalid')
                        }
                    }
                } else {
                    window.location = 'login.php'
                }
            })
            .catch((err) => {
                console.log(err);
            });

    }

    registerForm.addEventListener("submit", (event) => {
        event.preventDefault();
        createUser();
    });
}
</script>