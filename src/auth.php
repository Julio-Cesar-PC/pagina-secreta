<?php

class auth {
    public function auth() {
        session_start();
        $dbuser = 'root';
        $dbpass = '0804.Julin';

        try {
            $conn = new PDO('mysql:host=localhost;dbname=paginaSecreta', $dbuser, $dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $data = $conn->query('SELECT * FROM users');
        
            foreach($data as $row) {
                if($_SESSION['username'] == $row['username'] && $_SESSION['password'] == $row['password'] && $row['isAdmin'] == 1) {
                    $_SESSION['admin'] = true;
                    $_SESSION['user_id'] = $row['id'];
                }
            }
        } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        // echo 'auth' . '<br>'
        // . $_SESSION['admin'] . '<br>'
        // . $_SESSION['username'] . '<br>'
        // . $_SESSION['password'] . '<br>';
    }
}