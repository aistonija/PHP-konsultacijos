<?php
session_start();

require_once 'functions.php';
var_dump($_SESSION);
$greeting = '';

if (is_logged_in()) {
    $greeting = 'Welcome back, ' . $_SESSION['email'];
    $time_left = 'You have 10 seconds to do business';
} else {
    logout();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>My HomePage</title>
</head>
<body>
<?php include_once 'includes/nav.php'; ?>
<h2 style="text-align: center"><?php print $greeting ?? null; ?></h2>
<p style="text-align: center"><?php print $time_left ?? null; ?></p>
</body>
</html>

