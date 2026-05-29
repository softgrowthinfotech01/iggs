<?php

include 'admin/conn.php';

$sliderStmt = $pdo->query("SELECT * FROM sliders WHERE id = 17 LIMIT 1");
$slider = $sliderStmt->fetch(PDO::FETCH_ASSOC);

$images = [];

if ($slider) {

    $imageStmt = $pdo->prepare("
        SELECT * 
        FROM slider_images 
        WHERE slider_id = ?
        ORDER BY id ASC
    ");

    $imageStmt->execute([$slider['id']]);
    $images = $imageStmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Indira Gandhi School Chandrapur</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="dist/output.css">
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

    <style>

    </style>
</head>

<body class="bg-white text-black">


    <!-- HEADER -->
    <?php include 'header.php' ?>

    <!-- HERO CARD UNIQUE SLIDER -->
    <div class="relative w-full m-0 p-0 overflow-hidden">

        <div class="relative w-full mt-10 md:mt-20 overflow-hidden rounded-[4px] shadow-[0_40px_90px_rgba(15,23,42,0.18)] border border-slate-200 p-5">

<div class="relative mt-10 md:mt-10 h-[240px] sm:h-[260px] md:h-[500px] rounded-[20px] md:rounded-[35px] overflow-hidden bg-gradient-to-br from-blue-50 to-white w-full">                <div id="uniqueSlider" class="relative w-full h-full">

                    <?php if (!empty($images)): ?>

                        <?php foreach ($images as $index => $image): ?>

                            <div class="unique-slide absolute inset-0
            <?php echo $index === 0
                                ? 'opacity-100 scale-100'
                                : 'opacity-0 scale-95'; ?>
            transition-all duration-1000 ease-in-out">

                                <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-cyan-50"></div>

                                <img
                                    src="admin/images/<?php echo $image['image']; ?>"
                                    class="absolute right-0 bottom-0 w-full h-full object-cover"
                                    alt="Slider Image">

                            </div>

                        <?php endforeach; ?>

                    <?php endif; ?>

                    <!-- FLOATING DOTS -->
                    <div class="absolute inset-y-0 right-6 max-md:right-3 flex flex-col justify-center z-30 gap-2">

                        <?php foreach ($images as $index => $image): ?>

                            <button
                                class="unique-dot transition-all rounded-full
            <?php echo $index === 0
                                ? 'w-2 h-8 max-md:h-6 bg-red-700'
                                : 'w-2 h-2 bg-slate-300'; ?>">
                            </button>

                        <?php endforeach; ?>

                    </div>

                </div>

            </div>
        </div>
    </div>


<!-- SMOOTH ANIMATED NOTIFICATION BAR -->
<section class="relative overflow-hidden bg-[#AE1C21] shadow-xl">

    <div class="absolute inset-0 bg-gradient-to-r from-[#AE1C21] via-[#8f1419] to-[#AE1C21]"></div>

    <div class="relative flex items-center">

        <div class="relative z-20 bg-[#FACC15] text-black font-black px-7 md:px-6 sm:px-8 py-4 mb-2 md:mb-2  whitespace-nowrap">
            <i class="fa-solid fa-bell fa-shake mr-2"></i>
            Notification
        </div>

        <div class="flex-1 overflow-hidden">

            <marquee
                behavior="scroll"
                direction="left"
                scrollamount="6"
                onmouseover="this.stop();"
                onmouseout="this.start();"
                class="py-4 text-white font-bold">

                📢 Admissions Open For Session 2026-27 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                🏆 Congratulations To Our School Toppers &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                📚 New Academic Session Starts From June &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                🎓 Scholarship Forms Available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                🚌 School Bus Facility Available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                🏫 Mandatory Public Disclosure Updated

            </marquee>

        </div>

    </div>

</section>
    <!-- NOTICE STRIP -->
    <!-- <section class="relative -mt-2 z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-2xl border-2 border-[#AE1C21] p-6 grid md:grid-cols-3 gap-6 mt-4">
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-calendar-check text-4xl text-[#FACC15]"></i>
                    <div>
                        <h3 class="font-black text-xl text-black">Admission Notice</h3>
                        <p class="text-slate-800">Forms available for 2026-27</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-award text-4xl text-[#FACC15] "></i>
                    <div>
                        <h3 class="font-black text-xl text-black ">Academic Excellence</h3>
                        <p class="text-slate-800">Result-oriented education</p>
                    </div>
                </div>
                <div class="flex gap-4 items-center">
                    <i class="fa-solid fa-user-shield text-4xl text-[#FACC15] "></i>
                    <div>
                        <h3 class="font-black text-xl text-black ">Safe Campus</h3>
                        <p class="text-slate-800">Disciplined and secure atmosphere</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <?php

    include 'admin/conn.php';

    $stmt = $pdo->query("SELECT * FROM about_us LIMIT 1");
    $about = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <!-- ABOUT -->
    <section class="relative py-20 overflow-hidden -mt-2 bg-gradient-to-br from-white via-blue-50 to-slate-100">

        <!-- SKETCH BACKGROUND -->
        <!-- OPPOSITE DIRECTION SKETCH -->

        <div class="absolute top-10 right-10 opacity-[0.20] rotate-[12deg]">
            <i class="fa-solid fa-school text-[240px] text-blue-900"></i>
        </div>

        <div class="absolute bottom-0 left-0 opacity-[0.20] rotate-[-10deg]">
            <i class="fa-solid fa-book-open-reader text-[240px] text-cyan-700"></i>
        </div>

        <div class="absolute top-1/2 right-1/2 translate-x-1/2 -translate-y-1/2 opacity-[0.20] rotate-[8deg]">
            <i class="fa-solid fa-graduation-cap text-[340px] text-blue-800"></i>
        </div>

        <!-- GLOW -->
        <div class="absolute top-0 left-0 w-[450px] max-md:w-[180px] h-[450px] bg-blue-200/30 blur-[120px] rounded-full"></div>

        <div class="absolute bottom-0 right-0 w-[450px] max-md:w-[180px] max-md:w-[180px] max-md:w-[180px] h-[450px] bg-cyan-200/30 blur-[120px] rounded-full"></div>



        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <div class="grid lg:grid-cols-2 gap-20 items-center">

                <!-- LEFT SIDE -->
                <div class="relative">

                    <!-- MAIN BOX -->
                    <div class="relative bg-white rounded-[45px] shadow-[0_35px_90px_rgba(15,23,42,0.10)] border border-white overflow-hidden">

                        <!-- TOP -->
                       <div class="relative h-[350px] sm:h-[450px] md:h-[650px] overflow-hidden rounded-[24px] md:rounded-[0px]">

    <img src="admin/images/<?php echo $about['image']; ?>"
        alt="About Image"
        class="w-full h-full object-cover hover:scale-110 transition duration-[2000ms]">

    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.35),transparent_40%)]"></div>

    <!-- FLOATING ICONS -->
    <!-- <div class="absolute top-4 left-4 sm:top-6 sm:left-6 md:top-8 md:left-8 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-2xl md:rounded-3xl bg-[#AE1C21] backdrop-blur-xl flex items-center justify-center border border-white/20"> -->

        <!-- <i class="fa-solid fa-book-open-reader text-white text-xl sm:text-3xl md:text-4xl"></i> -->

    <!-- </div> -->

    <!-- <div class="absolute top-4 right-4 sm:top-6 sm:right-6 md:top-8 md:right-8 w-12 h-12 sm:w-16 sm:h-16 md:w-20 md:h-20 rounded-2xl md:rounded-3xl bg-[#AE1C21] backdrop-blur-xl flex items-center justify-center border border-white/20"> -->

        <!-- <i class="fa-solid fa-children text-white text-xl sm:text-3xl md:text-4xl"></i> -->

    <!-- </div> -->

    <!-- CENTER -->
    <div class="absolute bottom-5 left-5 right-5 sm:bottom-8 sm:left-8 sm:right-8 md:bottom-10 md:left-10 md:right-10">

        <span class="inline-flex px-3 py-2 sm:px-4 sm:py-2 md:px-5 md:py-3 rounded-full bg-[#AE1C21] backdrop-blur-xl border border-white/20 text-white font-black uppercase tracking-widest text-[10px] sm:text-xs md:text-sm">

            Since 2005

        </span>

        <h3 class="mt-3 sm:mt-4 md:mt-5 text-2xl sm:text-3xl md:text-4xl font-black text-white leading-tight">

            Excellence In
            <span class="block">Modern Education</span>

        </h3>

    </div>

</div>

                        <!-- BOTTOM -->
                        <div class="p-4 sm:p-6 md:p-8">

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5">

        <div class="rounded-2xl md:rounded-3xl bg-blue-50 p-4 sm:p-5 text-center hover:-translate-y-2 transition duration-500">

            <h4 class="text-2xl sm:text-3xl font-black text-blue-700">
                25+
            </h4>

            <p class="mt-2 text-xs sm:text-sm font-bold text-slate-500">
                Years
            </p>

        </div>

        <div class="rounded-2xl md:rounded-3xl bg-cyan-50 p-4 sm:p-5 text-center hover:-translate-y-2 transition duration-500">

            <h4 class="text-2xl sm:text-3xl font-black text-cyan-600">
                1200+
            </h4>

            <p class="mt-2 text-xs sm:text-sm font-bold text-slate-500">
                Students
            </p>

        </div>

        <div class="rounded-2xl md:rounded-3xl bg-blue-50 p-4 sm:p-5 text-center hover:-translate-y-2 transition duration-500">

            <h4 class="text-2xl sm:text-3xl font-black text-blue-700">
                45+
            </h4>

            <p class="mt-2 text-xs sm:text-sm font-bold text-slate-500">
                Teachers
            </p>

        </div>

    </div>

</div>

                    </div>

                </div>



                <!-- RIGHT SIDE -->
                <div>

                    <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">

                        <i class="fa-solid fa-circle-info"></i>

                        About Our School

                    </span>

                    <h2 class="mt-7 text-4xl lg:text-6xl font-black text-black leading-tight">

                        A School Built For
                        <span class="text-[#AE1C21]">Future Leaders</span>

                    </h2>

                    <div class="mt-7 text-black leading-8 text-lg text-justify">

                        <?php echo $about['description']; ?>

                    </div>



                    <!-- FEATURES -->
                    <div class="mt-10 space-y-5">

                        <div class="group flex items-start gap-5 p-5 rounded-[28px] bg-white border border-slate-100 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition duration-700">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center shadow-xl flex-shrink-0 group-hover:rotate-6 transition duration-700">

                                <i class="fa-solid fa-chalkboard-user text-white text-2xl"></i>

                            </div>

                            <div>

                                <h4 class="text-2xl font-black text-black">
                                    Smart Learning
                                </h4>

                                <p class="mt-2 text-black leading-7">
                                    Digital classrooms with interactive and activity-based teaching.
                                </p>

                            </div>

                        </div>



                        <div class="group flex items-start gap-5 p-5 rounded-[28px] bg-white border border-slate-100 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition duration-700">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-400 flex items-center justify-center shadow-xl flex-shrink-0 group-hover:rotate-6 transition duration-700">

                                <i class="fa-solid fa-trophy text-white text-2xl"></i>

                            </div>

                            <div>

                                <h4 class="text-2xl font-black text-black">
                                    Sports & Activities
                                </h4>

                                <p class="mt-2 text-black leading-7">
                                    Encouraging leadership, teamwork and confidence development.
                                </p>

                            </div>

                        </div>



                        <div class="group flex items-start gap-5 p-5 rounded-[28px] bg-white border border-slate-100 shadow-lg hover:-translate-y-2 hover:shadow-2xl transition duration-700">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-700 flex items-center justify-center shadow-xl flex-shrink-0 group-hover:rotate-6 transition duration-700">

                                <i class="fa-solid fa-user-shield text-white text-2xl"></i>

                            </div>

                            <div>

                                <h4 class="text-2xl font-black text-black">
                                    Safe Environment
                                </h4>

                                <p class="mt-2 text-black leading-7">
                                    A disciplined and secure campus for every student.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>


    <!-- MANAGEMENT SECTION -->
<section class="relative py-24 overflow-hidden bg-white">

    <div class="absolute top-10 left-10 opacity-[0.08] rotate-[-12deg]">
        <i class="fa-solid fa-users-gear text-[220px] text-blue-900"></i>
    </div>

    <div class="absolute bottom-0 right-10 opacity-[0.08] rotate-[12deg]">
        <i class="fa-solid fa-building-columns text-[220px] text-blue-900"></i>
    </div>

    <!-- <div class="absolute top-0 left-0 w-[420px] h-[420px] bg-[#FACC15]/20 blur-[120px] rounded-full"></div>
    <div class="absolute bottom-0 right-0 w-[420px] h-[420px] bg-[#AE1C21]/20 blur-[120px] rounded-full"></div> -->

    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="text-center max-w-4xl mx-auto">
            <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] shadow-xl text-black font-black uppercase tracking-widest text-sm">
                <i class="fa-solid fa-crown"></i>
                Our Leadership
            </span>

            <h2 class="mt-6 text-4xl lg:text-6xl font-black text-black leading-tight">
                Guiding Vision Of
                <span class="text-[#AE1C21]">Our Institution</span>
            </h2>

            <p class="mt-5 text-black text-lg leading-8">
                Dedicated leadership shaping the future of education with values, culture and excellence.
            </p>
        </div>

        <div class="mt-20 grid md:grid-cols-2 gap-10">

            <!-- CARD 1 -->
            <div class="group relative bg-white rounded-[40px] p-5 shadow-[0_35px_90px_rgba(15,23,42,0.12)] border border-slate-100 hover:-translate-y-4 transition duration-700 overflow-hidden">

                <div class="absolute inset-x-0 top-0 h-2 bg-[#AE1C21]"></div>

                <div class="relative h-[420px] rounded-[30px] overflow-hidden bg-slate-100">
                    <img src="images/president.png"
                         alt="Shri NareshBabuji Puglia"
                         class="w-full h-full object-cover group-hover:scale-110 transition duration-[2000ms]">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>

                    <div class="absolute bottom-5 left-5 right-5">
                        <span class="inline-flex px-4 py-2 rounded-full bg-[#FACC15] text-black font-black text-sm">
                            President
                        </span>
                    </div>
                </div>

                <div class="p-6 text-center">
                    <h3 class="text-3xl font-black text-black">
                        Shri NareshBabuji Puglia
                    </h3>

                    <p class="mt-3 text-[#AE1C21] font-black text-lg">
                        Ex-MP, President
                    </p>

                    <p class="mt-3 text-slate-700 font-semibold leading-7">
                        The Education and Cultural Society, Chandrapur
                    </p>
                </div>

            </div>

            <!-- CARD 2 -->
            <div class="group relative bg-white rounded-[40px] p-5 shadow-[0_35px_90px_rgba(15,23,42,0.12)] border border-slate-100 hover:-translate-y-4 transition duration-700 overflow-hidden">

                <div class="absolute inset-x-0 top-0 h-2 bg-[#FACC15]"></div>

                <div class="relative h-[420px] rounded-[30px] overflow-hidden bg-slate-100">
                    <img src="images/vice_president.png"
                         alt="Shri Rahulbabuji Puglia"
                         class="w-full h-full object-cover group-hover:scale-110  transition duration-[2000ms]">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/10 to-transparent"></div>

                    <div class="absolute bottom-5 left-5 right-5">
                        <span class="inline-flex px-4 py-2 rounded-full bg-[#AE1C21] text-white font-black text-sm">
                            Vice President
                        </span>
                    </div>
                </div>

                <div class="p-6 text-center">
                    <h3 class="text-3xl font-black text-black">
                        Shri Rahulbabuji Puglia
                    </h3>

                    <p class="mt-3 text-[#AE1C21] font-black text-lg">
                        Vice President
                    </p>

                    <p class="mt-3 text-slate-700 font-semibold leading-7">
                        The Education and Cultural Society, Chandrapur
                    </p>
                </div>

            </div>

        </div>

    </div>
