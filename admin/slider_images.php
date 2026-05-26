<?php

session_start();

if (!isset($_SESSION['admin'])) {

    header("Location: login.php?error=Please login first");
    exit;
}
?>

<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<!-- PAGE WRAPPER -->
<div id="mainContent"
    class="pt-16 lg:pl-60 transition-all duration-300 min-h-screen flex flex-col">

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
                <form action="" method="POST" enctype="multipart/form-data" class="">

                    <!-- TITLE -->
                    <div class="mb-6 ">

                        <label class="text-sm font-medium block text-gray-700 mb-2">
                            Slider Title
                        </label>

                        <input
                            type="text"
                            name="title"
                            placeholder="Enter slider title"
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
                            <div class="image-row flex items-center gap-3 mb-3">

                                <input
                                    type="file"
                                    name="slider_images[]"
                                    accept="image/*"
                                    style="padding:4px;"
                                    class="w-full border border-gray-600 rounded-lg px-4 py-2">

                            </div>

                        </div>

                        <p class="text-sm text-gray-500 mt-2">
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