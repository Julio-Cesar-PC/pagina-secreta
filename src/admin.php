
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
</head>

<?php
require_once __DIR__ . '/src/usersDB.php';

$db = new usersDB;



session_start();


?>

<body class="bg-gray-900 flex justify-center">
    <div class="h-screen flex flex-col gap-4 justify-center">
        <div class="w-full max-w-xs">
            <div class="bg-gray-200 shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <h1 class="text-center text-2xl font-bold">Admin panel</h1>
                </div>
                <?php 
                echo $_SESSION['username'] . '<br>';

                if ($_SESSION['admin'] == true) {
                    echo 'You are admin';
                    echo '<img class="mb-4" src="../public/giphy.gif" alt="">';
                } else {
                    echo 'You are not admin';
                }
                ?>
                <!-- <img class="mb-4" src="../public/giphy.gif" alt=""> -->
                <div class="flex justify-center">
                    <a href="/src/logoutHandler.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>