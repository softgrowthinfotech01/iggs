<?php
include 'admin/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandatory Public Disclosure</title>

    <link rel="stylesheet" href="dist/output.css">
</head>

<body class="bg-[#FFF7ED] text-slate-900">

    <?php include 'header.php'; ?>

    <!-- Banner -->
    <section class="relative mt-[50px] md:mt-[75px] h-[260px] md:h-[420px] overflow-hidden border-t border-[#AD1C21]">

        <img src="images/IG_Playground.png"
            alt="Mandatory Public Disclosure"
            class="absolute inset-0 w-full h-full object-cover">

        <!-- <div class="absolute inset-0 bg-gradient-to-r from-[#AD1C21]/90 via-black/60 to-[#F79D20]/50"></div> -->

        <div class="relative z-10 h-full flex items-center max-w-7xl mx-auto px-5 md:px-10">
            <div class="max-w-3xl animate-[fadeInUp_1s_ease]">

                <span class="inline-block mb-4 px-5 py-2 rounded-full bg-[#FACC15] text-black text-xs md:text-sm font-black shadow-lg">
                    CBSE REQUIRED DOCUMENTS
                </span>

                <h1 class="text-white text-3xl sm:text-4xl md:text-6xl font-black leading-tight">
                    Mandatory Public <span class="text-[#FACC15]">
                        Disclosure</span>
                </h1>

                <p class="mt-4 text-orange-100 text-sm md:text-lg">
                    Official school documents, certificates and result information.
                </p>

            </div>
        </div>
    </section>

    <!-- Content -->
    <section class="py-10 md:py-20">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-4xl font-black text-[#AD1C21] inline-block border-b-4 border-[#FACC15] pb-3">
                    Mandatory Public Disclosure
                </h2>
            </div>

            <div class="overflow-x-auto bg-white rounded-3xl shadow-2xl border border-orange-100">
                <table class="w-full min-w-[650px] border-collapse">
                    <thead>
                        <tr class="bg-[#AE1C21] text-white">
                            <th class="text-left px-6 py-5 text-xs md:text-sm font-black uppercase">Document Name</th>
                            <th class="text-center px-6 py-5 text-xs md:text-sm font-black uppercase">Link</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">

                        <?php

                        $stmt = $pdo->query("
        SELECT *
        FROM mandatory_disclosures
        ORDER BY id ASC
    ");

                        $documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($documents as $row) {

                        ?>

                            <tr class="hover:bg-orange-50 hover:translate-x-1 transition duration-300">

                                <td class="px-6 py-4 font-semibold">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <a
                                        href="admin/images/mandatory_disclosures/<?php echo $row['file_path']; ?>"
                                        target="_blank"
                                        class="px-4 py-2 rounded-full bg-[#AD1C21] text-white font-bold text-xs hover:bg-[#F79D20] transition">

                                        VIEW HERE

                                    </a>

                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <!-- <div class="mt-14 md:mt-20 bg-white rounded-3xl shadow-2xl border border-orange-100 p-5 md:p-8">
            <h2 class="text-2xl md:text-4xl font-black text-[#AD1C21] border-b-4 border-[#FACC15] inline-block pb-3">
                Last Three Years Result
            </h2>

            <div class="flex flex-wrap gap-3 mt-8 mb-6">
                <button class="px-6 py-3 bg-[#AD1C21] text-white text-xs font-black rounded-full shadow-lg hover:bg-[#F79D20] hover:scale-105 transition">
                    CLASS - X
                </button>

                <button class="px-6 py-3 bg-orange-100 text-[#AD1C21] text-xs font-black rounded-full hover:bg-[#AD1C21] hover:text-white hover:scale-105 transition">
                    CLASS - XII
                </button>
            </div>

            <div class="overflow-x-auto rounded-2xl border border-slate-200">
                <table class="w-full min-w-[700px]">
                    <thead>
                        <tr class="bg-[#AE1C21] text-white">
                            <th class="p-4 text-left text-xs font-black uppercase">Year</th>
                            <th class="p-4 text-left text-xs font-black uppercase">No. of Students Appeared</th>
                            <th class="p-4 text-left text-xs font-black uppercase">No. of Students Pass</th>
                            <th class="p-4 text-left text-xs font-black uppercase">Pass Percentage</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-200">
                        <tr class="hover:bg-orange-50 transition">
                            <td class="p-4 font-bold">2022-23</td>
                            <td class="p-4">127</td>
                            <td class="p-4">127</td>
                            <td class="p-4 font-black text-green-600">100%</td>
                        </tr>

                        <tr class="hover:bg-orange-50 transition">
                            <td class="p-4 font-bold">2023-24</td>
                            <td class="p-4">63</td>
                            <td class="p-4">63</td>
                            <td class="p-4 font-black text-green-600">100%</td>
                        </tr>

                        <tr class="hover:bg-orange-50 transition">
                            <td class="p-4 font-bold">2024-25</td>
                            <td class="p-4">169</td>
                            <td class="p-4">169</td>
                            <td class="p-4 font-black text-green-600">100%</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> -->

        </div>
    </section>


    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</body>
<?php include 'footer.php'; ?>

</html>