<?php

session_start();

require_once 'conn.php';

if (isset($_SESSION['admin'])) {

    header("Location: dashboard");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = $pdo->prepare("
        SELECT * FROM users
        WHERE email = ?
        LIMIT 1
    ");

    $query->execute([$email]);

    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user && $password === $user['password']) {

        $_SESSION['admin'] = $user;

        header("Location: dashboard");
        exit;
    } else {

        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link rel="preconnect"
        href="https://fonts.googleapis.com" />

    <link rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin />

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

<link rel="stylesheet"
    href="../dist/output.css" />

</head>

<body class="min-h-screen bg-neutral-950 flex items-center justify-center relative overflow-hidden">

    <!-- Background Layer 1 -->

    <div class="absolute inset-0 bg-gradient-to-tr from-neutral-900 via-neutral-950 to-black"></div>

    <!-- Background Accent Strip -->

    <div class="absolute left-0 top-0 h-full w-1/3 bg-gradient-to-b from-indigo-600/20 to-transparent"></div>

    <!-- Background Light Beam -->

    <div class="absolute -top-40 right-[-200px] w-[600px] h-[600px] bg-indigo-500/10 blur-[160px] rounded-full"></div>

    <!-- Main Layout Container -->

    <div class="relative w-full max-w-5xl mx-auto grid md:grid-cols-2 rounded-2xl overflow-hidden shadow-[0_40px_120px_-20px_rgba(0,0,0,0.6)]">

        <!-- Left Panel -->

        <div class="hidden md:flex flex-col justify-center px-16 py-20 bg-neutral-900/60 backdrop-blur-xl border-r border-white/5">

            <h1 class="text-4xl font-semibold text-white leading-tight">

                Welcome back.

            </h1>

            <p class="mt-6 text-neutral-400 text-lg max-w-sm">

                Indira Gandhi Garden School ERP

            </p>

            <div class="mt-12 h-[1px] w-16 bg-indigo-500"></div>

        </div>

        <!-- Right Panel -->

        <div class="bg-neutral-900/80 backdrop-blur-xl p-12 md:p-16">

            <!-- Login Error -->
            <?php if (isset($_GET['error'])) : ?>

                <div class="bg-red-500/20 border border-red-500/30 text-red-200 px-4 py-3 rounded-xl mb-5 text-sm">

                    <?= $_GET['error']; ?>

                </div>

            <?php endif; ?>
             <!-- Login Error -->


            <h2 class="text-2xl font-medium text-white mb-10 tracking-tight">

                Sign in

            </h2>

            <!-- Password Error -->
            <?php if (isset($error)) : ?>

                <div class="bg-red-500/20 border border-red-500/30 text-red-200 px-4 py-3 rounded-xl mb-5 text-sm">

                    <?= $error ?>

                </div>

            <?php endif; ?>
            <!-- Password Error -->



            <form method="POST"
                class="space-y-8">

                <div>

                    <input
                        type="email"
                        name="email"
                        required
                        placeholder="Email"
                        class="w-full bg-transparent border-b border-neutral-700 text-white placeholder-neutral-500 py-3 focus:outline-none focus:border-indigo-500 transition">

                </div>

                <div class="relative w-full">

                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        placeholder="Password"
                        class="w-full bg-transparent border-b border-neutral-700 text-white placeholder-neutral-500 py-3 pr-12 focus:outline-none focus:border-indigo-500 transition">

                    <svg
                        id="togglePassword"
                        xmlns="http://www.w3.org/2000/svg"
                        style="position:absolute; right:12px; top:15px;"
                        class="w-5 h-5 text-neutral-800 cursor-pointer hover:text-gray-600 transition"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />

                    </svg>

                </div>

                <button
                    type="submit"
                    name="login"
                    class="w-full py-3 mt-4 bg-indigo-600 text-white rounded-lg hover:bg-indigo-500 active:scale-[0.99] transition duration-200">

                    Login

                </button>

            </form>

        </div>

    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', () => {

            if (passwordInput.type === 'password') {

                passwordInput.type = 'text';

            } else {

                passwordInput.type = 'password';

            }

        });
    </script>

</body>

</html>