</section>
    <!-- ACADEMICS -->
    <section class="relative py-24 overflow-hidden bg-white">

        <!-- BACKGROUND SKETCH -->
        <div class="absolute top-10 left-10 opacity-[0.30] rotate-[-12deg]">
            <i class="fa-solid fa-pencil text-[220px] text-blue-900"></i>
        </div>

        <div class="absolute bottom-0 right-10 opacity-[0.30] rotate-[12deg]">
            <i class="fa-solid fa-book-open text-[220px] text-cyan-700"></i>
        </div>

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 opacity-[0.30]">
            <i class="fa-solid fa-graduation-cap text-[300px] text-blue-800"></i>
        </div>

        <!-- GLOW -->
        <div class="absolute top-0 left-0 w-[450px] max-md:w-[180px] max-md:w-[180px] max-md:w-[180px] h-[450px] bg-blue-200/30 blur-[120px] rounded-full"></div>

        <div class="absolute bottom-0 right-0 w-[450px] max-md:w-[180px] max-md:w-[180px] max-md:w-[180px] h-[450px] bg-cyan-200/30 blur-[120px] rounded-full"></div>



        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <!-- HEADING -->
            <div class="text-center max-w-4xl mx-auto">

                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">

                    <i class="fa-solid fa-layer-group"></i>

                    Academic Journey

                </span>

                <h2 class="mt-6 text-4xl lg:text-6xl font-black text-black leading-tight">

                    Future Focused
                    <span class="text-[#AE1C21]">Learning Structure</span>

                </h2>

                <p class="mt-5 text-black text-lg leading-8">

                    Modern academic programs designed for confidence,
                    discipline, creativity and innovation.

                </p>

            </div>



            <!-- UNIQUE ZIG-ZAG STYLE -->
            <div class="relative mt-24 space-y-16">

                <!-- LINE -->
                <div class="hidden lg:block absolute left-1/2 top-0 bottom-0 w-[4px] bg-gradient-to-b from-blue-600 via-cyan-400 to-blue-700 rounded-full"></div>



                <!-- ITEM -->
                <div class="grid lg:grid-cols-2 gap-14 items-center">

                    <!-- LEFT CONTENT -->
                    <div class="relative">

                        <div class="bg-[#AE1C21] text-white rounded-[40px] p-10  hover:-translate-y-3 transition duration-700">

                            <span class="text-blue-100 font-black uppercase tracking-[4px]">
                                Step 01
                            </span>

                            <h3 class="mt-4 text-4xl font-black">
                                Primary School
                            </h3>

                            <p class="mt-5 text-blue-50 leading-8 text-lg">
                                Strong academic foundation with creative activities,
                                joyful learning and communication development.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-3">

                                <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-xl font-bold">
                                    Creative Learning
                                </span>

                                <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-xl font-bold">
                                    Basic Skills
                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- RIGHT ICON -->
                    <div class="flex justify-center lg:justify-start">

                        <div class="relative">

                            <div class="absolute inset-0 bg-blue-400/30 blur-3xl rounded-full"></div>

                            <div class="relative w-44 h-44 rounded-full bg-white  border-[12px] border-blue-100 flex items-center justify-center hover:rotate-6 hover:scale-110 transition duration-700">

                                <i class="fa-solid fa-pencil text-7xl text-blue-700"></i>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ITEM -->
                <div class="grid lg:grid-cols-2 gap-14 items-center">

                    <!-- LEFT ICON -->
                    <div class="flex justify-center lg:justify-end order-2 lg:order-1">

                        <div class="relative">

                            <div class="absolute inset-0 bg-orange-400/30 blur-3xl rounded-full"></div>

                            <div class="relative w-44 h-44 rounded-full bg-white border-[12px] border-orange-100 flex items-center justify-center hover:rotate-6 hover:scale-110 transition duration-700">

                                <i class="fa-solid fa-flask text-7xl text-orange-500"></i>

                            </div>

                        </div>

                    </div>



                    <!-- RIGHT CONTENT -->
                    <div class="order-1 lg:order-2 relative">

                        <div class="bg-[#FACC15] text-white rounded-[40px] p-10 hover:-translate-y-3 transition duration-700">

                            <span class="text-orange-100 font-black uppercase tracking-[4px]">
                                Step 02
                            </span>

                            <h3 class="mt-4 text-4xl font-black">
                                Middle School
                            </h3>

                            <p class="mt-5 text-orange-50 leading-8 text-lg">
                                Project-based education with innovation,
                                practical science and communication growth.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-3">

                                <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-xl font-bold">
                                    Innovation
                                </span>

                                <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-xl font-bold">
                                    Experiments
                                </span>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ITEM -->
                <div class="grid lg:grid-cols-2 gap-14 items-center">

                    <!-- LEFT CONTENT -->
                    <div class="relative">

                        <div class="bg-[#AE1C21] text-white rounded-[40px] p-10  hover:-translate-y-3 transition duration-700">

                            <span class="text-cyan-100 font-black uppercase tracking-[4px]">
                                Step 03
                            </span>

                            <h3 class="mt-4 text-4xl font-black">
                                High School
                            </h3>

                            <p class="mt-5 text-cyan-50 leading-8 text-lg">
                                Board preparation with discipline,
                                confidence and career-focused development.
                            </p>

                            <div class="mt-8 flex flex-wrap gap-3">

                                <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-xl font-bold">
                                    Career Growth
                                </span>

                                <span class="px-4 py-2 rounded-full bg-white/20 backdrop-blur-xl font-bold">
                                    Board Exams
                                </span>

                            </div>

                        </div>

                    </div>



                    <!-- RIGHT ICON -->
                    <div class="flex justify-center lg:justify-start">

                        <div class="relative">

                            <div class="absolute inset-0 bg-cyan-400/30 blur-3xl rounded-full"></div>

                            <div class="relative w-44 h-44 rounded-full bg-white  border-[12px] border-cyan-100 flex items-center justify-center hover:rotate-6 hover:scale-110 transition duration-700">

                                <i class="fa-solid fa-graduation-cap text-7xl text-cyan-600"></i>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- FACILITIES -->
    <!-- FACILITIES -->
    <!-- FLOWING FACILITIES SECTION -->
    <section class="relative py-24 overflow-hidden bg-gradient-to-br from-white via-blue-50 to-slate-100">

        <!-- ABSTRACT BACKGROUND -->
        <div class="absolute inset-0 opacity-[0.05]">

            <div class="absolute top-10 left-10 w-80 h-80 border-[14px] border-blue-700 rotate-12 rounded-[50px]"></div>

            <div class="absolute top-32 right-10 w-72 h-72 border-[12px] border-cyan-600 -rotate-12 rounded-[40px]"></div>

            <div class="absolute bottom-10 left-1/3 w-96 h-96 border-[16px] border-blue-900 rotate-6 rounded-[60px]"></div>

            <div class="absolute bottom-0 right-1/4 w-60 h-60 border-[10px] border-cyan-700 -rotate-6 rounded-[35px]"></div>

        </div>

        <!-- GLOW -->
        <!-- <div class="absolute top-0 left-0 w-[450px] max-md:w-[180px] max-md:w-[180px] max-md:w-[180px] h-[450px] bg-blue-200/30 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-0 right-0 w-[450px] max-md:w-[180px] max-md:w-[180px] max-md:w-[180px] h-[450px] bg-cyan-200/30 blur-[120px] rounded-full"></div> -->



        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <!-- HEADING -->
            <div class="text-center max-w-4xl mx-auto">

                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">

                    <i class="fa-solid fa-building"></i>

                    Facilities

                </span>

                <h2 class="mt-6 text-4xl lg:text-6xl font-black text-black leading-tight">

                    Smart Campus
                    <span class="text-[#AE1C21]">Infrastructure</span>

                </h2>

                <p class="mt-5 text-black text-lg leading-8">

                    Modern facilities designed for smart learning,
                    safety and student development.

                </p>

            </div>



            <!-- FLOWING SLIDER -->
            <div class="relative mt-20 overflow-hidden">

                <div class="facility-track flex gap-8 w-max">

                    <!-- ITEM -->
                    <div class="facility-item">

                        <div class="facility-glow bg-blue-400/20"></div>

                        <div class="facility-box">

                            <div class="facility-icon bg-gradient-to-br from-blue-700 to-cyan-500">
                                <i class="fa-solid fa-computer"></i>
                            </div>

                            <div class="facility-content">

                                <span class="text-blue-700">
                                    Digital Education
                                </span>

                                <h3>
                                    Smart Classrooms
                                </h3>

                                <p>
                                    Interactive learning with modern digital technology.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- ITEM -->
                    <div class="facility-item">

                        <div class="facility-glow bg-orange-400/20"></div>

                        <div class="facility-box">

                            <div class="facility-icon bg-gradient-to-br from-orange-500 to-amber-400">
                                <i class="fa-solid fa-book"></i>
                            </div>

                            <div class="facility-content">

                                <span class="text-orange-500">
                                    Knowledge Center
                                </span>

                                <h3>
                                    Modern Library
                                </h3>

                                <p>
                                    Resource-rich library supporting academic excellence.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- ITEM -->
                    <div class="facility-item">

                        <div class="facility-glow bg-cyan-400/20"></div>

                        <div class="facility-box">

                            <div class="facility-icon bg-gradient-to-br from-cyan-500 to-blue-700">
                                <i class="fa-solid fa-futbol"></i>
                            </div>

                            <div class="facility-content">

                                <span class="text-cyan-600">
                                    Sports Zone
                                </span>

                                <h3>
                                    Sports Ground
                                </h3>

                                <p>
                                    Professional sports facilities for physical growth.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- ITEM -->
                    <div class="facility-item">

                        <div class="facility-glow bg-indigo-400/20"></div>

                        <div class="facility-box">

                            <div class="facility-icon bg-gradient-to-br from-blue-700 to-indigo-500">
                                <i class="fa-solid fa-bus"></i>
                            </div>

                            <div class="facility-content">

                                <span class="text-blue-700">
                                    Student Safety
                                </span>

                                <h3>
                                    Transport Service
                                </h3>

                                <p>
                                    Safe and secure transportation facilities.
                                </p>

                            </div>

                        </div>

                    </div>



                    <!-- DUPLICATE FOR SMOOTH FLOW -->
                    <div class="facility-item">

                        <div class="facility-glow bg-blue-400/20"></div>

                        <div class="facility-box">

                            <div class="facility-icon bg-gradient-to-br from-blue-700 to-cyan-500">
                                <i class="fa-solid fa-computer"></i>
                            </div>

                            <div class="facility-content">

                                <span class="text-blue-700">
                                    Digital Education
                                </span>

                                <h3>
                                    Smart Classrooms
                                </h3>

                                <p>
                                    Interactive learning with modern digital technology.
                                </p>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

    </section>

    <?php

    $stmt = $pdo->query("SELECT * FROM principal_message LIMIT 1");
    $principal = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>

    <!-- PRINCIPAL MESSAGE -->
    <section class="relative py-24 overflow-hidden bg-white">

        <!-- SOFT BACKGROUND -->
        <div class="absolute inset-0 bg-gradient-to-br from-white via-blue-50 to-slate-100"></div>

        <div class="absolute bottom-0 right-0 w-[450px] max-md:w-[180px] max-md:w-[180px] max-md:w-[180px] h-[450px] bg-cyan-200/30 blur-[120px] rounded-full"></div>

        <!-- LIGHT SKETCH ICONS -->
        <div class="absolute top-10 right-10 opacity-[0.06] rotate-12">
            <i class="fa-solid fa-quote-left text-[220px] text-blue-900"></i>
        </div>

        <div class="absolute bottom-0 left-10 opacity-[0.06] -rotate-12">
            <i class="fa-solid fa-graduation-cap text-[240px] text-cyan-700"></i>
        </div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">

            <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-16 items-center">

                <!-- IMAGE SIDE -->
                <div class="relative">

                    <div class="absolute -top-8 -left-8 w-40 h-40 bg-blue-400/20 rounded-full blur-3xl"></div>

                    <div class="relative rounded-[45px] overflow-hidden bg-white shadow-[0_35px_90px_rgba(15,23,42,0.14)] border border-white p-5">

                        <div class="relative h-[520px] rounded-[35px] overflow-hidden bg-gradient-to-br from-blue-100 to-cyan-50">

                            <img src="admin/images/<?php echo $principal['image']; ?>"
                                alt="Principal Message"
                                class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>

                            <div class="absolute left-6 right-6 bottom-6 bg-white/90 backdrop-blur-xl rounded-[28px] p-6 shadow-2xl">

                                <h3 class="text-2xl font-black text-black">
                                    <?php echo $principal['name']; ?>
                                </h3>

                                <p class="mt-1 text-blue-700 font-bold">
                                    <?php echo $principal['designation']; ?>
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- FLOATING BADGE -->
                    <div class="absolute -right-5 top-14 bg-white rounded-[28px] p-5 shadow-2xl border border-blue-100 hidden sm:block">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center text-white text-2xl">
                                <i class="fa-solid fa-award"></i>
                            </div>

                            <div>
                                <h4 class="text-2xl font-black text-blue-700">25+</h4>
                                <p class="text-slate-500 font-bold text-sm">Years Excellence</p>
                            </div>

                        </div>

                    </div>

                </div>



                <!-- CONTENT SIDE -->
                <div>

                    <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">
                        <i class="fa-solid fa-message"></i>
                        Principal Message
                    </span>

                    <h2 class="mt-7 text-4xl lg:text-6xl font-black text-black leading-tight">
                        Education With
                        <span class="text-[#AE1C21]">Values & Vision</span>
                    </h2>

                    <p class="mt-8 text-black leading-9 text-lg text-justify">
                        Our aim is to create confident, responsible and successful students.
                        We believe every child has unique talent, and our duty is to guide,
                        support and inspire them with modern education and strong values.
                    </p>

                    <!-- QUOTE BOX -->
                    <div class="relative mt-10 bg-white rounded-[40px] p-8 shadow-[0_30px_80px_rgba(15,23,42,0.10)] border border-slate-100 overflow-hidden">

                        <div class="absolute top-0 left-0 w-2 h-full bg-gradient-to-b from-blue-700 to-cyan-500"></div>

                        <p class="mt-3 text-xl leading-10 text-slate-700 text-justify">
                        <h4 class="font-semibold mb-2">Principal Message: </h4>
                        <?php echo $principal['message']; ?>
                        </p>

                    </div>

                    <!-- SIGNATURE -->
                    <div class="mt-8 flex items-center gap-5">

                        <div class="w-16 h-16 rounded-full bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center text-white text-2xl shadow-xl">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>

                        <div>
                            <h3 class="text-2xl font-black text-black">
                                <?php echo $principal['name']; ?>
                            </h3>
                            <p class="text-blue-700 font-bold">
                                <?php echo $principal['designation']; ?>
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- CTA -->
    <!-- ADMISSION CTA -->
    <section class="relative py-16 md:py-28 overflow-hidden bg-[#FACC15]">

    <!-- BACKGROUND -->
    <div class="absolute inset-0 overflow-hidden opacity-[0.07]">

        <!-- BIG CIRCLE -->
        <div class="absolute -top-10 -left-10 md:-top-20 md:-left-20 w-[180px] h-[180px] md:w-[420px] md:h-[420px] border-[10px] md:border-[18px] border-white rounded-full"></div>

        <!-- DIAGONAL LINES -->
        <div class="hidden md:block absolute top-32 left-1/4 w-[500px] h-[2px] bg-white rotate-[18deg]"></div>

        <div class="hidden md:block absolute top-52 right-0 w-[420px] h-[2px] bg-white -rotate-[22deg]"></div>

        <div class="hidden md:block absolute bottom-32 left-0 w-[380px] h-[2px] bg-white rotate-[12deg]"></div>

        <!-- ABSTRACT BOX -->
        <div class="absolute top-10 right-4 md:top-16 md:right-16 w-28 h-28 md:w-64 md:h-64 border-[8px] md:border-[14px] border-white rotate-12 rounded-[25px] md:rounded-[55px]"></div>

        <div class="absolute bottom-5 left-1/3 w-36 h-36 md:w-80 md:h-80 border-[8px] md:border-[16px] border-white -rotate-[18deg] rounded-[35px] md:rounded-[70px]"></div>

        <!-- DOT GRID -->
        <div class="hidden md:grid absolute top-20 left-1/2 grid-cols-6 gap-3">

            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>

            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>
            <span class="w-3 h-3 bg-white rounded-full"></span>

        </div>

        <!-- WAVE -->
        <div class="absolute bottom-0 right-5 md:right-20 w-[120px] h-[120px] md:w-[320px] md:h-[320px] border-[6px] md:border-[14px] border-dashed border-white rounded-full"></div>

    </div>

    <!-- GLOW -->
    <div class="absolute top-0 left-0 w-[220px] h-[220px] md:w-[500px] md:h-[500px] bg-cyan-300/20 blur-[80px] md:blur-[120px] rounded-full"></div>

    <div class="absolute bottom-0 right-0 w-[220px] h-[220px] md:w-[500px] md:h-[500px] bg-blue-300/20 blur-[80px] md:blur-[120px] rounded-full"></div>

    <!-- CONTENT -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">

        <div class="grid lg:grid-cols-[1.1fr_.9fr] gap-10 md:gap-14 items-center">

            <!-- LEFT -->
            <div>

                <span class="inline-flex items-center gap-2 px-4 py-2 md:px-5 md:py-3 rounded-full bg-[#AE1C21] backdrop-blur-xl border border-white/10 text-white font-black uppercase tracking-widest text-[10px] sm:text-xs md:text-sm">

                    <i class="fa-solid fa-user-graduate"></i>

                    Admissions Open 2026-27

                </span>

                <h2 class="mt-5 md:mt-7 text-3xl sm:text-5xl lg:text-7xl font-black text-black leading-tight">

                    Start Your
                    <span class="block text-[#AE1C21]">Child’s Journey</span>

                </h2>

                <p class="mt-5 md:mt-8 text-black text-sm sm:text-base md:text-lg leading-7 md:leading-9 text-justify max-w-2xl">

                    Give your child the opportunity to learn, grow and succeed
                    in a modern educational environment focused on values,
                    confidence and academic excellence.

                </p>

                <!-- BUTTONS -->
                <div class="mt-8 md:mt-10 flex flex-col sm:flex-row gap-4 md:gap-5">

                    <a href="admission" class="group inline-flex justify-center items-center gap-3 px-6 py-4  rounded-2xl md:rounded-2xl bg-white text-blue-700 font-black shadow-[0_25px_70px_rgba(255,255,255,0.25)] hover:-translate-y-2 transition duration-700">

                        Apply Now

                        <span class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-blue-100 flex items-center justify-center group-hover:translate-x-1 transition">
                            <i class="fa-solid fa-arrow-right"></i>
                        </span>

                    </a>

                    <a href="contact" class="inline-flex justify-center items-center gap-3 px-6  py-4  rounded-2xl md:rounded-2xl border border-white/20 bg-black backdrop-blur-xl text-white font-black hover:bg-white hover:text-blue-700 transition duration-700">

                        <i class="fa-solid fa-phone"></i>

                        Contact Office

                    </a>

                </div>

                <!-- STATS -->
                <div class="mt-8 md:mt-14 grid grid-cols-3 gap-3 md:gap-5 max-w-2xl">

                    <div class="bg-[#AE1C21] backdrop-blur-xl rounded-2xl md:rounded-2xl p-3 sm:p-4 md:p-5 border border-white/10 text-center">

                        <h3 class="text-xl sm:text-2xl md:text-4xl font-black text-white leading-none">
                            25+
                        </h3>

                        <p class="mt-1 md:mt-2 text-[11px] sm:text-sm md:text-base text-blue-100 font-bold">
                            Years
                        </p>

                    </div>

                    <div class="bg-[#AE1C21] backdrop-blur-xl rounded-2xl md:rounded-2xl p-3 sm:p-4 md:p-5 border border-white/10 text-center">

                        <h3 class="text-xl sm:text-2xl md:text-4xl font-black text-white leading-none">
                            1200+
                        </h3>

                        <p class="mt-1 md:mt-2 text-[11px] sm:text-sm md:text-base text-blue-100 font-bold">
                            Students
                        </p>

                    </div>

                    <div class="bg-[#AE1C21] backdrop-blur-xl rounded-2xl md:rounded-2xl p-3 sm:p-4 md:p-5 border border-white/10 text-center">

                        <h3 class="text-xl sm:text-2xl md:text-4xl font-black text-white leading-none">
                            45+
                        </h3>

                        <p class="mt-1 md:mt-2 text-[11px] sm:text-sm md:text-base text-blue-100 font-bold">
                            Teachers
                        </p>

                    </div>

                </div>

            </div>

            <!-- RIGHT IMAGE -->
            <div class="relative mt-10 md:ml-5 lg:mt-0">

                <!-- GLOW -->
                <div class="absolute inset-0 bg-cyan-300/20 blur-3xl rounded-full"></div>

                <!-- MAIN IMAGE -->
                <div class="relative bg-white/10 backdrop-blur-xl border border-white/10 rounded-[25px] md:rounded-[45px] p-3 md:p-5 shadow-[0_35px_90px_rgba(15,23,42,0.25)] overflow-hidden">

                    <div class="relative rounded-[20px] md:rounded-[35px] overflow-hidden h-[320px] sm:h-[420px] md:h-[560px]">

                        <img src="images/ig_boyscertificate.png"
                            class="w-full h-full object-cover hover:scale-110 transition duration-[2000ms]"
                            alt="School Students">

                        <!-- OVERLAY -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-slate-950/10 to-transparent"></div>

                        <!-- FLOATING CONTENT -->
                        <div class="absolute left-3 right-3 bottom-3 md:left-6 md:right-6 md:bottom-6 bg-white/90 backdrop-blur-xl rounded-[20px] md:rounded-[30px] p-4 md:p-6 shadow-2xl">

                            <div class="flex items-center gap-3 md:gap-5">

                                <div class="w-14 h-14 md:w-20 md:h-20 rounded-[18px] md:rounded-[24px] bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center text-white text-2xl md:text-4xl shadow-xl">

                                    <i class="fa-solid fa-school"></i>

                                </div>

                                <div>

                                    <h3 class="text-lg sm:text-2xl md:text-3xl font-black text-black">
                                        Admissions Open
                                    </h3>

                                    <p class="mt-1 md:mt-2 text-xs sm:text-sm md:text-base text-black font-semibold">
                                        Limited seats available for the new academic session.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- FLOATING CARD -->
                <div class="absolute -left-6 top-10 hidden lg:block">

                    <div class="bg-white rounded-[28px] p-5 shadow-[0_25px_70px_rgba(15,23,42,0.18)] border border-white">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-400 flex items-center justify-center text-white text-2xl shadow-xl">

                                <i class="fa-solid fa-award"></i>

                            </div>

                            <div>

                                <h4 class="text-2xl font-black text-black">
                                    Excellence
                                </h4>

                                <p class="text-slate-500 font-semibold text-sm">
                                    Modern Education
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



                <!-- RIGHT IMAGE -->
              

    <!-- FOOTER -->
    <?php include 'footer.php' ?>



    <!-- HERO SLIDER -->
    <script>
        const slides = document.querySelectorAll('.unique-slide');
        const dots = document.querySelectorAll('.unique-dot');

        let currentSlide = 0;

  function showSlide(index) {

    slides.forEach((slide, i) => {

        slide.classList.remove('opacity-100', 'scale-100');
        slide.classList.add('opacity-0', 'scale-95');

        dots[i].classList.remove('bg-red-700', 'h-10');
        dots[i].classList.add('bg-slate-300', 'h-2');
    });

    slides[index].classList.remove('opacity-0', 'scale-95');
    slides[index].classList.add('opacity-100', 'scale-100');

    dots[index].classList.remove('bg-slate-300', 'h-2');
    dots[index].classList.add('bg-red-700', 'h-10');
}

        setInterval(() => {
            currentSlide++;

            if (currentSlide >= slides.length) {
                currentSlide = 0;
            }

            showSlide(currentSlide);
        }, 3500);

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentSlide = index;
                showSlide(currentSlide);
            });
        });
    </script>

</body>

</html>