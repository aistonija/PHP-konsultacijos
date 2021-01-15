<?php
include('./const/constants.php');
include('./functions/functions.php');
include('./Class/Player.php');
include('./Class/Team.php');
include('./Class/GameMatch.php');

$match = new GameMatch();
$team = new Team();
$player = new Player();
$teams = $match->getTeams();

$match->setDate(generate_rand_date('2020-10-14', '2021-10-14'));
$match->setTime(generate_time());

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basketball Match</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
</head>

<body>
    <div>
        <div class="biggerText"><?php echo $match->getDate() ?></div>
        <div class="biggerText"><?php echo $match->getTime() ?></div>
        <div class="biggerText"><?php echo $match->getLocation() ?></div>
        <div class="gameContainer">
            <?php foreach ($teams[0] as $team) : ?>
            <div class="teamBox">
                <div>
                    <img src="<?php print $team->getTeamLogo() ?>" alt="">
                </div>
                <div class="teamInformationBox">
                    <div>
                        Team name: <?php print $team->getTeamName() ?>
                    </div>
                    <div>
                        Coach: <?php print $team->getCoachName() ?>
                    </div>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th>Player Name</th>
                                <th>Player Height in cm</th>
                                <th>Player Position</th>
                                <th>Player Shirt Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($team->getPlayersArray() as $player) : ?>
                            <tr>
                                <td>
                                    <?php echo $player->getName() . ' ' . $player->getLastname() ?>
                                </td>
                                <td>
                                    <?php echo $player->getHeight() ?>
                                </td>
                                <td>
                                    <?php echo $player->getPosition() ?>
                                </td>
                                <td>
                                    <?php echo $player->getNumber() ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>