<?php

function createToken(): string
{
    $randomString = bin2hex(random_bytes(32));
    return $randomString . '-' . session_id();
}

function validateToken($token): bool
{
    $parts = explode('-', $token);
    if (count($parts) == 2) {
        $randomString = $parts[0];
        $validate = $randomString . '-' . session_id();
        return $validate == $token;
    } else {
        return false;
    }
}

function validateLoginUsername($username): bool
{
    if (strlen($username) <= 4 || strlen($username) >= 20) {
        return false;
    } else if (!ctype_alnum($username)) {
        return false;
    }
    return true;
}

function validatePassword($password): bool
{
    if (strlen($password) < 7 || strlen($password) > 14) {
        return false;
    } else if (!preg_match('/^(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,12}$/', $password)) {
        return false;
    }
    return true;
}

function validateRegisterUsername($username): bool
{
    $db = new DB();
    $data = $db->getUsers();
    foreach ($data as $row) {
        if ($username == $row['username']) {
            return false;
        }
    }
    if (strlen($username) <= 4 || strlen($username) > 20) {
        return false;
    } else if (!ctype_alnum($username)) {
        return false;
    }
    return true;
}


