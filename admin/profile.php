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

    $_SESSION['success'] = "Profile updated successfully";

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
                    My Profile
                </h2>

                <p class="text-gray-500 mt-1">
                    Manage your account information
                </p>

            </div>

            <?php if (isset($_SESSION['success'])) : ?>

                <div class="bg-green-500/10 border border-green-500/20 text-green-700 px-4 py-3 rounded-xl mb-6">

                    <?= $_SESSION['success']; ?>

                </div>

                <?php unset($_SESSION['success']); ?>

            <?php endif; ?>

            <!-- PROFILE CARD -->
            <div class="bg-slate-200 border border-slate-200 rounded-2xl shadow-sm overflow-hidden">

                <!-- TOP -->
                <div class="p-8 border-b border-slate-100 flex items-center gap-5">

                    <div class="w-20 h-20 rounded-full bg-blue-100 flex items-center justify-center text-3xl font-bold text-blue-900">

                        <?= strtoupper(substr($user['full_name'], 0, 1)); ?>

                    </div>

                    <div>

                        <h3 class="text-2xl font-bold text-gray-800">

                            <?= $user['full_name']; ?>

                        </h3>

                        <p class="text-gray-500">

                            <?= $user['email']; ?>

                        </p>

                    </div>

                </div>

                <!-- FORM -->
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

                    <!-- ROLE -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Role

                        </label>

                        <input
                            type="text"
                            value="<?= ucfirst($user['role']); ?>"
                            disabled
                            class="w-full border border-slate-200 bg-slate-100 rounded-xl px-4 py-3 text-gray-500">

                    </div>

                    <!-- STATUS -->
                    <div>

                        <label class="block text-sm font-semibold text-gray-700 mb-2">

                            Status

                        </label>

                        <input
                            type="text"
                            value="<?= ucfirst($user['status']); ?>"
                            disabled
                            class="w-full border border-slate-200 bg-slate-100 rounded-xl px-4 py-3 text-gray-500">

                    </div>

                    <!-- BUTTON -->
                    <div class="pt-2">

                        <a
                            href="profile_update.php"
                            class="inline-block bg-blue-900 hover:bg-blue-800 text-white px-8 py-3 rounded-xl transition">

                            Update Profile

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>