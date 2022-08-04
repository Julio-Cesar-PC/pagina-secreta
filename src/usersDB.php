<?php

class usersDB {

    private $db;
    
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=paginaSecreta', 'root', '0804.Julin');
    }
    
    public function getUsers() {
        $sql = 'SELECT * FROM users';
        $statement = $this->db->prepare($sql);
        $statement->execute();
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }
    
    public function getUser($id) {
        $sql = 'SELECT * FROM users WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
    
    public function addUser($username, $password, $isAdmin = 0, $changePass = 1) {
        $sql = 'INSERT INTO users (username, password, isAdmin, changePass) VALUES (:username, :password, :isAdmin, :changePass)';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':isAdmin', $isAdmin);
        $statement->bindValue(':changePass', $changePass);
        $statement->execute();
    }
    
    public function updateUser($id, $username, $password) {
        $sql = 'UPDATE users SET username = :username, password = :password WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':password', $password);
        $statement->execute();
    }
    
    public function deleteUser($id) {
        $sql = 'DELETE FROM users WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
    }

    public function deleteAllUSers() {
        $sql = 'DELETE FROM users';
        $statement = $this->db->prepare($sql);
        $statement->execute();
    }
    

}