<?php

session_start();

require_once 'conn.php';

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

$adminId = $_SESSION['admin']['id'];

$query = $pdo->prepare("
    SELECT *
    FROM users
    WHERE id = ?
    LIMIT 1
");

$query->execute([$adminId]);

$user = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // UPDATE WITHOUT PASSWORD
    if (empty($password)) {

        $update = $pdo->prepare("
            UPDATE users
            SET full_name = ?, email = ?
            WHERE id = ?
        ");

        $update->execute([
            $full_name,
            $email,
            $adminId
        ]);

    }

    // UPDATE WITH PASSWORD
    else {

        $update = $pdo->prepare("
            UPDATE users
            SET full_name = ?, email = ?, password = ?
            WHERE id = ?
        ");

        $update->execute([
            $full_name,
            $email,
            $password,
            $adminId
        ]);

    }

    $_SESSION['admin']['full_name'] = $full_name;
    $_SESSION['admin']['email'] = $email;

    header("Location: profile.php");
    exit;
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-20 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col opacity-0 translate-y-6 scale-[0.98] ease-out">

    <!-- MAIN -->
    <main class="p-6 pb-10 overflow-y-auto h-[calc(100vh-140px)]">

        <div class="max-w-4xl mx-auto">

            <!-- TITLE -->
            <div class="mb-8">

                <h2 class="text-3xl font-bold text-gray-800">
                    Update Profile
                </h2>

                <p class="text-gray-500 mt-1">
                    Edit your account information
                </p>

            </div>

            <!-- CARD -->
            <div class="bg-slate-400 border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <form method="POST"
                    class="p-8 space-y-6">

                    <!-- FULL NAME -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Full Name

                        </label>

                        <input
                            type="text"
                            name="full_name"
                            value="<?= $user['full_name']; ?>"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500">

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Email Address

                        </label>

                        <input
                            type="email"
                            name="email"
                            value="<?= $user['email']; ?>"
                            required
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500">

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            New Password

                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="Leave blank if you don't want to change password"
                            class="w-full border border-slate-300 rounded-xl px-4 py-3 focus:outline-none focus:border-blue-500">

                    </div>

                    <!-- BUTTONS -->
                    <div class="flex items-center gap-4 pt-2">

                        <button
                            type="submit"
                            class="bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-xl transition">

                            Save Changes

                        </button>

                        <a
                            href="profile.php"
                            class="bg-slate-200 hover:bg-slate-300 text-slate-700 px-8 py-3 rounded-xl transition">

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>