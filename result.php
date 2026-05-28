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

    <?php
    $pageTitle = 'Results | Indira Gandhi School Chandrapur';
    include 'header.php';
    ?>

    <main class="overflow-hidden bg-white">

        <!-- RESULT BANNER -->
        <section class="relative pt-32 pb-24 overflow-hidden bg-gradient-to-br  mt-10 from-blue-900 via-blue-700 to-cyan-900">

            <div class="absolute -top-24 -left-24 w-[420px] h-[420px] bg-cyan-300/20 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-0 right-0 w-[420px] h-[420px] bg-white/10 blur-[120px] rounded-full"></div>

            <div class="absolute top-10 left-10 w-40 h-40 border-[12px] border-white/10 rounded-[40px] rotate-12 animate-pulse"></div>
            <div class="absolute bottom-10 right-10 w-52 h-52 border-[14px] border-cyan-200/10 rounded-full"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">

                <div class="grid lg:grid-cols-[1fr_.9fr] mt-20 gap-14 items-center">

                    <div>

                        <span class="inline-flex items-center gap-2 mt-4 px-6 py-3 rounded-full bg-[#FACC15] backdrop-blur-xl border border-white/20 text-black font-black uppercase tracking-widest text-sm">
                            <i class="fa-solid fa-award"></i>
                            Academic Excellence
                        </span>

                        <h1 class="mt-8 text-4xl lg:text-7xl font-black text-white leading-tight">
                            Celebrating
                            <span class="text-cyan-200">Student Success</span>
                        </h1>

                        <p class="mt-7 text-blue-100 text-lg leading-9 max-w-2xl">
                            Our students continue to shine with exceptional academic achievements, discipline and dedication.
                            Explore the latest school results, toppers and outstanding performances.
                        </p>

                        <div class="mt-10 grid sm:grid-cols-3 gap-5">

                            <div class="p-6 rounded-[28px] bg-white/10 backdrop-blur-xl border border-white/10 shadow-2xl hover:-translate-y-2 transition duration-500">
                                <h3 class="text-4xl font-black text-white">98%</h3>
                                <p class="mt-2 text-cyan-100 font-semibold">Overall Result</p>
                            </div>

                            <div class="p-6 rounded-[28px] bg-white/10 backdrop-blur-xl border border-white/10 shadow-2xl hover:-translate-y-2 transition duration-500">
                                <h3 class="text-4xl font-black text-white">250+</h3>
                                <p class="mt-2 text-cyan-100 font-semibold">Successful Students</p>
                            </div>

                            <div class="p-6 rounded-[28px] bg-white/10 backdrop-blur-xl border border-white/10 shadow-2xl hover:-translate-y-2 transition duration-500">
                                <h3 class="text-4xl font-black text-white">35+</h3>
                                <p class="mt-2 text-cyan-100 font-semibold">Merit Achievers</p>
                            </div>

                        </div>

                    </div>

                    <div class="relative">

                        <div class="relative rounded-[40px] overflow-hidden border border-white shadow-[0_40px_120px_rgba(0,0,0,0.35)]">

                            <!-- MAIN BACKGROUND IMAGE -->
                            <img
                                src="admin/images/results/<?php echo $topper['student_image']; ?>"
                                alt="<?php echo $topper['student_name']; ?>"
                                class="w-full h-full object-cover">

                            <!-- OVERLAY -->
                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-900/20 to-transparent"></div>

                            <!-- CONTENT BOX -->
                            <div class="absolute bottom-8 left-8 right-8 p-7 rounded-[30px] bg-white/10 backdrop-blur-2xl border border-white/10">

                                <div class="flex items-center gap-5">

                                    <!-- SMALL PROFILE IMAGE -->
                                    <img
                                        src="admin/images/results/<?php echo $topper['student_image']; ?>"
                                        alt="<?php echo $topper['student_name']; ?>"
                                        class="w-24 h-24 rounded-[26px] object-cover border-4 border-white shadow-2xl">

                                    <!-- STUDENT DETAILS -->
                                    <div>

                                        <span class="inline-flex px-4 py-2 rounded-full bg-cyan-400 text-black font-black text-xs uppercase tracking-widest">

                                            <?php echo $topper['student_title']; ?>

                                        </span>

                                        <h3 class="mt-4 text-3xl font-black text-white">

                                            <?php echo $topper['student_name']; ?>

                                        </h3>

                                        <p class="mt-2 text-cyan-100 font-semibold">

                                            Secured <?php echo $topper['percentage']; ?>% In Final Examination

                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="absolute -top-8 -left-8 p-6 rounded-[30px] bg-white text-black shadow-[0_25px_80px_rgba(0,0,0,0.25)] animate-bounce">

                            <div class="flex items-center gap-4">

                                <div class="w-16 h-16 rounded-[22px] bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center text-white text-2xl">
                                    <i class="fa-solid fa-trophy"></i>
                                </div>

                                <div>
                                    <h4 class="text-3xl font-black">1st</h4>
                                    <p class="text-slate-500 font-semibold">Rank Holder</p>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

        <!-- RESULT CARDS -->
        <section class="relative py-24 overflow-hidden bg-white">

            <div class="absolute top-20 right-20 w-72 h-72 bg-blue-200/20 blur-[120px] rounded-full"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-cyan-200/20 blur-[120px] rounded-full"></div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">

                <div class="text-center max-w-3xl mx-auto">
                    <span class="text-black bg-[#FACC15] px-5 py-3 rounded-full font-black uppercase tracking-widest">
                        Top Performers
                    </span>

                    <h2 class="mt-4 text-3xl lg:text-6xl font-black text-black leading-tight">
                        Student Result Showcase
                    </h2>

                    <p class="mt-5 text-black leading-8 text-lg">
                        Replace these images and student details with your actual school topper records.
                    </p>
                </div>

                <div class="mt-16 grid md:grid-cols-2 xl:grid-cols-3 gap-8">

                    <?php foreach ($students as $row) { ?>

                        <div class="group rounded-[35px] overflow-hidden bg-white border border-blue-100 shadow-[0_30px_80px_rgba(15,23,42,0.10)] hover:-translate-y-4 transition duration-500">

                            <div class="relative h-[340px] overflow-hidden">

                                <img
                                    src="admin/images/results/<?php echo $row['student_image']; ?>"
                                    alt="<?php echo $row['student_name']; ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-900/20 to-transparent"></div>

                                <!-- Percentage -->
                                <div class="absolute top-5 left-5">

                                    <span class="px-5 py-2 rounded-full bg-blue-700 text-white font-black text-sm shadow-xl">

                                        <?php echo $row['percentage']; ?>

                                    </span>

                                </div>

                                <!-- Student Info -->
                                <div class="absolute bottom-5 left-5 right-5">

                                    <h3 class="text-3xl font-black text-white">

                                        <?php echo $row['student_name']; ?>

                                    </h3>

                                    <p class="mt-2 text-blue-100 font-semibold">

                                        <?php echo $row['student_title']; ?>

                                    </p>

                                </div>

                            </div>

                            <div class="p-7">

                                <!-- Roll Number -->
                                <div class="flex items-center justify-between border-b border-slate-100 pb-5">

                                    <span class="font-bold text-slate-500">
                                        Roll No
                                    </span>

                                    <span class="font-black text-black">

                                        <?php echo $row['roll_no']; ?>

                                    </span>

                                </div>

                                <!-- Result Status -->
                                <div class="flex items-center justify-between pt-5">

                                    <span class="font-bold text-slate-500">
                                        Result Status
                                    </span>

                                    <?php if ($row['status'] == 'PASS') { ?>

                                        <span class="px-5 py-2 rounded-full bg-green-100 text-green-700 font-black text-sm">

                                            PASS

                                        </span>

                                    <?php } else { ?>

                                        <span class="px-5 py-2 rounded-full bg-red-100 text-red-700 font-black text-sm">

                                            FAIL

                                        </span>

                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                    <?php } ?>

                </div>

            </div>

        </section>

        <!-- RESULT TABLE -->
        <section class="relative py-24 bg-gradient-to-br from-slate-50 via-white to-blue-50 overflow-hidden">

            <div class="max-w-7xl mx-auto px-6">

                <div class="rounded-[40px] overflow-hidden border border-slate-100 bg-white shadow-[0_35px_90px_rgba(15,23,42,0.10)]">

                    <div class="p-8 lg:p-10 bg-gradient-to-r from-blue-700 via-cyan-600 to-blue-800 text-white">

                        <h2 class="text-3xl lg:text-5xl font-black">
                            Result Records
                        </h2>

                        <p class="mt-4 text-blue-100 text-lg">
                            School topper and student performance table.
                        </p>

                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full min-w-[800px]">

                            <thead class="bg-slate-50">

                                <tr class="text-left uppercase tracking-widest text-sm text-slate-700">

                                    <th class="px-6 py-5">Rank</th>
                                    <th class="px-6 py-5">Student</th>
                                    <th class="px-6 py-5">Roll No</th>
                                    <th class="px-6 py-5">Marks</th>
                                    <th class="px-6 py-5">Percentage</th>
                                    <th class="px-6 py-5">Status</th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-slate-100">

                                <?php foreach ($students as $row) { ?>

                                    <tr class="hover:bg-blue-50 transition">

                                        <!-- RANK -->
                                        <td class="px-6 py-5 font-black text-blue-700">

                                            <?php echo $row['rank_position']; ?>

                                        </td>

                                        <!-- STUDENT NAME -->
                                        <td class="px-6 py-5 font-bold text-black">

                                            <?php echo $row['student_name']; ?>

                                        </td>

                                        <!-- ROLL NUMBER -->
                                        <td class="px-6 py-5">

                                            <?php echo $row['roll_no']; ?>

                                        </td>

                                        <!-- MARKS -->
                                        <td class="px-6 py-5">

                                            <?php echo $row['obtained_marks']; ?> /
                                            <?php echo $row['total_marks']; ?>

                                        </td>

                                        <!-- PERCENTAGE -->
                                        <td class="px-6 py-5 font-black">

                                            <?php echo $row['percentage']; ?>

                                        </td>

                                        <!-- STATUS -->
                                        <td class="px-6 py-5">

                                            <?php if ($row['status'] == 'PASS') { ?>

                                                <span class="px-4 py-2 rounded-full bg-green-100 text-green-700 font-black text-sm">

                                                    PASS

                                                </span>

                                            <?php } else { ?>

                                                <span class="px-4 py-2 rounded-full bg-red-100 text-red-700 font-black text-sm">

                                                    FAIL

                                                </span>

                                            <?php } ?>

                                        </td>

                                    </tr>

                                <?php } ?>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </section>

        <!-- CTA -->
        <section class="relative py-24 overflow-hidden bg-gradient-to-r from-blue-700 via-cyan-600 to-blue-800">

            <div class="absolute top-0 left-0 w-[420px] h-[420px] bg-white/10 blur-[120px] rounded-full"></div>

            <div class="max-w-5xl mx-auto px-6 text-center relative z-10">

                <h2 class="text-4xl lg:text-6xl font-black text-white">
                    Proud Of Our Students
                </h2>

                <p class="mt-6 text-blue-100 text-lg leading-8">
                    Our students continue to achieve academic excellence with dedication and discipline.
                </p>

                <a href="admission"
                    class="inline-flex mt-10 px-10 py-5 rounded-[20px] bg-white text-blue-700 font-black shadow-[0_25px_70px_rgba(255,255,255,0.25)] hover:bg-slate-950 hover:text-white hover:-translate-y-2 transition duration-500">
                    Apply For Admission
                </a>

            </div>

        </section>

    </main>

    <?php include 'footer.php'; ?>

</body>

</html>