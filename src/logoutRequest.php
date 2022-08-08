<?php
require_once __DIR__ . '/DB.php';
require_once __DIR__ . '/utils.php';

session_start();

if (validateToken($_SESSION['csrfToken'])) {

    $db = new DB();

    $db->destroySession(session_id());

    session_destroy();

    header('Location: http://localhost:8000/');
}