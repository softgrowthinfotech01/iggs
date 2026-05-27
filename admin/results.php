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
if (isset($_POST['save_result'])) {

    $student_name = trim($_POST['student_name']);
    $rank_position = trim($_POST['rank_position']);
    $roll_no = trim($_POST['roll_no']);
    $obtained_marks = trim($_POST['obtained_marks']);
    $total_marks = trim($_POST['total_marks']);
    $percentage = trim($_POST['percentage']);
    $student_title = trim($_POST['student_title']);
    $status = trim($_POST['status']);

    $is_featured = isset($_POST['is_featured']) ? 1 : 0;

    $imageName = '';

    // IMAGE UPLOAD
    if (!empty($_FILES['student_image']['name'])) {

        $imageName = time() . '_' . $_FILES['student_image']['name'];

        $targetPath = "images/results/" . $imageName;

        move_uploaded_file($_FILES['student_image']['tmp_name'], $targetPath);
    }

    // ONLY ONE FEATURED TOPPER
    if ($is_featured == 1) {

        $pdo->query("UPDATE results SET is_featured = 0");
    }

    // INSERT
    $stmt = $pdo->prepare("INSERT INTO results 
    (
        student_name,
        rank_position,
        roll_no,
        obtained_marks,
        total_marks,
        percentage,
        student_title,
        status,
        student_image,
        is_featured
    )
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->execute([
        $student_name,
        $rank_position,
        $roll_no,
        $obtained_marks,
        $total_marks,
        $percentage,
        $student_title,
        $status,
        $imageName,
        $is_featured
    ]);

    header("Location: results.php?success=Result Added Successfully");
    exit;
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-16 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col">

    <!-- MAIN -->
    <main class="p-6 pb-10">

        <div class="max-w-7xl mx-auto bg-slate-300 p-4 rounded-xl">

            <!-- PAGE CARD -->
            <div class="p-3">

                <!-- PAGE TITLE -->
                <div class="mb-6">

                    <h2 class="text-2xl font-semibold text-gray-800">
                        Add Student Result
                    </h2>

                </div>

                <!-- FORM -->
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                        <!-- STUDENT NAME -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Student Name
                            </label>

                            <input
                                type="text"
                                name="student_name"
                                required
                                placeholder="Enter student name"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- RANK -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Rank
                            </label>

                            <input
                                type="number"
                                name="rank_position"
                                required
                                placeholder="Enter rank"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- ROLL NUMBER -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Roll Number
                            </label>

                            <input
                                type="text"
                                name="roll_no"
                                required
                                placeholder="Enter roll number"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- OBTAINED MARKS -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Obtained Marks
                            </label>

                            <input
                                type="text"
                                name="obtained_marks"
                                required
                                placeholder="490"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- TOTAL MARKS -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Total Marks
                            </label>

                            <input
                                type="text"
                                name="total_marks"
                                required
                                placeholder="500"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- PERCENTAGE -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Percentage
                            </label>

                            <input
                                type="text"
                                name="percentage"
                                required
                                placeholder="98%"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- TITLE -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Student Title
                            </label>

                            <input
                                type="text"
                                name="student_title"
                                required
                                placeholder="School Topper"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- STATUS -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Status
                            </label>

                            <select
                                name="status"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                                <option value="PASS">PASS</option>
                                <option value="FAIL">FAIL</option>

                            </select>

                        </div>

                        <!-- IMAGE -->
                        <div>

                            <label class="text-sm font-medium block text-gray-700 mb-2">
                                Student Image
                            </label>

                            <input
                                type="file"
                                name="student_image"
                                accept="image/*"
                                required
                                class="w-full border border-gray-600 rounded-xl px-4 py-2 bg-white">

                        </div>

                        <!-- FEATURED -->
                        <div class="flex items-center gap-3 mt-8">

                            <input
                                type="checkbox"
                                name="is_featured"
                                value="1"
                                class="w-5 h-5">

                            <label class="text-sm font-medium text-gray-700">
                                Topper
                            </label>

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

    </main>

    <!-- RESULT TABLE -->
    <div class="bg-white rounded-2xl px-6 pb-2 shadow mx-6 mb-10">

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