<?php

require_once __DIR__ . '/src/Router.php';
require_once __DIR__ . '/src/utils.php';

session_start();
$_SESSION['csrfToken'] = createToken();

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);