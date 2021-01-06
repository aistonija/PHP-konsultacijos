<?php
session_start();
require_once 'process.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Contact Customer Support</title>
</head>
<body>
<?php if ($show_form === true): ?>
    <main id="block">
        <header class="bg">
            <h1>parašykite mums žinutę</h1>
        </header>
        <section class="form-block">
            <form method="post" action="<?php print $_SERVER['PHP_SELF'] ?>">
                <div class="name-input">
                    <input type="text" placeholder="Jūsų vardas"
                           name="name" value="<?php print $_POST['name'] ?? '' ?>">
                </div>
                <?php if (isset($errors['name'])): ?>
                    <div class="error"><?php print $errors['name']; ?></div>
                <?php endif; ?>
                <div class="name-input">
                    <input type="text" placeholder="El. Paštas"
                           name="email" value="<?php print $_POST['email'] ?? '' ?>">
                    <?php if (isset($errors['email'])): ?>
                        <div class="error"><?php print $errors['email']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="name-input">
                    <input type="tel" placeholder="Telefono numeris" name="phone"
                           value="<?php print $_POST['phone'] ?? '' ?>"
                    >
                    <?php if (isset($errors['phone'])): ?>
                        <div class="error"><?php print $errors['phone']; ?></div>
                    <?php endif; ?>
                </div>

                <div class="help-radio">
                    <h4>Noriu susisiekti su:</h4>
                    <div class="radio-center">
                        <input type="radio" name="department" value="sales" id="sales">
                        <label for="sales">Pardavimų skyriumi</label>
                    </div>
                    <div class="radio-center">
                        <input type="radio" name="department" value="management" id="management">
                        <label for="management">Administracija</label>
                    </div>
                    <div class="radio-center">
                        <input type="radio" name="department" value="support" id="support">
                        <label for="support">Klientų aptarnavimo skyriumi</label>
                    </div>
                </div>
                <select name="subject">
                    <option value="select">pasirinkite temą</option>
                    <option value="1">Skundas</option>
                    <option value="2">Pasiūlymas</option>
                </select>
                <div>
                <textarea name="message" placeholder="Jūsų žinutė.." cols="20"
                          rows="3"><?php print $_POST['message'] ?? '' ?></textarea>
                </div>
                <?php if (isset($errors['message'])): ?>
                    <div class="error"><?php print $errors['message']; ?></div>
                <?php endif; ?>
                <div class="btn">
                    <button type="submit">Siųsti</button>
                </div>
            </form>
        </section>
    </main>
<?php else: ?>
    <div class="message-block">
        <h3>Dėkojame už jūsų žinutę, <?php print $_SESSION['name'] ?></h3>
        <div class="message-info">
            <ul>
                <?php foreach ($user_data as $user_info): ?>
                    <li><?php print $user_info; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
</body>
</html>