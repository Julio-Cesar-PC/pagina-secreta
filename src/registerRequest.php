<?php
require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/utils.php';

$db = new DB();

session_start();

if (validateRegisterUsername($_REQUEST['username']) &&
    validatePassword($_REQUEST['password']) &&
    validateToken($_SESSION['csrfToken']) &&
    $_REQUEST['password'] == $_REQUEST['confirmPassword']) {
    $db->addUser($_REQUEST['username'],
        password_hash($_REQUEST['password'], PASSWORD_DEFAULT));
    header('Location: http://localhost:8000/');
} else {
    header('Location: http://localhost:8000/register');
    $_SESSION['error'] = 'Username or password is invalid';
}

