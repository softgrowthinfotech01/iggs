<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

$stmt = $pdo->query("SELECT * FROM about_us LIMIT 1");
$about = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update_about'])) {

   $description = $_POST['description'];

    $imageName = $about['image'] ?? '';

    // Upload Image
    if (!empty($_FILES['image']['name'])) {

        $fileName = time() . '_' . $_FILES['image']['name'];

        $targetPath = 'images/' . $fileName;

        move_uploaded_file($_FILES['image']['tmp_name'], $targetPath);

        $imageName = $fileName;
    }

    // Update / Insert
    if ($about) {

    $update = $pdo->prepare("
        UPDATE about_us 
        SET image = ?, description = ?
        WHERE id = ?
    ");

    $update->execute([
        $imageName,
        $description,
        $about['id']
    ]);

} else {

    $insert = $pdo->prepare("
        INSERT INTO about_us (image, description)
        VALUES (?, ?)
    ");

    $insert->execute([
        $imageName,
        $description
    ]);
}

    echo "
    <script>
        alert('About Us Updated Successfully');
        window.location.href='about_us.php';
    </script>
    ";
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

            <!-- PAGE CARD -->
            <div class="bg-slate-300 rounded-2xl shadow-sm border border-gray-200 p-6">

                <!-- TITLE -->
                <div class="mb-6">

                    <h1 class="text-2xl font-bold text-gray-800">
                        About Us
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Update About Us page content
                    </p>

                </div>

                <!-- FORM -->
                <form method="POST" enctype="multipart/form-data">

                    <!-- IMAGE -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            About Image
                        </label>

                        <input
                            type="file"
                            name="image"
                            class="w-full border border-gray-600 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-900"
                        >

                        <?php if (!empty($about['image'])) : ?>

                            <div class="mt-4">

                                <img
                                    src="images/<?php echo $about['image']; ?>"
                                    alt="About Image"
                                    class="w-52 h-40 rounded-xl border object-cover"
                                >

                            </div>

                        <?php endif; ?>

                    </div>

                    <!-- DESCRIPTION -->
                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            id="editor"
                            name="description"
                            rows="10"
                            class="w-full border border-gray-600 rounded-xl p-3"
                        ><?php echo $about['description'] ?? ''; ?></textarea>

                    </div>

                    <!-- BUTTON -->
                    <div>

                        <button
                            type="submit"
                            name="update_about"
                            class="bg-blue-900 hover:bg-blue-800 text-white px-6 py-3 rounded-xl font-medium transition"
                        >
                            Update About Us
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