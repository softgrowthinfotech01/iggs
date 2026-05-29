<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}
?>

<?php

require_once 'conn.php';

/* RESULTS */
$resultsQuery = $pdo->query("SELECT COUNT(*) FROM results");
$totalResults = $resultsQuery->fetchColumn();

/* ADMISSION */
$admissionQuery = $pdo->query("SELECT COUNT(*) FROM admission_enquiry");
$totalAdmissions = $admissionQuery->fetchColumn();

/* CONTACT */
$contactQuery = $pdo->query("SELECT COUNT(*) FROM contact_us");
$totalContacts = $contactQuery->fetchColumn();

/* SLIDER */
$sliderQuery = $pdo->query("SELECT COUNT(*) FROM slider_images");
$totalSliders = $sliderQuery->fetchColumn();

?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class=" relative pt-20 lg:pl-60 bg-slate-100 transition-all duration-300 min-h-screen flex flex-col opacity-0 translate-y-6 scale-[0.98] ease-out">

     <!-- Background Logo -->
    <div class="absolute inset-0 pointer-events-none z-0"
        style="
            background-image:url('images/1779876371_IG_logo_transparent.png');
            background-repeat:no-repeat;
            background-position:center 350px;
            background-size:350px;
            margin-left: 150px;
        ">
    </div>

    <!-- MAIN -->
    <main class="relative p-6 pb-10 overflow-y-auto h-[calc(100vh-140px)]">

        <div class="max-w-7xl mx-auto">

            <!-- TITLE -->
            <div class="mb-6">

                <h2 class="text-3xl font-bold text-gray-800">
                    Dashboard
                </h2>

                <p class="text-lg text-gray-800 mt-1">
                    Welcome back to Indira Gandhi Garden School ERP
                </p>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

                <a href="results">
                    <div class="bg-cyan-300 border border-slate-200 rounded-2xl p-6 shadow-xl hover:shadow-md transition">
                        <p class="text-lg text-gray-800">Toppers</p>
                        <h1 class="text-4xl font-bold text-blue-900 mt-2">
                            <?= $totalResults ?>
                        </h1>
                    </div>
                </a>

                <a href="admission">
                    <div class="bg-pink-400 border border-slate-200 rounded-2xl p-6 shadow-xl hover:shadow-md transition">
                        <p class="text-lg text-gray-800">Admission enquiries</p>
                        <h1 class="text-4xl font-bold text-blue-900 mt-2">
                            <?= $totalAdmissions ?>
                        </h1>
                    </div>
                </a>

                <a href="contact_us">
                    <div class="bg-emerald-400 border border-slate-200 rounded-2xl p-6 shadow-xl hover:shadow-md transition">
                        <p class="text-lg text-gray-800">Contact enquiries</p>
                        <h1 class="text-4xl font-bold text-blue-900 mt-2">
                            <?= $totalContacts ?>
                        </h1>
                    </div>
                </a>

                <a href="slider_images">
                    <div class="bg-orange-400 border border-slate-200 rounded-2xl p-6 shadow-xl hover:shadow-md transition">
                        <p class="text-lg text-gray-800">Manage Slider</p>
                        <h1 class="text-4xl font-bold text-blue-900 mt-2">
                            <?= $totalSliders ?>
                        </h1>
                    </div>
                </a>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>