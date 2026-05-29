<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About | Indira Gandhi School</title>

    <link rel="stylesheet" href="dist/output.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="bg-white overflow-x-hidden">

    <?php include 'header.php'; ?>


    <main class="overflow-hidden bg-white">

        <!-- HERO -->
        <section class="relative pt-24 pb-24 p-10 md:mt-20 overflow-hidden bg-gradient-to-br from-white via-blue-50 to-cyan-50">
            <!-- BACKGROUND -->
            <div class="absolute top-10 right-10 w-80 h-80 border-[14px] border-blue-700/10 rotate-12 rounded-[55px]"></div>

            <div class="absolute bottom-0 left-10 w-72 h-72 border-[12px] border-cyan-600/10 -rotate-12 rounded-[45px]"></div>

            <div class="absolute top-1/2 left-1/2 w-[450px] h-[450px] bg-blue-200/30 blur-[120px] rounded-full"></div>

            <div class="max-w-7xl mx-auto px-6   relative z-10 text-center">

                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">

                    <i class="fa-solid fa-school"></i>

                    About Our School

                </span>

                <h1 class="mt-7 text-4xl lg:text-7xl font-black text-black leading-tight">

                    Building Future
                    <span class="text-[#AE1C21]">Leaders With Values</span>

                </h1>

                <p class="mt-6 text-black text-lg leading-8 max-w-3xl mx-auto">

                    Indira Gandhi School Chandrapur provides quality education,
                    discipline, creativity and complete student development.

                </p>

            </div>

        </section>

        <?php

        include 'admin/conn.php';

        $stmt = $pdo->query("SELECT * FROM about_us LIMIT 1");
        $about = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>

        <!-- ABOUT -->
        <section class="relative py-24 bg-white overflow-hidden">

            <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-blue-200/20 blur-[120px] rounded-full"></div>

            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-cyan-200/20 blur-[120px] rounded-full"></div>

            <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-16 items-center relative z-10">

                <!-- IMAGE -->
                <div class="relative">

                    <div class="absolute -top-8 -left-8 w-40 h-40 bg-blue-300/20 blur-3xl rounded-full"></div>

                    <div class="relative bg-white rounded-[45px] p-5 shadow-[0_35px_90px_rgba(15,23,42,0.10)] border border-slate-100 overflow-hidden">

                        <div class="relative rounded-[35px] overflow-hidden h-[550px]">

                            <img src="admin/images/<?php echo $about['image']; ?>"
                                alt="About Image"
                                class="w-full h-full object-cover hover:scale-110 transition duration-[2000ms]">

                            <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/10 to-transparent"></div>

                            <div class="absolute left-6 right-6 bottom-6 bg-[#AE1C21] backdrop-blur-xl rounded-[28px] p-6 shadow-2xl">

                                <h3 class="text-3xl font-black text-white">
                                    25+ Years Of Excellence
                                </h3>

                                <p class="mt-2 text-white font-semibold">
                                    Trusted education with modern learning.
                                </p>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- CONTENT -->
                <div>

                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">
                        Who We Are
                    </span>

                    <h3 class="mt-5 text-2xl lg:text-6xl font-black text-black leading-tight">

                        A School Designed For
                        <span class="text-[#AE1C21]">Complete Development</span>

                    </h3>

                    <div class="mt-7 text-black leading-5 text-lg text-justify">

                        <?php echo $about['description']; ?>

                    </div>



                    <!-- FEATURES -->
                    <div class="mt-10 grid sm:grid-cols-2 gap-5">

                        <div class="group p-5 rounded-[28px] bg-blue-50 border border-blue-100 hover:-translate-y-2 transition duration-500">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center text-white text-2xl shadow-xl">

                                <i class="fa-solid fa-chalkboard-user"></i>

                            </div>

                            <h3 class="mt-5 text-2xl font-black text-black">
                                Expert Teachers
                            </h3>

                            <p class="mt-3 text-black leading-7">
                                Experienced faculty with modern teaching methods.
                            </p>

                        </div>



                        <div class="group p-5 rounded-[28px] bg-cyan-50 border border-cyan-100 hover:-translate-y-2 transition duration-500">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-700 flex items-center justify-center text-white text-2xl shadow-xl">

                                <i class="fa-solid fa-book-open-reader"></i>

                            </div>

                            <h3 class="mt-5 text-2xl font-black text-black">
                                Smart Learning
                            </h3>

                            <p class="mt-3 text-black leading-7">
                                Interactive and digital learning environment.
                            </p>

                        </div>



                        <div class="group p-5 rounded-[28px] bg-orange-50 border border-orange-100 hover:-translate-y-2 transition duration-500">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-400 flex items-center justify-center text-white text-2xl shadow-xl">

                                <i class="fa-solid fa-medal"></i>

                            </div>

                            <h3 class="mt-5 text-2xl font-black text-black">
                                Activities
                            </h3>

                            <p class="mt-3 text-black leading-7">
                                Sports, culture and confidence-building activities.
                            </p>

                        </div>



                        <div class="group p-5 rounded-[28px] bg-indigo-50 border border-indigo-100 hover:-translate-y-2 transition duration-500">

                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-indigo-500 to-blue-700 flex items-center justify-center text-white text-2xl shadow-xl">

                                <i class="fa-solid fa-user-shield"></i>

                            </div>

                            <h3 class="mt-5 text-2xl font-black text-black">
                                Safe Campus
                            </h3>

                            <p class="mt-3 text-black leading-7">
                                Secure and disciplined environment for students.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        <!-- MISSION & VISION -->
        <section class="relative py-24 overflow-hidden bg-[#AE1C21] text-white">

            <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-blue-500/20 blur-[120px] rounded-full"></div>

            <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-cyan-500/20 blur-[120px] rounded-full"></div>

            <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-2 gap-8 relative z-10">

                <!-- MISSION -->
                <div class="p-10 rounded-[40px] bg-white/10 backdrop-blur-xl border border-white/10 hover:-translate-y-2 transition duration-500">

                    <i class="fa-solid fa-bullseye text-6xl text-cyan-300"></i>

                    <h3 class="mt-6 text-4xl font-black">
                        Our Mission
                    </h3>

                    <p class="mt-5 text-blue-100 leading-8 text-lg">

                        To provide modern education with discipline, creativity,
                        values and personality development for every student.

                    </p>

                </div>



                <!-- VISION -->
                <div class="p-10 rounded-[40px] bg-white/10 backdrop-blur-xl border border-white/10 hover:-translate-y-2 transition duration-500">

                    <i class="fa-solid fa-eye text-6xl text-cyan-300"></i>

                    <h3 class="mt-6 text-4xl font-black">
                        Our Vision
                    </h3>

                    <p class="mt-5 text-blue-100 leading-8 text-lg">

                        To create confident, responsible and future-ready students
                        who contribute positively to society.

                    </p>

                </div>

            </div>

        </section>



        <!-- VALUES -->
        <section class="py-24 bg-white">

            <div class="max-w-7xl mx-auto px-6">

                <div class="text-center max-w-3xl mx-auto">

                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-[#FACC15] border border-blue-100 shadow-xl text-black font-black uppercase tracking-widest text-sm">
                        Core Values
                    </span>

                    <h2 class="mt-5 text-4xl lg:text-5xl font-black text-black">
                        What Makes
                        <span class="text-[#AE1C21]">Us Different</span>
                    </h2>

                </div>



                <div class="grid md:grid-cols-3 gap-8 mt-16">

                    <!-- VALUE -->
                    <div class="text-center p-8 rounded-[35px] bg-blue-50 border border-blue-100 hover:-translate-y-3 transition duration-500">

                        <div class="w-24 h-24 mx-auto rounded-[30px] bg-gradient-to-br from-blue-700 to-cyan-500 flex items-center justify-center text-white text-4xl shadow-2xl">

                            <i class="fa-solid fa-heart"></i>

                        </div>

                        <h3 class="mt-7 text-3xl font-black text-black">
                            Discipline
                        </h3>

                        <p class="mt-5 text-black leading-8">
                            Building responsibility, manners and strong character.
                        </p>

                    </div>



                    <!-- VALUE -->
                    <div class="text-center p-8 rounded-[35px] bg-cyan-50 border border-cyan-100 hover:-translate-y-3 transition duration-500">

                        <div class="w-24 h-24 mx-auto rounded-[30px] bg-gradient-to-br from-cyan-500 to-blue-700 flex items-center justify-center text-white text-4xl shadow-2xl">

                            <i class="fa-solid fa-lightbulb"></i>

                        </div>

                        <h3 class="mt-7 text-3xl font-black text-black">
                            Creativity
                        </h3>

                        <p class="mt-5 text-black leading-8">
                            Encouraging innovation, ideas and creative thinking.
                        </p>

                    </div>



                    <!-- VALUE -->
                    <div class="text-center p-8 rounded-[35px] bg-orange-50 border border-orange-100 hover:-translate-y-3 transition duration-500">

                        <div class="w-24 h-24 mx-auto rounded-[30px] bg-gradient-to-br from-orange-500 to-amber-400 flex items-center justify-center text-white text-4xl shadow-2xl">

                            <i class="fa-solid fa-trophy"></i>

                        </div>

                        <h3 class="mt-7 text-3xl font-black text-black">
                            Excellence
                        </h3>

                        <p class="mt-5 text-black leading-8">
                            Maintaining high-quality education and achievements.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        <!-- CTA -->
        <section class="relative py-24 overflow-hidden bg-[#FACC15]">

            <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-white/10 blur-[120px] rounded-full"></div>

            <div class="max-w-5xl mx-auto px-6 text-center relative z-10">

                <h2 class="text-4xl lg:text-6xl font-black text-black">

                    Join Indira Gandhi Garden School Today

                </h2>

                <p class="mt-6 text-black text-lg leading-8">

                    Admissions are open for the new academic session.
                    Start your child’s learning journey with us.

                </p>

                <a href="contact.php"
                    class="inline-flex mt-10 px-10 py-5 rounded-[20px] bg-white text-black font-black shadow-[0_25px_70px_rgba(255,255,255,0.25)] hover:bg-slate-950 hover:text-white hover:-translate-y-2 transition duration-500">

                    Contact Admission Office

                </a>

            </div>

        </section>

    </main>


    <?php include 'footer.php'; ?>

</body>

</html>