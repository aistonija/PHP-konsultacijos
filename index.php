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

//var_dump($deck);

//2. Cards on table
$cards_on_table = [];

for ($x = 1; $x <= 5; $x++) {
    $rand_index = rand(0, count($deck) - 1);
    $cards_on_table[] = $deck[$rand_index];

    array_splice($deck, $rand_index, 1);
}

//var_dump($cards_on_table);

//3. is Flush?

$result_flush = 'Yes';

for ($x = 1; $x < 5; $x++) {
    if ($cards_on_table[0]['suit'] != $cards_on_table[$x]['suit']) {
        $result_flush = 'No';
        break;
    }
}

//4. Helper function to find same cards
$same_cards = [];

for ($i = 0; $i < 5; $i++) {
    $card = $cards_on_table[$i]['card'];

    if (isset($same_cards[$card])) {
        $same_cards[$card]++;
    } else {
        $same_cards[$card] = 1;
    }
}

var_dump($same_cards);

$pair_count = 0;

$result_pair = 'No';
$result_3_of_kind = 'No';

foreach ($same_cards as $total) {
    switch ($total) {
        case 2:
            {
                $result_pair = 'Yes';
                $pair_count++;
            }
            break;
        case 3:
            {
                $result_3_of_kind = 'Yes';
            }
            break;
        default:
            break;
    }
}

$result_fullhouse = '';

if ($result_3_of_kind === 'Yes' && $result_pair === 'Yes') {
    $result_fullhouse = 'Yes';
} else {
    $result_fullhouse = 'No';
}


$result_2_pairs = '';

if ($pair_count == 2) {
    $result_2_pairs = 'Yes';
} else {
    $result_2_pairs = 'No';
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
<table>
    <tr>
        <td>Do I have a pair?</td>
        <td><?= $result_pair ?></td>
    </tr>
    <tr>
        <td>Do I have 2 pairs?</td>
        <td><?= $result_2_pairs ?></td>
    </tr>
    <tr>
        <td>Do I have 3 of a kind?</td>
        <td><?= $result_3_of_kind ?></td>
    </tr>
    <tr>
        <td>Do I have flush?</td>
        <td><?= $result_flush ?></td>
    </tr>
    <tr>
        <td>Do I have full house?</td>
        <td><?= $result_fullhouse ?></td>
    </tr>
    <tr>
        <!--        <td>Do I have 4 of a kind?</td>-->
        <!--        <td>--><? //=$result_4_of_1_kind?><!--</td>-->
    </tr>
</table>
</body>
</html>

