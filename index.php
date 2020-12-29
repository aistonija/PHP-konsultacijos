<?php

$tree_height = rand(10, 30);

for ($y = 1; $y <= $tree_height; $y++) {
    for ($x = 1; $x <= $y; $x++) {
        $decoration = rand(1, 30);

        if ($decoration === 1) {
            print "💜";
        } elseif ($decoration === 2) {
            print "💎";
        } elseif ($decoration === 3) {
            print "🌹";
        } else {
            print "︽";
        }
    }

    print '</br>';
}

for ($y = 1; $y <= 2; $y++) {
    for ($x = 1; $x <= 2; $x++) {
        print "︽";
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>
<body>

</body>
</html>
