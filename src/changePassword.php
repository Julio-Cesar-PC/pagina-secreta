<?php
require_once __DIR__ . '/utils.php';
require_once __DIR__ . '/DB.php';

$db = new DB();
$user = $db->getUser($_SESSION['userId']);

session_start();

if (validateToken($_SESSION['csrfToken']) && $user['changePass'] == 0) {
    header('location: /admin');
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body class="bg-gray-900 flex justify-center">
<div class="h-screen flex flex-col justify-center">
    <div class="flex flex-col justify-center w-fit p-10 rounded-xl h-fit bg-gray-200">
        <button class="bg-blue-500 hover:bg-blue-700 p-2 rounded-full w-fit " onclick="window.location.href='/'">
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="white" fill-rule="evenodd"
                 clip-rule="evenodd">
                <path d="M12 0c6.623 0 12 5.377 12 12s-5.377 12-12 12-12-5.377-12-12 5.377-12 12-12zm0 1c6.071 0 11 4.929 11 11s-4.929 11-11 11-11-4.929-11-11 4.929-11 11-11zm3 5.753l-6.44 5.247 6.44 5.263-.678.737-7.322-6 7.335-6 .665.753z"/>
            </svg>
        </button>
        <h2 class="mb-10 text-center text-2xl font-bold">Change password</h2>
        <form class="flex flex-col gap-4" action="/src/changePasswordRequest.php" method="POST">

            <input class="rounded-xl p-1" type="password" name="oldPassword" placeholder="Old password">

            <input class="rounded-xl p-1" type="password" name="newPassword" placeholder="New password">

            <p class="text-red-500 text-center">
                <?php
                session_start();
                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }
                ?>
            </p>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Register
            </button>
        </form>
    </div>
</div>
</body>