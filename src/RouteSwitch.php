<?php

abstract class RouteSwitch
{
    protected function login()
    {
        require './public/login.php';
    }

    protected function userPanel()
    {
        require './public/userPanel.php';
    }

    protected function admin()
    {
        require './src/admin.php';
    }

    protected function auth()
    {
        require './src/auth.php';
    }

    protected function changePassword()
    {
        require './src/changePassword.php';
    }

    protected function register()
    {
        require './public/register.php';
    }

    protected function __call($name, $arguments)
    {
        http_response_code(404);
        require './public/not-found.html';
    }
}