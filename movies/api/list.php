<?php

include '../classes/dbh.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db = new Dbh;
    echo json_encode($db->getAllMovies());
}