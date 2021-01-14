<?php
require_once 'Child.php';

$children = [
    new Child('Elija', 'girl', 10),
    new Child('Gabrielius', 'boy', 16),
    new Child('Aidas', 'boy', 40),
    new Child('Arūnė', 'girl', 6)
];

var_dump($children);

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OP Abstracts</title>
    <style>
    .box {
        box-shadow: 0 2px 4px #777777;
        padding: 10px;
        margin-bottom: 20px;
    }
    </style>
</head>

<body>
    <?php foreach ($children as $child) : ?>
    <div class="box">
        <h3>Name of the child is: <?php echo $child->getName() ?></h3>
        <h4>Age: <?php echo $child->getAge() ?></h4>
        <p><?php echo 'School year is ' . $child->whichGrade(); ?></p>
    </div>
    <?php endforeach; ?>
</body>

</html>