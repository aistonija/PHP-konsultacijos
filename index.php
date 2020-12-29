<?php

$users = [
    [
        'user_name' => 'Black Widow',
        'user_email' => 'b_widow@gmail.com',
        'user_password' => 'widdow2',
        'user_img' => 'https://cdn.vox-cdn.com/thumbor/9npVmC2tPdivC0gXXYvGWSsGwO8=/0x0:1300x650/1200x800/filters:focal(421x164:629x372)/cdn.vox-cdn.com/uploads/chorus_image/image/65815896/black_widow_marvel.0.jpeg',
    ],
    [
        'user_name' => 'Captain America',
        'user_email' => 'captain_america@gmail.com',
        'user_password' => '1maCap',
        'user_img' => 'https://www.geo.tv/assets/uploads/updates/2020-04-07/281462_031504_updates.jpg',
    ],
    [
        'user_name' => 'Gomora',
        'user_email' => 'galaxy_guardian@gmail.com',
        'user_password' => 'Galaxxxx',
        'user_img' => 'https://www.denofgeek.com/wp-content/uploads/2019/11/Gamora_Guardians_of_the_Galaxy.jpg?fit=1200%2C675',
    ],
    [
        'user_name' => 'Star Lord',
        'user_email' => 'real_guardian@gmail.com',
        'user_password' => 'starL000rd',
        'user_img' => 'https://i.ytimg.com/vi/hu-bqCChJyc/maxresdefault.jpg',
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Users</title>
    <style>
        .container {
            width: 900px;
            margin: 0 auto;
            display: flex;
        }

        .card {
            width: calc(300px - 20px);
            margin: 10px;
            box-shadow: 0 2px 4px #bcbcbc;
        }

        .img {
            height: 200px;
        }

        .img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <?php foreach ($users as $user): ?>
        <div class="card">
            <div class="img">
                <img src="<?php print $user['user_img']; ?>">
            </div>
            <div class="card-body">
                <h3>User name: <?php print $user['user_name']; ?></h3>
                <p>Password: <?php print $user['user_password']; ?></p>
                <p>email: <?php print $user['user_email']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
