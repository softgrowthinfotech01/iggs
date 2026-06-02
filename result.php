<?php
include 'admin/conn.php';
?>

<?php

$topperStmt = $pdo->query("
    SELECT * FROM results
    WHERE is_featured = 1
    LIMIT 1
");

$topper = $topperStmt->fetch(PDO::FETCH_ASSOC);

?>

<?php

$resultStmt = $pdo->query("
    SELECT * FROM results
    ORDER BY rank_position ASC
    LIMIT 6
");

$students = $resultStmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results | Indira Gandhi School Chandrapur</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-white overflow-x-hidden">

        <?php include 'header.php' ?>


   <!-- YEAR WISE RESULT UI ONLY -->

<section class="relative py-24 mt-20 bg-white overflow-hidden">

    <div class="absolute top-20 right-10 w-72 h-72 bg-[#AE1C21]/10 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-10 left-10 w-80 h-80 bg-[#FACC15]/30 blur-[120px] rounded-full"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="text-center max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 text-black bg-[#FACC15] px-6 py-1 rounded-full font-black uppercase tracking-widest">
                <i class="fa-solid fa-trophy"></i>
                Result Archive
            </span>
   <h2 class="mt-5 text-3xl lg:text-6xl font-black text-black leading-tight">
                Year Wise Student Results
            </h2>

            <p class="mt-5 text-slate-600 leading-8 text-lg">
                Click year button to view particular year result list.
            </p>
        </div>

        <!-- YEAR BUTTONS -->
        <div class="mt-12 flex flex-wrap justify-center gap-4">
            <button onclick="showResultYear('2026', this)" class="yearBtn bg-[#AE1C21] text-white px-8 py-4 rounded-full font-black shadow-xl transition duration-500">
                2026 Result
            </button>

            <button onclick="showResultYear('2025', this)" class="yearBtn bg-[#FACC15] text-black px-8 py-4 rounded-full font-black shadow-xl transition duration-500">
                2025 Result
            </button>

            <button onclick="showResultYear('2024', this)" class="yearBtn bg-[#FACC15] text-black px-8 py-4 rounded-full font-black shadow-xl transition duration-500">
                2024 Result
            </button>
        </div>

        <!-- 2026 RESULT -->
        <div class="resultYearBox mt-16" id="result-2026">

            <h3 class="text-4xl font-black text-black mb-8">
                2026 Result List
            </h3>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.10)] hover:-translate-y-4 transition duration-500">
                    <div class="relative h-[330px] overflow-hidden">
                        <img src="images/student1.jpg" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                        <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">
                            96%
                        </span>

                        <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">
                            Rank 1
                        </span>

                        <div class="absolute bottom-5 left-5 right-5">
                            <h3 class="text-3xl font-black text-white">Aarav Sharma</h3>
                            <p class="text-blue-100 font-semibold mt-2">Class 10th Topper</p>
                        </div>
                    </div>

                    <div class="p-7">
                        <div class="flex justify-between border-b pb-4">
                            <span class="font-bold text-slate-500">Roll No</span>
                            <span class="font-black">IGS2601</span>
                        </div>

                        <div class="flex justify-between border-b py-4">
                            <span class="font-bold text-slate-500">Marks</span>
                            <span class="font-black">480 / 500</span>
                        </div>

                        <div class="flex justify-between pt-4">
                            <span class="font-bold text-slate-500">Status</span>
                            <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-black text-sm">PASS</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.10)] hover:-translate-y-4 transition duration-500">
                    <div class="relative h-[330px] overflow-hidden">
                        <img src="images/student2.jpg" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                        <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">
                            94%
                        </span>

                        <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">
                            Rank 2
                        </span>

                        <div class="absolute bottom-5 left-5 right-5">
                            <h3 class="text-3xl font-black text-white">Sneha Patil</h3>
                            <p class="text-blue-100 font-semibold mt-2">Class 10th Topper</p>
                        </div>
                    </div>

                    <div class="p-7">
                        <div class="flex justify-between border-b pb-4">
                            <span class="font-bold text-slate-500">Roll No</span>
                            <span class="font-black">IGS2602</span>
                        </div>

                        <div class="flex justify-between border-b py-4">
                            <span class="font-bold text-slate-500">Marks</span>
                            <span class="font-black">470 / 500</span>
                        </div>

                        <div class="flex justify-between pt-4">
                            <span class="font-bold text-slate-500">Status</span>
                            <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-black text-sm">PASS</span>
                        </div>
                    </div>
                </div>

                <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.10)] hover:-translate-y-4 transition duration-500">
                    <div class="relative h-[330px] overflow-hidden">
                        <img src="images/student3.jpg" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                        <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">
                            92%
                        </span>

                        <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">
                            Rank 3
                        </span>

                        <div class="absolute bottom-5 left-5 right-5">
                            <h3 class="text-3xl font-black text-white">Rohan More</h3>
                            <p class="text-blue-100 font-semibold mt-2">Class 10th Topper</p>
                        </div>
                    </div>

                    <div class="p-7">
                        <div class="flex justify-between border-b pb-4">
                            <span class="font-bold text-slate-500">Roll No</span>
                            <span class="font-black">IGS2603</span>
                        </div>

                        <div class="flex justify-between border-b py-4">
                            <span class="font-bold text-slate-500">Marks</span>
                            <span class="font-black">460 / 500</span>
                        </div>

                        <div class="flex justify-between pt-4">
                            <span class="font-bold text-slate-500">Status</span>
                            <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-black text-sm">PASS</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <!-- 2025 RESULT -->
        <div class="resultYearBox hidden mt-16" id="result-2025">

            <h3 class="text-4xl font-black text-black mb-8">
                2025 Result List
            </h3>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-xl">
                    <div class="relative h-[330px] overflow-hidden">
                        <img src="images/student4.jpg" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                        <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">95%</span>
                        <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">Rank 1</span>

                        <div class="absolute bottom-5 left-5">
                            <h3 class="text-3xl font-black text-white">Priya Deshmukh</h3>
                            <p class="text-blue-100 font-semibold mt-2">Class 10th Topper</p>
                        </div>
                    </div>
                </div>

                <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-xl">
                    <div class="relative h-[330px] overflow-hidden">
                        <img src="images/student5.jpg" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                        <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">93%</span>
                        <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">Rank 2</span>

                        <div class="absolute bottom-5 left-5">
                            <h3 class="text-3xl font-black text-white">Kunal Verma</h3>
                            <p class="text-blue-100 font-semibold mt-2">Class 10th Topper</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- 2024 RESULT -->
        <div class="resultYearBox hidden mt-16" id="result-2024">

            <h3 class="text-4xl font-black text-black mb-8">
                2024 Result List
            </h3>

            <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-xl">
                    <div class="relative h-[330px] overflow-hidden">
                        <img src="images/student6.jpg" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                        <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">94%</span>
                        <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">Rank 1</span>

                        <div class="absolute bottom-5 left-5">
                            <h3 class="text-3xl font-black text-white">Anjali Meshram</h3>
                            <p class="text-blue-100 font-semibold mt-2">Class 10th Topper</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>
<script>
function showResultYear(year, clickedBtn) {

    document.querySelectorAll('.resultYearBox').forEach(box => {
        box.classList.add('hidden');
    });

    document.querySelectorAll('.yearBtn').forEach(btn => {
        btn.classList.remove('bg-[#AE1C21]', 'text-white');
        btn.classList.add('bg-[#FACC15]', 'text-black');
    });

    const targetSection = document.getElementById('result-' + year);

    targetSection.classList.remove('hidden');

    clickedBtn.classList.remove('bg-[#FACC15]', 'text-black');
    clickedBtn.classList.add('bg-[#AE1C21]', 'text-white');

    // Smooth scroll to result section
    setTimeout(() => {
        targetSection.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }, 100);

}
</script>

    <?php include 'footer.php'; ?>

</body>

</html>