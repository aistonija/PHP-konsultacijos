<?php
session_start();
require_once('process.php');
require_once('users.php');

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
</head>
<body>
<?php include_once 'includes/nav.php'; ?>
<form class="form" method="POST">
    <div class="input-row">
        <label for="email">El. Paštas</label>
        <input type="email" id="email" name="email" value="<?php print $_POST['email'] ?? null; ?>">
    </div>
    <div class="input-row">
        <label for="password">Slaptažodis</label>
        <input type="password" id="password" name="password" value="<?php print $_POST['password'] ?? null; ?>">
    </div>
    <button type="submit" name="submit" value="submit">Prisijungti</button>

    <?php if (isset($message)): ?>
        <div class="<?php print $message_class; ?>"><?php print $message ?></div>
    <?php endif; ?>
</form>

</body>
</html>