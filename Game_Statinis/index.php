<?php
require 'classes/Player.php';
require 'classes/Team.php';
require 'classes/GameMatch.php';
require 'functions/functions.php';
require 'const/constants.php';

$players = [
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
];

$players2 = [
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
    new Player(rand_array_value(NAMES), rand_array_value(SURNAMES), rand(177, 230), rand_array_value(POSITION_TYPES), rand(1, 100)),
];

$teams = [
    new Team(generate_coach_name(), generate_team_name(), $players, assign_logo()),
    new Team(generate_coach_name(), generate_team_name(), $players2, assign_logo()),
];

// var_dump($teams);

$match = new GameMatch($teams);
$match->setDate(generate_rand_date('2020-08-20', '2021-03-15'));
$match->setTime(generate_time());

$team1 = generate_score();
$team2 = generate_score();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Match</title>
</head>

<body>
    <section class="match">
        <div class="match_info">
            <h2><?php print $match->getDate(); ?></h2>
            <h2><?php print $match->getTime(); ?></h2>
        </div>
        <div class="teams">
            <?php foreach ($match->getTeams() as $team) : ?>
            <div class="team_info">
                <div class="logo">
                    <img src="<?php print $team->getLogo(); ?>" alt="">
                </div>
                <div class="team_content">
                    <div class="about_team">
                        <h1>Team Name: <?php print $team->getTeamName(); ?></h1>
                        <h2>Coach: <?php print $team->getCoach(); ?></h2>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th>Player height</th>
                                <th>Player position</th>
                                <th>Player Shirt Number</th>
                            </tr>
                        </thead>
                        <?php foreach ($team->getPlayers() as $player) : ?>
                        <tr>
                            <td><?php print $player->getName() . ' ' . $player->getSurname(); ?></td>
                            <td><?php print $player->getHeight() ?></td>
                            <td><?php print $player->getPosition() ?></td>
                            <td><?php print $player->getShirt() ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>

</html>