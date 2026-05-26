<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

if (isset($_POST['save_gallery'])) {

    $title = trim($_POST['title']);

    if (!empty($_FILES['gallery_images']['name'][0])) {

        foreach ($_FILES['gallery_images']['tmp_name'] as $key => $tmpName) {

            $imageName = time() . '_' . $_FILES['gallery_images']['name'][$key];

            $targetPath = "images/" . $imageName;

            move_uploaded_file($tmpName, $targetPath);

            $stmt = $pdo->prepare("INSERT INTO gallery (title, image) VALUES (?, ?)");

            $stmt->execute([$title, $imageName]);
        }

        header("Location: gallery.php?success=Gallery added successfully");
        exit;
    }
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
            <div class="p-6">

                <!-- PAGE TITLE -->
                <div class="mb-6">

                    <h2 class="text-2xl font-semibold text-gray-800">
                        Add Gallery
                    </h2>

                </div>

                <!-- FORM -->
                <form action="" method="POST" enctype="multipart/form-data">

                    <!-- TITLE -->
                    <div class="mb-6">

                        <label class="text-sm font-medium block text-gray-700 mb-2">
                            Gallery Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            placeholder="Enter gallery title"
                            required
                            class="w-full border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- IMAGE SECTION -->
                    <div class="mb-6">

                        <div class="flex justify-between mb-2">

                            <label class="text-sm font-medium flex items-center text-gray-700">
                                Gallery Images
                            </label>

                            <!-- ADD BUTTON -->
                            <button
                                type="button"
                                id="addImageBtn"
                                class="w-11 h-8 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-2xl flex items-center justify-center">
                                +
                            </button>

                        </div>

                        <!-- IMAGE CONTAINER -->
                        <div id="imageContainer">

                            <!-- FIRST IMAGE INPUT -->
                            <div class="image-row flex items-center gap-3 mb-3">

                                <input
                                    type="file"
                                    name="gallery_images[]"
                                    accept="image/*"
                                    required
                                    style="padding:4px;"
                                    class="w-full border border-gray-600 rounded-lg px-4 py-2">

                            </div>

                        </div>

                        <p class="text-sm text-gray-500 mt-2">
                            Maximum 10 images allowed
                        </p>

                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div>

                        <button
                            type="submit"
                            name="save_gallery"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">
                            Save Gallery
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

    <!-- GALLERY TABLE -->
    <div class=" bg-white rounded-2xl px-6 pb-2 shadow">

        <h2 class="text-2xl font-semibold text-gray-800 mb-6">
            Gallery Records
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full border border-gray-300">

                <thead class="bg-slate-200">

                    <tr>

                        <th class="p-3 text-left border">
                            Sr No
                        </th>

                        <th class="p-3 text-left border">
                            Image
                        </th>

                        <th class="p-3 text-left border">
                            Title
                        </th>

                        <th class="p-3 text-center border">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php

                    $stmt = $pdo->query("SELECT * FROM gallery ORDER BY id DESC");

                    $galleryData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    $count = 1;

                    foreach ($galleryData as $row) {

                    ?>

                        <tr class="hover:bg-slate-50">

                            <td class="p-3 border">
                                <?php echo $count++; ?>
                            </td>

                            <td class="p-3 border">

                                <img
                                    src="images/<?php echo $row['image']; ?>"
                                    class="w-24 h-16 object-cover rounded-lg border">

                            </td>

                            <td class="p-3 border">
                                <?php echo $row['title']; ?>
                            </td>

                            <td class="p-3 border text-center">

                                <a
                                    href="gallery.php?delete=<?php echo $row['id']; ?>"
                                    onclick="return confirm('Are you sure you want to delete this image?')"
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

    <?php include 'footer.php'; ?>

</div>

<!-- SCRIPT -->
<script>
    let imageCount = 1;
    const maxImages = 10;

    document.getElementById('addImageBtn').addEventListener('click', function() {

        if (imageCount >= maxImages) {

            alert('Maximum 10 images allowed');
            return;
        }

        imageCount++;

        const container = document.getElementById('imageContainer');

        const newRow = document.createElement('div');

        newRow.className = 'image-row flex items-center gap-3 mt-3';

        newRow.innerHTML = `

            <input
                type="file"
                name="gallery_images[]"
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