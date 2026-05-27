<?php

include 'admin/conn.php';

$success = '';
$error = '';

if (isset($_POST['submit_admission'])) {

    $student_name = trim($_POST['student_name']);
    $parent_name = trim($_POST['parent_name']);
    $mobile = trim($_POST['mobile']);
    $class_name = trim($_POST['class_name']);
    $message = trim($_POST['message']);

    if (
        $student_name != '' &&
        $parent_name != '' &&
        $mobile != '' &&
        $class_name != '' &&
        $message != ''
    ) {

        $insert = $pdo->prepare("
            INSERT INTO admission_enquiry
            (student_name, parent_name, mobile, class_name, message)
            VALUES (?, ?, ?, ?, ?)
        ");

        $insert->execute([
            $student_name,
            $parent_name,
            $mobile,
            $class_name,
            $message
        ]);

        $success = "Admission enquiry submitted successfully!";
    } else {

        $error = "Please fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission | Indira Gandhi School</title>

    <link rel="stylesheet" href="dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-white overflow-x-hidden">

    <?php include 'header.php'; ?>

    <!-- ADMISSION HERO -->
    <section class="relative min-h-[85vh] flex items-center overflow-hidden bg-slate-950 text-white">

        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1400&q=80"
                class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/90 to-blue-950/60"></div>
        </div>

        <div class="absolute top-20 right-20 w-80 h-80 border-[12px] border-white/10 rotate-12 rounded-[50px]"></div>
        <div class="absolute bottom-10 left-10 w-72 h-72 border-[12px] border-cyan-300/10 -rotate-12 rounded-[45px]"></div>

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-2 gap-14 items-center relative mt-20 z-10">

            <div>
                <span class="inline-flex items-center mt-20 gap-2 px-5 py-3 rounded-full bg-white/10 backdrop-blur-xl border border-white/10 text-cyan-300 font-black uppercase tracking-widest text-sm">
                    <i class="fa-solid fa-bell"></i>
                    Admission Open 2026-27
                </span>

                <h1 class="mt-7 text-5xl lg:text-7xl font-black leading-tight">
                    Secure Your Child’s
                    <span class="block text-cyan-300">Bright Future</span>
                </h1>

                <p class="mt-7 text-blue-100 text-lg leading-9 max-w-2xl">
                    Apply for admission at Indira Gandhi School Chandrapur.
                    Our admission team will guide you through class selection,
                    process, documents and counselling.
                </p>

                <div class="mt-10 flex flex-wrap gap-4">
                    <a href="#admission-form" class="px-9 py-5 rounded-2xl bg-cyan-400 text-slate-950 font-black shadow-xl hover:-translate-y-2 transition duration-500">
                        Fill Admission Form
                    </a>
                    <a href="#process" class="px-9 py-5 rounded-2xl bg-white/10 border border-white/10 backdrop-blur-xl text-white font-black hover:bg-white hover:text-slate-950 transition duration-500">
                        View Process
                    </a>
                </div>
            </div>

            <div class="relative">
                <div class="bg-white/10 backdrop-blur-xl border border-white/10 rounded-[40px] p-6 shadow-2xl">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-[28px] bg-white text-slate-900 p-6">
                            <h3 class="text-4xl font-black text-blue-700">25+</h3>
                            <p class="font-bold text-slate-500 mt-2">Years Excellence</p>
                        </div>
                        <div class="rounded-[28px] bg-cyan-400 text-slate-950 p-6 mt-10">
                            <h3 class="text-4xl font-black">1200+</h3>
                            <p class="font-bold mt-2">Happy Students</p>
                        </div>
                        <div class="rounded-[28px] bg-blue-600 text-white p-6">
                            <h3 class="text-4xl font-black">45+</h3>
                            <p class="font-bold text-blue-100 mt-2">Expert Teachers</p>
                        </div>
                        <div class="rounded-[28px] bg-white/10 border border-white/10 text-white p-6 mt-10">
                            <h3 class="text-4xl font-black">100%</h3>
                            <p class="font-bold text-blue-100 mt-2">Growth Focus</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- PROCESS TIMELINE -->
    <section id="process" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center max-w-3xl mx-auto">
                <span class="text-blue-700 font-black uppercase tracking-widest">Admission Process</span>
                <h2 class="mt-5 text-4xl lg:text-5xl font-black text-slate-900">Simple Steps To Admission</h2>
            </div>

            <div class="mt-16 grid lg:grid-cols-4 gap-6">

                <div class="relative p-8 rounded-[34px] bg-slate-50 border hover:-translate-y-3 transition duration-500">
                    <span class="text-6xl font-black text-blue-100">01</span>
                    <i class="fa-solid fa-file-signature text-4xl text-blue-700 mt-6 block"></i>
                    <h3 class="mt-5 text-2xl font-black">Submit Enquiry</h3>
                    <p class="mt-3 text-slate-600 leading-7">Fill student and parent details.</p>
                </div>

                <div class="relative p-8 rounded-[34px] bg-blue-700 text-white hover:-translate-y-3 transition duration-500 lg:mt-10">
                    <span class="text-6xl font-black text-white/20">02</span>
                    <i class="fa-solid fa-phone-volume text-4xl text-cyan-300 mt-6 block"></i>
                    <h3 class="mt-5 text-2xl font-black">School Call</h3>
                    <p class="mt-3 text-blue-100 leading-7">Our team contacts you for details.</p>
                </div>

                <div class="relative p-8 rounded-[34px] bg-slate-50 border hover:-translate-y-3 transition duration-500">
                    <span class="text-6xl font-black text-cyan-100">03</span>
                    <i class="fa-solid fa-clipboard-check text-4xl text-cyan-600 mt-6 block"></i>
                    <h3 class="mt-5 text-2xl font-black">Document Check</h3>
                    <p class="mt-3 text-slate-600 leading-7">Submit required documents.</p>
                </div>

                <div class="relative p-8 rounded-[34px] bg-cyan-500 text-white hover:-translate-y-3 transition duration-500 lg:mt-10">
                    <span class="text-6xl font-black text-white/20">04</span>
                    <i class="fa-solid fa-school-circle-check text-4xl text-white mt-6 block"></i>
                    <h3 class="mt-5 text-2xl font-black">Admission Confirm</h3>
                    <p class="mt-3 text-cyan-50 leading-7">Start your child’s journey.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- FORM SECTION -->
    <section id="admission-form" class="relative py-24 overflow-hidden bg-gradient-to-br from-cyan-50 via-white to-blue-50">

        <div class="max-w-7xl mx-auto px-6 grid lg:grid-cols-[.8fr_1.2fr] gap-12 items-start">

            <div class="sticky top-28 hidden lg:block">
                <div class="rounded-[40px] overflow-hidden shadow-2xl">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=900&q=80"
                        class="w-full h-[620px] object-cover">
                </div>
            </div>

            <div class="bg-white rounded-[40px] p-8 lg:p-10 shadow-[0_35px_90px_rgba(15,23,42,0.12)] border border-blue-100">

                <span class="text-blue-700 font-black uppercase tracking-widest">Admission Form</span>
                <h2 class="mt-4 text-4xl lg:text-5xl font-black text-slate-900">Send Admission Enquiry</h2>
                <p class="mt-4 text-slate-600 leading-8">Fill the form below. You can connect it with PHP backend later.</p>

                <?php if ($success != '') { ?>

                    <div class="bg-green-100 text-green-700 px-5 py-4 rounded-2xl mb-6">

                        <?php echo $success; ?>

                    </div>

                <?php } ?>

                <?php if ($error != '') { ?>

                    <div class="bg-red-100 text-red-700 px-5 py-4 rounded-2xl mb-6">

                        <?php echo $error; ?>

                    </div>

                <?php } ?>

                <form method="post" class="mt-10 space-y-5">

                    <div class="grid md:grid-cols-2 gap-5">
                        <input type="text" name="student_name" placeholder="Student Name" class="h-14 rounded-2xl border border-slate-200 px-5 outline-none focus:border-blue-700">
                        <input type="text" name="parent_name" placeholder="Parent Name" class="h-14 rounded-2xl border border-slate-200 px-5 outline-none focus:border-blue-700">
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">
                        <input type="tel" name="mobile" placeholder="Mobile Number" class="h-14 rounded-2xl border border-slate-200 px-5 outline-none focus:border-blue-700">
                        <select name="class_name" class="h-14 rounded-2xl border border-slate-200 px-5 outline-none focus:border-blue-700">
                            <option value="">Select Class</option>
                            <option value="primary">Primary</option>
                            <option value="middle">Middle School</option>
                            <option value="high">High School</option>
                        </select>
                    </div>

                    <textarea name="message" rows="6" placeholder="Message" class="w-full rounded-2xl border border-slate-200 p-5 outline-none focus:border-blue-700 resize-none"></textarea>

                    <button type="submit" name="submit_admission" class="w-full h-16 rounded-2xl bg-slate-950 text-white font-black hover:bg-blue-700 hover:-translate-y-2 transition duration-500">
                        Submit Enquiry
                    </button>

                </form>

            </div>

        </div>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>