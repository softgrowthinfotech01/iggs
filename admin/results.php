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

    // GET IMAGE
    $stmt = $pdo->prepare("SELECT * FROM results WHERE id = ?");
    $stmt->execute([$id]);

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // DELETE IMAGE
    if ($result && file_exists("images/results/" . $result['student_image'])) {

        unlink("images/results/" . $result['student_image']);
    }

    // DELETE RECORD
    $stmt = $pdo->prepare("DELETE FROM results WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: results.php");
    exit;
}

/* SAVE RESULT */
/* SAVE RESULT */
if (isset($_POST['save_result'])) {

    $result_year = trim($_POST['result_year']);
    $student_name = trim($_POST['student_name']);
    $rank_position = trim($_POST['rank_position']);
    $percentage = trim($_POST['percentage']);

    $imageName = '';

    // IMAGE UPLOAD
    if (!empty($_FILES['student_image']['name'])) {

        $imageName = time() . '_' . $_FILES['student_image']['name'];

        $targetPath = "images/results/" . $imageName;

        move_uploaded_file(
            $_FILES['student_image']['tmp_name'],
            $targetPath
        );
    }

    // CHECK DUPLICATE RANK
    $rankCheck = $pdo->prepare("
        SELECT id
        FROM results
        WHERE result_year = ?
        AND rank_position = ?
    ");

    $rankCheck->execute([
        $result_year,
        $rank_position
    ]);

    if ($rankCheck->fetch()) {

        header("Location: results.php?error=Rank already exists for this year");
        exit;
    }

    // MAX 3 STUDENTS PER YEAR
    $checkStmt = $pdo->prepare("
        SELECT COUNT(*)
        FROM results
        WHERE result_year = ?
    ");

    $checkStmt->execute([$result_year]);

    if ($checkStmt->fetchColumn() >= 3) {

        header("Location: results.php?error=Maximum 3 students allowed per year");
        exit;
    }

    // INSERT
    $stmt = $pdo->prepare("
        INSERT INTO results
        (
            result_year,
            student_name,
            rank_position,
            percentage,
            student_image
        )
        VALUES (?, ?, ?, ?, ?)
    ");

    $stmt->execute([
        $result_year,
        $student_name,
        $rank_position,
        $percentage,
        $imageName
    ]);

    header("Location: results.php?success=Result Added Successfully");
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

                    Result Entry

                </button>

                <!-- RESULT TABLE TAB -->
                <button
                    id="tableTab"
                    onclick="showTab('table')"
                    class="tab-btn px-10 py-3 rounded-xl bg-slate-200 text-slate-600 font-bold transition">

                    Result Table

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

                            <!-- STUDENT NAME -->
                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Student Name
                                </label>

                                <input
                                    type="text"
                                    name="student_name"
                                    required
                                    placeholder="Enter student name"
                                    class="w-full border border-gray-600 rounded-xl px-4 py-3">

                            </div>

                            <!-- YEAR -->
                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Year
                                </label>

                                <select
                                    name="result_year"
                                    required
                                    class="w-full border border-gray-600 rounded-xl px-4 py-3">

                                    <option value="">Select Year</option>

                                    <?php
                                    $currentYear = date('Y');

                                    for ($year = $currentYear; $year >= ($currentYear - 3); $year--) {
                                    ?>

                                        <option value="<?php echo $year; ?>">
                                            <?php echo $year; ?>
                                        </option>

                                    <?php } ?>

                                </select>

                            </div>

                            <!-- RANK -->
                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Rank
                                </label>

                                <select
                                    name="rank_position"
                                    required
                                    class="w-full border border-gray-600 rounded-xl px-4 py-3">

                                    <option value="">Select Rank</option>
                                    <option value="1">Rank 1</option>
                                    <option value="2">Rank 2</option>
                                    <option value="3">Rank 3</option>

                                </select>

                            </div>

                            <!-- PERCENTAGE -->
                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Percentage
                                </label>

                                <input
                                    type="text"
                                    name="percentage"
                                    required
                                    placeholder="90"
                                    class="w-full border border-gray-600 rounded-xl px-4 py-3">

                            </div>

                            <!-- IMAGE -->
                            <div>

                                <label class="text-sm font-medium block text-gray-700 mb-1">
                                    Student Image
                                </label>

                                <input
                                    type="file"
                                    name="student_image"
                                    accept="image/*"
                                    required
                                    class="w-full border border-gray-600 rounded-xl px-4 py-2 bg-white">

                            </div>



                        </div>

                        <!-- SUBMIT -->
                        <div class="mt-8">

                            <button
                                type="submit"
                                name="save_result"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">

                                Save Result

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

                                    <th class="p-3 text-left border">Year</th>
                                    <th class="p-3 text-left border">Rank</th>
                                    <th class="p-3 text-left border">Image</th>
                                    <th class="p-3 text-left border">Student</th>
                                    <th class="p-3 text-left border">Percentage</th>
                                    <th class="p-3 text-center border">Action</th>

                                </tr>

                            </thead>

                            <tbody>

                                <?php

                                $recordsPerPage = 5;

                                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

                                if ($page < 1) {
                                    $page = 1;
                                }

                                $offset = ($page - 1) * $recordsPerPage;

                                $totalRecords = $pdo->query("
    SELECT COUNT(*)
    FROM results
")->fetchColumn();

                                $totalPages = ceil($totalRecords / $recordsPerPage);

                                // TOTAL RECORDS
                                $stmt = $pdo->prepare("
    SELECT *
    FROM results
    ORDER BY result_year DESC, rank_position ASC
    LIMIT :limit OFFSET :offset
");

                                $stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
                                $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

                                $stmt->execute();

                                $resultData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                $count = $offset + 1;

                                foreach ($resultData as $row) {

                                ?>

                                    <tr class="hover:bg-slate-50">

                                        <td class="p-3 border">
                                            <?php echo $row['result_year']; ?>
                                        </td>

                                        <td class="p-3 border">
                                            #<?php echo $row['rank_position']; ?>
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
                                            <?php echo $row['percentage']; ?>%
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

                        <?php if ($totalPages > 1): ?>

                            <div class="flex justify-center items-center gap-2 mt-6">

                                <?php if ($page > 1): ?>
                                    <a href="?page=<?php echo $page - 1; ?>"
                                        class="px-4 py-2 bg-slate-600 text-white rounded-lg hover:bg-slate-700">
                                        Prev
                                    </a>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPages; $i++): ?>

                                    <a href="?page=<?php echo $i; ?>"
                                        class="px-4 py-2 rounded-lg
            <?php echo ($i == $page)
                                        ? 'bg-indigo-600 text-white'
                                        : 'bg-slate-200 text-slate-700 hover:bg-slate-300'; ?>">

                                        <?php echo $i; ?>

                                    </a>

                                <?php endfor; ?>

                                <?php if ($page < $totalPages): ?>
                                    <a href="?page=<?php echo $page + 1; ?>"
                                        class="px-4 py-2 bg-slate-600 text-white rounded-lg hover:bg-slate-700">
                                        Next
                                    </a>
                                <?php endif; ?>

                            </div>

                        <?php endif; ?>

                    </div>

                </div>

            </div>

        </div>

    </main>

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

<?php include 'footer.php' ?>