<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

$uploadDir = 'images/notifications/';

/* DELETE */
if (isset($_GET['delete'])) {

    $id = (int)$_GET['delete'];

    $stmt = $pdo->prepare("
        SELECT file_path
        FROM notifications
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    $notification = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($notification && !empty($notification['file_path'])) {

        $file = $uploadDir . $notification['file_path'];

        if (file_exists($file)) {
            unlink($file);
        }
    }

    $stmt = $pdo->prepare("
        DELETE FROM notifications
        WHERE id = ?
    ");

    $stmt->execute([$id]);

    header("Location: notifications.php");
    exit;
}


/* UPDATE NOTIFICATION */
if (isset($_POST['update_notification'])) {

    $id = (int)$_POST['notification_id'];
    $title = trim($_POST['notification_title']);
    $fileName = $_POST['existing_file'];

    if (!empty($_FILES['notification_file']['name'])) {

        if (!empty($fileName) && file_exists($uploadDir . $fileName)) {
            unlink($uploadDir . $fileName);
        }

        $fileName = time() . '_' . basename($_FILES['notification_file']['name']);

        move_uploaded_file(
            $_FILES['notification_file']['tmp_name'],
            $uploadDir . $fileName
        );
    }

    $stmt = $pdo->prepare("
        UPDATE notifications
        SET
            notification_title = ?,
            file_path = ?
        WHERE id = ?
    ");

    $stmt->execute([
        $title,
        $fileName,
        $id
    ]);

    header("Location: notifications.php");
    exit;
}


/* ADD NOTIFICATION */
if (isset($_POST['add_notification'])) {

    $title = trim($_POST['notification_title']);
    $fileName = null;

    if (!empty($_FILES['notification_file']['name'])) {

        $fileName = time() . '_' . basename($_FILES['notification_file']['name']);

        move_uploaded_file(
            $_FILES['notification_file']['tmp_name'],
            $uploadDir . $fileName
        );
    }

    $stmt = $pdo->prepare("
        INSERT INTO notifications (
            notification_title,
            file_path
        )
        VALUES (?, ?)
    ");

    $stmt->execute([
        $title,
        $fileName
    ]);

    header("Location: notifications.php");
    exit;
}


/* PAGINATION */

$records_per_page = 5;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

if ($page < 1) {
    $page = 1;
}

$offset = ($page - 1) * $records_per_page;

$total_records = $pdo->query("
    SELECT COUNT(*)
    FROM notifications
")->fetchColumn();

$total_pages = ceil($total_records / $records_per_page);

$stmt = $pdo->prepare("
    SELECT *
    FROM notifications
    ORDER BY id DESC
    LIMIT :limit OFFSET :offset
");

$stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

$stmt->execute();

$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-16 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col opacity-0 translate-y-6 scale-[0.98] ease-out">

    <!-- MAIN -->
    <main class="p-6 pb-10 overflow-y-auto h-[calc(100vh-140px)]">

        <div class="max-w-7xl mx-auto bg-slate-300 p-4 rounded-xl">

            <div class="p-6">

                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">
                        Notification Panel
                    </h2>
                </div>

                <form method="POST" enctype="multipart/form-data">

                    <div class="flex flex-col md:flex-row gap-4 mb-6">

                        <!-- Notification Title -->
                        <div class="flex-1">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Notification Title
                            </label>

                            <input
                                type="text"
                                name="notification_title"
                                required
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- File Upload -->
                        <div class="flex-1">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Attachment (PDF / Word / Excel)
                            </label>

                            <input
                                type="file"
                                name="notification_file"
                                accept=".pdf,.doc,.docx,.xls,.xlsx"
                                class="w-full border border-gray-600 rounded-xl px-4 py-3">

                        </div>

                        <!-- Add Button -->
                        <div class="flex items-center ">

                            <button
                                type="submit"
                                name="add_notification"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-4 rounded-xl">

                                Add

                            </button>

                        </div>

                    </div>

                </form>

                <!-- TABLE -->

                <div class="overflow-x-auto">

                    <table class="w-full bg-white border border-gray-300">

                        <thead class="bg-gray-200">

                            <tr>
                                <th class="border p-3 text-left">Sr No</th>
                                <th class="border p-3 text-left">Notification Title</th>
                                <th class="border p-3 text-left">Attachment</th>
                                <th class="border p-3 text-left">Created At</th>
                                <th class="border p-3 text-center">Actions</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php if (!empty($notifications)): ?>

                                <?php
                                $sr = $offset + 1;

                                foreach ($notifications as $row):
                                ?>

                                    <tr>

                                        <td class="border p-3">
                                            <?= $sr++ ?>
                                        </td>

                                        <td class="border p-3">
                                            <?= htmlspecialchars($row['notification_title']) ?>
                                        </td>

                                        <td class="border p-3">

                                            <?php if (!empty($row['file_path'])): ?>

                                                <a
                                                    href="images/notifications/<?= htmlspecialchars($row['file_path']) ?>"
                                                    target="_blank"
                                                    class="text-blue-600 hover:underline">

                                                    View File

                                                </a>

                                            <?php else: ?>

                                                -

                                            <?php endif; ?>

                                        </td>

                                        <td class="border p-3">
                                            <?= date('d M Y h:i A', strtotime($row['created_at'])) ?>
                                        </td>

                                        <td class="border p-3 text-center">

                                            <button
                                                type="button"
                                                onclick="openEditModal(
                            <?= $row['id'] ?>,
                            '<?= htmlspecialchars($row['notification_title'], ENT_QUOTES) ?>'
                        )"
                                                class="bg-indigo-500 hover:bg-indigo-600 text-white px-3 py-1 rounded">

                                                Edit

                                            </button>

                                            <a
                                                href="?delete=<?= $row['id'] ?>"
                                                onclick="return confirm('Delete this notification?')"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded ml-2">

                                                Delete

                                            </a>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else: ?>

                                <tr>
                                    <td colspan="5" class="border p-4 text-center">
                                        No notifications found
                                    </td>
                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                    <?php if ($total_pages > 1): ?>

                        <div class="flex justify-center mt-6">

                            <div class="flex gap-2">

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>

                                    <a href="?page=<?= $i ?>"
                                        class="px-4 py-2 rounded-lg border
                    <?= ($page == $i)
                                        ? 'bg-indigo-600 text-white border-indigo-600'
                                        : 'bg-white text-gray-700 hover:bg-gray-100' ?>">

                                        <?= $i ?>

                                    </a>

                                <?php endfor; ?>

                            </div>

                        </div>

                    <?php endif; ?>

                </div>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>

<!-- Edit Modal -->

<div
    id="editModal"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">

    <div class="bg-white rounded-lg p-6 w-full max-w-xl mx-4">

        <div class="flex justify-between items-center mb-4">

            <h2 class="text-xl font-semibold">
                Update Notification
            </h2>

            <button
                type="button"
                onclick="closeEditModal()"
                class="text-gray-500 text-xl">
                ✕
            </button>

        </div>

        <form method="POST" enctype="multipart/form-data">

            <input
                type="hidden"
                name="notification_id"
                id="editNotificationId">

            <input
                type="hidden"
                name="existing_file"
                id="editExistingFile">

            <!-- Title -->

            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Notification Title
                </label>

                <input
                    type="text"
                    name="notification_title"
                    id="editNotificationTitle"
                    required
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <!-- Current File -->

            <div class="mb-4">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Current Attachment
                </label>

                <div id="currentFileContainer">
                    <span class="text-gray-500">No file uploaded</span>
                </div>

            </div>

            <!-- New File -->

            <div class="mb-6">

                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Replace Attachment (Optional)
                </label>

                <input
                    type="file"
                    name="notification_file"
                    accept=".pdf,.doc,.docx,.xls,.xlsx"
                    class="w-full border rounded-lg px-4 py-3">

            </div>

            <div class="flex justify-end gap-2">

                <button
                    type="button"
                    onclick="closeEditModal()"
                    class="px-4 py-2 border rounded-lg">

                    Cancel

                </button>

                <button
                    type="submit"
                    name="update_notification"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg">

                    Update

                </button>

            </div>

        </form>

    </div>

</div>

<script>
    function openEditModal(id, title) {
        document.getElementById('editNotificationId').value = id;
        document.getElementById('editNotificationTitle').value = title;

        document.getElementById('editModal').classList.remove('hidden');
        document.getElementById('editModal').classList.add('flex');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.add('hidden');
        document.getElementById('editModal').classList.remove('flex');
    }
</script>

<!-- Edit Modal -->

<!-- SCRIPT -->
<script>
    let imageCount = 1;
    const maxImages = 7;

    document.getElementById('addImageBtn').addEventListener('click', function() {

        if (imageCount >= maxImages) {

            alert('Maximum 7 images allowed');
            return;
        }

        imageCount++;

        const container = document.getElementById('imageContainer');

        const newRow = document.createElement('div');

        newRow.className = 'image-row flex items-center gap-3 mt-3';

        newRow.innerHTML = `

            <input
                type="file"
                name="slider_images[]"
                accept="image/*"
                style="padding:4px;"
                class="w-full border border-gray-600 rounded-lg px-4 py-2"
            >

            <button
                type="button"
                class="removeBtn w-11 h-8 py-2 text-white rounded-lg text-xl flex items-center justify-center"
                style="background-color: #dc2626;"
                onmouseover="this.style.backgroundColor='#b91c1c'"
                onmouseout="this.style.backgroundColor='#dc2626'"
            >
                -
            </button>

        `;

        container.appendChild(newRow);

        // REMOVE INPUT FIELD
        newRow.querySelector('.removeBtn').addEventListener('click', function() {

            newRow.remove();
            imageCount--;

        });

    });
</script>