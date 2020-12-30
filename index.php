<?php

$array = [
    [1, 1, 1],
    [0, 1, 0],
    [1, 0, 0],
];

$reversed_array = [];

foreach ($array as $array_index => $row) {
    foreach ($row as $row_index => $value) {
        if ($value === 0) {
            $reversed_array[$array_index][$row_index] = 1;
        } else {
            $reversed_array[$array_index][$row_index] = 0;
        }
    }
}

var_dump($array);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table {
            margin: 50px auto;
            border: 1px solid #777777;
            border-collapse: collapse;
        }

        table tr td {
            width: 50px;
            height: 50px;
            text-align: center;
            border: 1px solid #777777;
        }
    </style>
    <title>Reverse Array Values</title>
</head>
<body>
<table>
    <?php foreach ($array as $row) : ?>
        <tr>
            <?php foreach ($row as $value) : ?>
                <td><?php print $value; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
<table>
    <?php foreach ($reversed_array as $row) : ?>
        <tr>
            <?php foreach ($row as $value) : ?>
                <td><?php print $value; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
