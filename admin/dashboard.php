<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;

}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-20 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col">

    <!-- MAIN -->
    <main class="p-6 pb-10 overflow-y-auto h-[calc(100vh-140px)]">

        <div class="max-w-7xl mx-auto">

            <!-- TITLE -->
            <div class="mb-6">

                <h2 class="text-3xl font-bold text-gray-800">
                    Dashboard
                </h2>

                <p class="text-gray-500 mt-1">
                    Welcome back to Indira Gandhi Garden School ERP
                </p>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-gray-500">Total Students</p>
                    <h1 class="text-4xl font-bold text-blue-900 mt-2">
                        2,450
                    </h1>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-gray-500">Teachers</p>
                    <h1 class="text-4xl font-bold text-green-600 mt-2">
                        180
                    </h1>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-gray-500">Fees Collected</p>
                    <h1 class="text-4xl font-bold text-yellow-500 mt-2">
                        ₹18L
                    </h1>
                </div>

                <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm hover:shadow-md transition">
                    <p class="text-gray-500">Pending Fees</p>
                    <h1 class="text-4xl font-bold text-red-500 mt-2">
                        ₹3L
                    </h1>
                </div>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>