<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Admin</title>
</head>

<body class="bg-gray-900 flex justify-center">
    <div class="h-screen flex flex-col gap-4 justify-center">
        <div class="w-full max-w-xs">
            <div class="bg-gray-200 shadow-md rounded-xl px-8 pt-6 pb-8 mb-4">
                <div class="mb-4">
                    <h1 class="text-center text-2xl font-bold">Admin panel</h1>
                </div>
                <?php

                if ($_REQUEST['password'] === '1234') {
                    echo "Olá :) \r\n";
                    echo $_REQUEST['username'] . ' ' . $_REQUEST['password'];
                } else {
                    echo "Não entou :(";
                }
                ?>
                <img class="mb-4" src="giphy.gif" alt="">
                <div class="flex justify-center">
                    <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>