<?php
require_once __DIR__ . '/DB.php';

function auth()
{
    session_start();
    $db = new DB();
    $user = $db->getUser($_SESSION['userId']);

    if ($user['role'] == 1) {
        $_SESSION['admin'] = true;
    } else if ($user['role'] == 2) {
        $_SESSION['user'] = true;
        header('location: /user-panel');
        die();
    }
}
