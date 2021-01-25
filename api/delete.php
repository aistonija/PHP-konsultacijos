<?php

include '../classes/dbh.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Dbh;
    $db->deleteMovie($_POST['id']);
}