<?php

session_start();

$_SESSION['username'] = $_REQUEST['username'];
$_SESSION['password'] = $_REQUEST['password'];

// echo $_SESSION['username'] . '<br>'
// . $_SESSION['password'] . '<br>';

header('Location: http://localhost:8000/admin');