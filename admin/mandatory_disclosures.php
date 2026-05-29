<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

/* DELETE RESULT */
if (isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $stmt = $pdo->prepare("SELECT * FROM mandatory_disclosures WHERE id = ?");
    $stmt->execute([$id]);

    $record = $stmt->fetch(PDO::FETCH_ASSOC);

    if (
        $record &&
        file_exists("images/mandatory_disclosures/" . $record['file_path'])
    ) {
        unlink("images/mandatory_disclosures/" . $record['file_path']);
    }

    $stmt = $pdo->prepare("DELETE FROM mandatory_disclosures WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: mandatory_disclosures.php?deleted=1");
    exit;
}

/* SAVE RESULT */
if (isset($_POST['save_document'])) {

    $title = trim($_POST['title']);

    $fileName = '';

    if (!empty($_FILES['document_file']['name'])) {

        $fileName = time() . '_' . $_FILES['document_file']['name'];

        move_uploaded_file(
            $_FILES['document_file']['tmp_name'],
            "images/mandatory_disclosures/" . $fileName
        );
    }

    $stmt = $pdo->prepare("
        INSERT INTO mandatory_disclosures
        (
            title,
            file_path
        )
        VALUES
        (
            ?,
            ?
        )
    ");

    $stmt->execute([
        $title,
        $fileName
    ]);

    header("Location: mandatory_disclosures.php?saved=1");
    exit;
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-16 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col opacity-0 translate-y-6 scale-[0.98] ease-out">

    <!-- MAIN -->
    <main class="p-6 pb-10">

        <div class="max-w-7xl mx-auto bg-slate-300 p-4 rounded-xl">

        

            <!-- TABS -->
            <div class="flex justify-between mb-6 px-10">

                <!-- RESULT ENTRY TAB -->
                <button
                    id="entryTab"
                    onclick="showTab('entry')"
                    class="tab-btn px-10 py-3 rounded-xl bg-white text-indigo-700 font-bold shadow transition">

                    Document Entry

                </button>

                <!-- RESULT TABLE TAB -->
                <button
                    id="tableTab"
                    onclick="showTab('table')"
                    class="tab-btn px-10 py-3 rounded-xl bg-slate-200 text-slate-600 font-bold transition">

                    Document Table

                </button>

            </div>

            <!-- ========================= -->
            <!-- RESULT ENTRY SECTION -->
            <!-- ========================= -->

            <div id="entrySection">

                <!-- PAGE CARD -->
                <div class="p-2">

                    <!-- PAGE TITLE -->
                    <div class="mb-6">

                        <h2 class="text-2xl font-semibold text-gray-800">
                            Add Student Result
                        </h2>

                    </div>

                    <!-- FORM -->
                    <form action="" method="POST" enctype="multipart/form-data">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Document Title
                                </label>

                                <input
                                    type="text"
                                    name="title"
                                    required
                                    placeholder="Enter document title"
                                    class="w-full border border-gray-600 rounded-xl px-4 py-3">

                            </div>

                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Upload File
                                </label>

                                <input
                                    type="file"
                                    name="document_file"
                                    required
                                    class="w-full border border-gray-600 rounded-xl px-4 py-2 bg-white">

                                <p class="text-xs text-gray-500 mt-2">
                                    Documents appear on website in the same order they are uploaded.
                                </p>

                            </div>

                        </div>

                        <!-- SUBMIT -->
                        <div class="mt-8">

                            <button
                                type="submit"
                                name="save_document"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">

                                Save Document

                            </button>

                        </div>

                    </form>

                </div>

            </div>

            <!-- ========================= -->
            <!-- RESULT TABLE SECTION -->
            <!-- ========================= -->

            <div id="tableSection" class="hidden">

                <div class="bg-white rounded-xl px-6 py-2 shadow">

                    <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                        Result Records
                    </h2>

                    <div class="overflow-x-auto">

                        <table class="w-full border border-gray-300">

                            <thead class="bg-slate-200">

                                <tr>
                                    <th class="p-3 text-left border">Sr No</th>
                                    <th class="p-3 text-left border">Title</th>
                                    <th class="p-3 text-left border">File</th>
                                    <th class="p-3 text-left border">Created</th>
                                    <th class="p-3 text-center border">Action</th>
                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $stmt = $pdo->query("
    SELECT *
    FROM mandatory_disclosures
    ORDER BY id ASC
");

                                $resultData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $count = 1;

                                foreach ($resultData as $row) {

                                ?>

                                    <tr class="hover:bg-slate-50">

                                        <td class="p-3 border">
                                            <?php echo $count++; ?>
                                        </td>

                                        <td class="p-3 border">
                                            <?php echo htmlspecialchars($row['title']); ?>
                                        </td>

                                        <td class="p-3 border">

                                            <a
                                                href="images/mandatory_disclosures/<?php echo $row['file_path']; ?>"
                                                target="_blank"
                                                class="text-blue-600 font-semibold">

                                                View File

                                            </a>

                                        </td>

                                        <td class="p-3 border">
                                            <?php echo date('d M Y', strtotime($row['created_at'])); ?>
                                        </td>

                                        <td class="p-3 border text-center">

                                            <a
                                                href="mandatory_disclosures.php?delete=<?php echo $row['id']; ?>"
                                                onclick="return confirm('Delete this document?')"
                                                class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">

                                                Delete

                                            </a>

                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </main>

    <div id="tableSection" class="hidden">
        <!-- RESULT TABLE -->
        <div id="resultTable" class="bg-white rounded-2xl px-6 pb-2 shadow mx-6 mb-10">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Result Records
            </h2>

            <div class="overflow-x-auto">

                <table class="w-full border border-gray-300">

                    <thead class="bg-slate-200">

                        <tr>

                            <th class="p-3 text-left border">Sr No</th>
                            <th class="p-3 text-left border">Image</th>
                            <th class="p-3 text-left border">Student</th>
                            <th class="p-3 text-left border">Rank</th>
                            <th class="p-3 text-left border">Percentage</th>
                            <th class="p-3 text-left border">Topper</th>
                            <th class="p-3 text-center border">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php

                        $stmt = $pdo->query("SELECT * FROM results ORDER BY rank_position ASC");

                        $resultData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $count = 1;

                        foreach ($resultData as $row) {

                        ?>

                            <tr class="hover:bg-slate-50">

                                <td class="p-3 border">
                                    <?php echo $count++; ?>
                                </td>

                                <td class="p-3 border">

                                    <img
                                        src="images/results/<?php echo $row['student_image']; ?>"
                                        class="w-20 h-20 object-cover rounded-lg border">

                                </td>

                                <td class="p-3 border">
                                    <?php echo $row['student_name']; ?>
                                </td>

                                <td class="p-3 border">
                                    #<?php echo $row['rank_position']; ?>
                                </td>

                                <td class="p-3 border">
                                    <?php echo $row['percentage']; ?>
                                </td>

                                <td class="p-3 border">

                                    <?php if ($row['is_featured'] == 1) { ?>

                                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm">
                                            Yes
                                        </span>

                                    <?php } else { ?>

                                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm">
                                            No
                                        </span>

                                    <?php } ?>

                                </td>

                                <td class="p-3 border text-center">

                                    <a
                                        href="results.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Delete this result?')"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">

                                        Delete

                                    </a>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>

                </table>

            </div>

        </div>
    </div>

</div>

<!-- TAB SCRIPT -->
<script>
    function showTab(tab) {

        const entrySection = document.getElementById('entrySection');
        const tableSection = document.getElementById('tableSection');

        const entryTab = document.getElementById('entryTab');
        const tableTab = document.getElementById('tableTab');

        // RESET BOTH TABS
        entryTab.className =
            'tab-btn px-10 py-3 rounded-xl bg-slate-200 text-slate-600 font-bold transition';

        tableTab.className =
            'tab-btn px-10 py-3 rounded-xl bg-slate-200 text-slate-600 font-bold transition';

        // SHOW ENTRY
        if (tab === 'entry') {

            entrySection.classList.remove('hidden');
            tableSection.classList.add('hidden');

            entryTab.className =
                'tab-btn px-10 py-3 rounded-xl bg-white text-indigo-700 font-bold shadow transition';

        }

        // SHOW TABLE
        else {

            tableSection.classList.remove('hidden');
            entrySection.classList.add('hidden');

            tableTab.className =
                'tab-btn px-10 py-3 rounded-xl bg-white text-indigo-700 font-bold shadow transition';

        }

    }
</script>

<?php if(isset($_GET['saved'])) { ?>

<div id="toast"
    class="fixed top-5 right-5 bg-indigo-500 text-white px-6 py-3 rounded-lg shadow-lg z-50">

    Document saved successfully!

</div>

<!-- Save and Delete popup -->
<script>
setTimeout(() => {
    document.getElementById('toast').remove();
}, 3000);
</script>

<?php } ?>

<?php if(isset($_GET['deleted'])) { ?>

<div id="toast"
    class="fixed top-5 right-5 bg-red-600 text-white px-6 py-3 rounded-lg shadow-lg z-50">

    Document deleted successfully!

</div>

<script>
setTimeout(() => {
    document.getElementById('toast').remove();
}, 3000);
</script>

<?php } ?>
<!-- Save and Delete popup -->

<?php include 'footer.php' ?>