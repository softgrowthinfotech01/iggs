<?php
include 'admin/conn.php';

$yearStmt = $pdo->query("
    SELECT DISTINCT result_year
    FROM results
    ORDER BY result_year DESC
");

$years = $yearStmt->fetchAll(PDO::FETCH_COLUMN);
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

    <section class="relative py-24 md:mt-20 bg-white overflow-hidden">

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

                <?php foreach ($years as $index => $year) { ?>

                    <button
                        onclick="showResultYear('<?php echo $year; ?>', this)"
                        class="yearBtn <?php echo $index == 0 ? 'bg-[#AE1C21] text-white' : 'bg-[#FACC15] text-black'; ?> px-8 py-4 rounded-full font-black shadow-xl transition duration-500">

                        <?php echo $year; ?> Result

                    </button>

                <?php } ?>

            </div>

            <?php foreach ($years as $index => $year) { ?>

                <?php

                $stmt = $pdo->prepare("
        SELECT *
        FROM results
        WHERE result_year = ?
        ORDER BY rank_position ASC
    ");

                $stmt->execute([$year]);

                $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

                ?>

                <div
                    id="result-<?php echo $year; ?>"
                    class="resultYearBox mt-16 <?php echo $index != 0 ? 'hidden' : ''; ?>">

                    <h3 class="text-4xl font-black text-black mb-8">
                        <?php echo $year; ?> Result List
                    </h3>

                    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                        <?php foreach ($students as $student) { ?>

                            <div class="rounded-[35px] overflow-hidden bg-white border border-slate-100 shadow-[0_30px_80px_rgba(15,23,42,0.10)] hover:-translate-y-4 transition duration-500">

                                <div class="relative h-[330px] overflow-hidden">

                                    <img
                                        src="admin/images/results/<?php echo $student['student_image']; ?>"
                                        class="w-full h-full object-cover">

                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 to-transparent"></div>

                                    <span class="absolute top-5 left-5 px-5 py-2 rounded-full bg-[#FACC15] text-black font-black">
                                        <?php echo $student['percentage']; ?>%
                                    </span>

                                    <span class="absolute top-5 right-5 px-5 py-2 rounded-full bg-[#AE1C21] text-white font-black">
                                        Rank <?php echo $student['rank_position']; ?>
                                    </span>

                                    <div class="absolute bottom-5 left-5 right-5">

                                        <div class="inline-block bg-[#FACC15] rounded-2xl px-5 py-3 shadow-xl">

                                            <h3 class="text-xl font-black text-slate-900">
                                                <?php echo $student['student_name']; ?>
                                            </h3>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        <?php } ?>

                    </div>

                </div>

            <?php } ?>

        </div>
    </section>
    <script>
        function showResultYear(year, button) {

            document.querySelectorAll('.resultYearBox').forEach(box => {
                box.classList.add('hidden');
            });

            const resultSection = document.getElementById('result-' + year);

            resultSection.classList.remove('hidden');

            document.querySelectorAll('.yearBtn').forEach(btn => {

                btn.classList.remove('bg-[#AE1C21]', 'text-white');
                btn.classList.add('bg-[#FACC15]', 'text-black');

            });

            button.classList.remove('bg-[#FACC15]', 'text-black');
            button.classList.add('bg-[#AE1C21]', 'text-white');

            window.scrollTo({ 
                top: resultSection.offsetTop - 70,
                behavior: 'smooth'
            });
        }
    </script>

    <?php include 'footer.php'; ?>

</body>

</html>