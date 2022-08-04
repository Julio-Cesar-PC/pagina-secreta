<?php
require_once __DIR__ . '/usersDB.php';

$dbuser = 'root';
$dbpass = '0804.Julin';

$db = new usersDB;
$db->addUser($_REQUEST['username'], $_REQUEST['password']);

header('Location: /');

// try {
//     $conn = new PDO('mysql:host=localhost;dbname=paginaSecreta', $dbuser, $dbpass);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // $data = $conn->query('SELECT * FROM users');

//     // foreach($data as $row) {
//     //     echo $row['username'] . '<br>';
//     // }

//     $username = $_REQUEST['username'];
//     $password = $_REQUEST['password'];

//     $STH = $conn->prepare("INSERT INTO users (username, password, isAdmin, changePass) VALUES ('$username', '$password', 0, 1)");
//     $STH->execute();


// } catch(PDOException $e) {
//     echo 'ERROR: ' . $e->getMessage();
// }

