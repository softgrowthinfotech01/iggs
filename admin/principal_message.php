<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

$stmt = $pdo->query("SELECT * FROM principal_message LIMIT 1");
$principal = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update_principal'])) {

   $message = $_POST['message'];
   $name = $_POST['name'];
   $designation = $_POST['designation'];

    $imageName = $principal['image'] ?? '';

    // Upload Image
    if (!empty($_FILES['image']['name'])) {

        $fileName = time() . '_' . $_FILES['image']['name'];

        $targetPath = 'images/' . $fileName;

        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

        $imageName = $fileName;
    }

    // Update / Insert
    if ($principal) {

        $update = $pdo->prepare("
            UPDATE principal_message 
            SET image = ?, name = ?, designation = ?, message = ?
            WHERE id = ?
        ");

        $update->execute([
            $imageName,
            $name,
            $designation,
            $message,
            $principal['id']
        ]);

    } else {

        $insert = $pdo->prepare("
            INSERT INTO principal_message (image, name, designation, message)
            VALUES (?, ?, ?, ?)
        ");

        $insert->execute([
            $imageName,
            $name,
            $designation,
            $message
        ]);
    }

    echo "
    <script>
        alert('Principal Message Updated Successfully');
        window.location.href='principal_message.php';
    </script>
    ";
}
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

                <!-- TITLE -->
                <div class="mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">
                        Principal Message
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Update Principal Message page content
                    </p>

                </div>

                <!-- FORM -->
                <form method="POST" enctype="multipart/form-data">

                    <!-- NAME -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Principal Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="<?php echo $principal['name'] ?? ''; ?>"
                            class="w-full border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900"
                            placeholder="Enter principal name"
                            required
                        >

                    </div>

                    <!-- DESIGNATION -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Designation
                        </label>

                        <input
                            type="text"
                            name="designation"
                            value="<?php echo $principal['designation'] ?? ''; ?>"
                            class="w-full border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-900"
                            placeholder="Enter designation"
                            required
                        >

                    </div>

                    <!-- IMAGE -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Principal Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="w-full border border-gray-600 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-900"
                        >

                        <?php if (!empty($principal['image'])) : ?>

                            <div class="mt-4">

                                <img
                                    src="images/<?php echo $principal['image']; ?>"
                                    alt="Principal Image"
                                    class="w-52 h-52 rounded-xl border object-cover"
                                >

                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- MESSAGE -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Message
                        </label>

                        <textarea
                            id="editor"
                            name="message"
                            rows="10"
                            class="w-full border border-gray-600 rounded-xl p-3"
                        ><?php echo $principal['message'] ?? ''; ?></textarea>

                    </div>

                    <!-- BUTTON -->
                    <div>

                        <button
                            type="submit"
                            name="update_principal"
                            class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-3 rounded-xl font-medium transition"
                        >
                            Update Principal Message
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

    <?php include 'footer.php'; ?>

</div>

<!-- CKEDITOR -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>