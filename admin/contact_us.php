<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

$search = $_GET['search'] ?? '';

$query = "
SELECT *
FROM contact_us
WHERE 1
";

$params = [];

if ($search != '') {

    $query .= " AND name LIKE :search ";

    $params[':search'] = "%$search%";
}

$query .= " ORDER BY id DESC";

$stmt = $pdo->prepare($query);
$stmt->execute($params);

$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-20 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col opacity-0 translate-y-6 scale-[0.98] ease-out">

    <!-- MAIN -->
    <main class="p-6 pb-10 overflow-y-auto h-[calc(100vh-140px)]">

        <div class="max-w-7xl mx-auto">

            <!-- PAGE CARD -->
            <div class="bg-slate-300 rounded-2xl shadow-sm border border-gray-200 p-6">

                <!-- TOP SECTION -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6 w-full">

                    <div>

                        <h1 class="text-2xl font-bold text-gray-800">
                            Contact Us Records
                        </h1>

                        <p class="text-sm text-gray-500 mt-1">
                            Manage all contact messages received from website
                        </p>

                    </div>

                    <!-- SEARCH -->
                    <form method="GET">

                        <input
                            type="text"
                            name="search"
                            value="<?php echo $search; ?>"
                            placeholder="Search by name"
                            class="border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900 w-72">

                    </form>

                </div>

                <!-- TABLE -->
                <div class="overflow-x-auto rounded-xl">

                    <table class="w-full border-collapse">

                        <!-- HEAD -->
                        <thead>

                            <tr class="bg-blue-600 text-white">

                                <th class="px-4 py-3 text-left">ID</th>

                                <th class="px-4 py-3 text-left">Name</th>

                                <th class="px-4 py-3 text-left">Email</th>

                                <th class="px-4 py-3 text-left">Mobile</th>

                                <th class="px-4 py-3 text-left">Message</th>

                                <th class="px-4 py-3 text-left">Date</th>

                                <th class="px-4 py-3 text-left">Action</th>

                            </tr>

                        </thead>

                        <!-- BODY -->
                        <tbody class="bg-white">

                            <?php if (count($contacts) > 0) { ?>

                                <?php foreach ($contacts as $contact) { ?>

                                    <tr class="border-b border-gray-200 hover:bg-gray-50">

                                        <td class="px-4 py-4">
                                            <?php echo $contact['id']; ?>
                                        </td>

                                        <td class="px-4 py-4 font-medium text-gray-800">
                                            <?php echo $contact['name']; ?>
                                        </td>

                                        <td class="px-4 py-4">
                                            <?php echo $contact['email']; ?>
                                        </td>

                                        <td class="px-4 py-4">
                                            <?php echo $contact['mobile']; ?>
                                        </td>

                                        <td class="px-4 py-4 max-w-[250px] truncate">
                                            <?php echo $contact['message']; ?>
                                        </td>

                                        <td class="px-4 py-4">
                                            <?php echo date('d M Y', strtotime($contact['created_at'])); ?>
                                        </td>

                                        <td class="px-4 py-4">

                                            <a
                                                href="delete-contact.php?id=<?php echo $contact['id']; ?>"
                                                class="bg-red-100 text-red-600 px-4 py-2 rounded-lg hover:bg-red-200 transition">

                                                Delete

                                            </a>

                                        </td>

                                    </tr>

                                <?php } ?>

                            <?php } else { ?>

                                <tr>

                                    <td colspan="7" class="px-4 py-10 text-center text-gray-500">

                                        No records found

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>