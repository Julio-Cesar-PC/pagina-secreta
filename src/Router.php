<?php
require_once __DIR__ . '/RouteSwitch.php';
require_once __DIR__ . '/auth.php';

class Router extends RouteSwitch
{
    public function run(string $requestUri)
    {
        $route = substr($requestUri, 1);

        switch ($route) {
            case '':
                $this->login();
                break;

            case 'admin':
                auth();
                if ($_SESSION['admin']) {
                    $this->admin();
                } else {
                    header('HTTP/1.1 401 Unauthorized');
                    die(401);
                }
                break;

            case 'register':
                $this->register();
                break;

            case 'user-panel':
                $this->userPanel();
                break;

            case 'changePassword':
                $this->changePassword();
                break;

            default:
                $this->__call($route, []);
                break;
        }
    }
}