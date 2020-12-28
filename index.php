<?php
$dealer = 'Dealer';
$player = 'Aiste';

$dealer1 = rand(1, 11);
$dealer2 = rand(1, 11);

$player1 = rand(1, 11);
$player2 = rand(1, 11);

$dealer_sum = $dealer1 + $dealer2;
$player_sum = $player1 + $player2;

$message = '';
if ($dealer_sum > $player_sum) {
    $message = $dealer . ' is the winner with ' . $dealer_sum;
} elseif ($dealer_sum < $player_sum) {
    $message = $player . ' is the winner with ' . $player_sum;
} else {
    $message = 'It\'s a tie!';
}

?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <style>
        .container {
            width: 800px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .player {
            height: 150px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-around;
        }

        .card {
            height: 100%;
            width: 150px;
            border: 1px solid red;
        }
    </style>
</head>
<body>
<div class='container'>
    <h1><?php print $message; ?></h1>
    <h3><?php print $dealer . ' gets ' . $dealer_sum; ?></h3>
    <div class='player'>
        <div class='card'>
            <h2><?php print $dealer1; ?></h2>
        </div>
        <div class='card'>
            <h2><?php print $dealer2; ?></h2>
        </div>
    </div>
    <h3><?php print $player . ' gets ' . $player_sum; ?></h3>
    <div class='player'>
        <div class='card'>
            <h2><?php print $player1; ?></h2>
        </div>
        <div class='card'>
            <h2><?php print $player2; ?></h2>
        </div>
    </div>
</div>

</body>
</html>