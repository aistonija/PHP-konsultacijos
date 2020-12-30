<?php

$suits = ['spades', 'diamonds', 'hearts', 'clubs'];
$cards = ['A', 'K', 'Q', 'J', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'];

//1. Generate deck of 56 cards
$deck = [];

foreach ($suits as $suit) {
    foreach ($cards as $card) {
        $deck[] = [
            'suit' => $suit,
            'card' => $card,
        ];
    }
}

//2. Cards on table
$cards_on_table = [];

for ($x = 1; $x <= 5; $x++) {
    $rand_index = rand(0, count($deck) - 1);
    $cards_on_table[] = $deck[$rand_index];

    array_splice($deck, $rand_index, 1);
}

var_dump($cards_on_table);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Poker Cards</title>
</head>
<body>
<div class="container">
    <?php foreach ($cards_on_table as $card): ?>
        <div class="card <?php print $card['suit'] ?>">
            <div class="name"><?php print $card['card'] ?></div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>

