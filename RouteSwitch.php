<?php

abstract class RouteSwitch
{
    protected function index()
    {
        require __DIR__ . '/login.php';
    }

    protected function admin()
    {
        require __DIR__ . '/admin.php';
    }
    
    protected function __call($name, $arguments)
    {
        http_response_code(404);
        require __DIR__ . '/not-found.html';
    }
}