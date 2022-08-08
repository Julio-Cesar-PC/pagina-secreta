<?php

if ($_SESSION['isLogged']) {
    header('Location: http://localhost:8000/admin');
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

        <h2 class="mb-10 text-center text-2xl font-bold">Login</h2>
        <form class="flex flex-col gap-4" action="/src/loginRequest.php" method="POST">

            <input class="rounded-xl p-1" type="text" name="username" placeholder="Username" required>

            <input class="rounded-xl p-1" type="password" name="password" placeholder="Password" required>

            <p class="text-red-500 text-center">
                <?php

                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }

                echo '<br>';
                if (isset($_SESSION['timeToWait']) && $_SESSION['attempts'] >= 3 && isset($_SESSION['attempts']) && $_SESSION['timeToWait'] > time()) {
                    echo 'Wait ' . ($_SESSION['timeToWait'] - time()) . ' seconds';
                }

                ?>
            </p>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Login
            </button>
        </form>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onclick="window.location.href='/register'">
            Register
        </button>
    </div>
</div>
</body>
