<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}

include 'conn.php';

/* SAVE SLIDER */
if (isset($_POST['title'])) {

    $title = trim($_POST['title']);

    // CHECK TOTAL IMAGES
    $countStmt = $pdo->query("
        SELECT COUNT(*) as total
        FROM slider_images
    ");

    $totalImages = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

    $newImagesCount = count(array_filter($_FILES['slider_images']['name']));

    if (($totalImages + $newImagesCount) > 7) {

        die("Maximum 7 slider images allowed.");
    }

    // INSERT TITLE
    $stmt = $pdo->prepare("
        INSERT INTO sliders (title)
        VALUES (?)
    ");

    $stmt->execute([$title]);

    // GET SLIDER ID
    $sliderId = $pdo->lastInsertId();

    // SAVE IMAGES
    if (!empty($_FILES['slider_images']['name'][0])) {

        foreach ($_FILES['slider_images']['tmp_name'] as $key => $tmpName) {

            $imageName =
                time() . '_' .
                $_FILES['slider_images']['name'][$key];

            $targetPath =
                __DIR__ . "/images/" . $imageName;

            move_uploaded_file(
                $tmpName,
                $targetPath
            );

            // SAVE IMAGE
            $stmt = $pdo->prepare("
                INSERT INTO slider_images (
                    slider_id,
                    image
                )
                VALUES (?, ?)
            ");

            $stmt->execute([
                $sliderId,
                $imageName
            ]);
        }

        header("Location: slider_images.php");
        exit;
    }
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-16 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col opacity-0 translate-y-6 scale-[0.98] ease-out">

    <!-- MAIN -->
    <main class="p-6 pb-10 overflow-y-auto h-[calc(100vh-140px)]">

        <div class="max-w-7xl mx-auto bg-slate-300 p-4 rounded-xl">

            <!-- PAGE CARD -->
            <div class="p-6">

                <!-- PAGE TITLE -->
                <div class="mb-6">

                    <h2 class="text-2xl font-semibold text-gray-800">
                        Add Slider
                    </h2>

                </div>

                <!-- FORM -->
                <form action=""
                    method="POST"
                    enctype="multipart/form-data">

                    <!-- TITLE -->
                    <div class="mb-6">

                        <label class="text-sm font-medium block text-gray-700 mb-2">
                            Slider Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            placeholder="Enter slider title"
                            required
                            class="w-full border border-gray-600 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    </div>

                    <!-- IMAGE SECTION -->
                    <div class="mb-6">

                        <div class="flex justify-between mb-2">

                            <label class="text-sm font-medium flex items-center justify-center text-gray-700">
                                Slider Images
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
                            <div class="image-row flex items-center gap-3 mt-3">

                                <input
                                    type="file"
                                    name="slider_images[]"
                                    accept="image/*"
                                    style="padding:4px;"
                                    class="w-full border border-gray-600 rounded-lg px-4 py-2"
                                    required>

                            </div>

                        </div>

                        <p class="text-sm text-gray-600 mt-3">
                            Maximum 7 images allowed
                        </p>

                    </div>

                    <!-- SUBMIT BUTTON -->
                    <div>

                        <button
                            type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg transition">

                            Save Slider

                        </button>

                    </div>

                </form>

            </div>

        </div>

        <!-- SLIDER TABLE -->
        <div class="mt-4 bg-white rounded-2xl p-6 shadow-2xl">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Slider Records
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

                        $stmt = $pdo->query("
                                    SELECT 
                                        slider_images.id,
                                        sliders.title,
                                        slider_images.image
                                    FROM slider_images
                                    INNER JOIN sliders
                                    ON sliders.id = slider_images.slider_id
                                    ORDER BY slider_images.id DESC
                                ");

                        $sliderData = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        $count = 1;

                        foreach ($sliderData as $row) {

                        ?>

                            <tr class="hover:bg-slate-50">

                                <td class="p-3 border">
                                    <?php echo $count++; ?>
                                </td>

                                <td class="p-3 border">

                                    <img
                                        src="images/<?php echo $row['image']; ?>"
                                        class="w-28 h-16 object-cover rounded-lg border">

                                </td>

                                <td class="p-3 border">
                                    <?php echo $row['title']; ?>
                                </td>

                                <td class="p-3 border text-center">

                                    <a
                                        href="slider_images.php?delete=<?php echo $row['id']; ?>"
                                        onclick="return confirm('Delete this image?')"
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

    </main>

    <?php include 'footer.php'; ?>

</div>

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