<?php
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/DB.php';

session_start();

if (time() > $_SESSION['timeToWait'] && isset($_SESSION['timeToWait'])) {
    unset($_SESSION['timeToWait']);
    $_SESSION['attempts'] = 0;
    header('Location: http://localhost:8000/');
}

if ($_SESSION['attempts'] >= 3) {
    $_SESSION['timeToWait'] = time() + 60;
    header('Location: http://localhost:8000/');
    die();
}

if (validateLoginUsername($_REQUEST['username']) &&
    validateToken($_SESSION['csrfToken'])) {

    $db = new DB();
    $data = $db->getUsers();

    foreach ($data as $row) {

        if ($_REQUEST['username'] == $row['username'] &&
            password_verify($_REQUEST['password'], $row['password'])) {
            $_SESSION['username'] = $_REQUEST['username'];
            $_SESSION['attempts'] = 0;
            $_SESSION['isLogged'] = true;
            $_SESSION['userId'] = $row['id'];
            $db->addSession($row['id'], session_id());
            header('Location: /admin');
        } else {
            $_SESSION['attempts']++;
            header('location: /');
        }
    }
} else {
    header('Location: /');
    $_SESSION['error'] = 'Username or password is invalid';
}
