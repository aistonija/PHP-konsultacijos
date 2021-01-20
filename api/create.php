<?php

include '../classes/dbh.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['movie_img'])) {
        header('HTTP/1.0 500 ' . 'Neinvedei nuotraukos');
        exit;
    }

    $db = new Dbh();
    $db->insertMovie(
        $_POST['movie_img'],
        $_POST['movie_title'],
        $_POST['movie_year'],
        $_POST['movie_genre']
    );
}