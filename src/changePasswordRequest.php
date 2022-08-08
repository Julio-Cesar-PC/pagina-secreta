<?php
require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/utils.php';

$db = new DB();

session_start();

if (validateToken($_SESSION['csrfToken']) &&
    $_REQUEST['newPassword'] != $_REQUEST['oldPassword'] &&
    validatePassword($_REQUEST['newPassword']) &&
    password_verify($_REQUEST['oldPassword'], $db->getUser($_SESSION['userId'])['password'])) {
    $db->updatePassword($_SESSION['userId'], password_hash($_REQUEST['newPassword'], PASSWORD_DEFAULT));
    $_SESSION['password'] = $_REQUEST['newPassword'];
    header('Location: http://localhost:8000/admin');
} else {
    header('Location: http://localhost:8000/changePassword');
    $_SESSION['error'] = 'Password is invalid';
}
