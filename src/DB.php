<?php

class DB
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=paginaSecreta', 'root', '0804.Julin');
    }

    public function getUsers()
    {
        $sql = 'SELECT * FROM users';
        $statement = $this->db->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUser($id)
    {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser($username, $password, $changePass = 0, $role = 2)
    {
        $sql = 'INSERT INTO users (username, password, changePass, role) VALUES (:username, :password, :changePass, :role)';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':changePass', $changePass);
        $statement->bindValue(':role', $role);
        $statement->execute();
    }

    public function updatePassword($id, $password)
    {
        $sql = 'UPDATE users SET password = :password, changePass = 0 WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':password', $password);
        $statement->execute();
    }

    public function addSession($userId, $sessionId)
    {
        $sql = 'INSERT INTO user_sessions (user_id, session_id) VALUES (:userId, :sessionId)';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':userId', $userId);
        $statement->bindValue(':sessionId', $sessionId);
        $statement->execute();
    }

    public function destroySession($sessionId)
    {
        $sql = 'DELETE FROM user_sessions WHERE session_id = :sessionId';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':sessionId', $sessionId);
        $statement->execute();
    }

    public function getSessions($userId)
    {
        $sql = 'SELECT * FROM user_sessions WHERE user_id = :userId';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':userId', $userId);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAttempts($id)
    {
        $sql = 'SELECT * FROM attempts WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $attempts = $statement->fetch(PDO::FETCH_ASSOC);
        return $attempts['attempts'];
    }

    public function updateAttempts($id, $attempts)
    {
        $sql = 'UPDATE attempts SET attempts = :attempts WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':attempts', $attempts);
        $statement->execute();
    }

    public function timeToWait($id)
    {
        $sql = 'UPDATE timeToWait FROM users WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $timeToWait = $statement->fetch(PDO::FETCH_ASSOC);
        return $timeToWait['timeToWait'];
    }

}