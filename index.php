<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        div {
            width: 300px;
            height: 25px;
            margin: 10px auto;
        }
    </style>
</head>
<body>
<?php for ($x = 1; $x <= 15; $x++): ?>
    <div style="background: rgb( 0, 0, <?php print 255 * ($x / 15); ?>)"></div>
<?php endfor; ?>
</body>
</html>