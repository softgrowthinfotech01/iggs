<?php

include 'admin/conn.php';

$success = '';
$error = '';

if (isset($_POST['submit_contact'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $message = trim($_POST['message']);

    if ($name != '' && $email != '' && $mobile != '' && $message != '') {

        $insert = $pdo->prepare("
            INSERT INTO contact_us
            (name, email, mobile, message)
            VALUES (?, ?, ?, ?)
        ");

        $insert->execute([
            $name,
            $email,
            $mobile,
            $message
        ]);

        $success = "Message submitted successfully!";

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

<title>Contact | Indira Gandhi School</title>

    <link rel="stylesheet" href="dist/output.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Inter',sans-serif;
}
</style>
</head>

<body class="bg-white overflow-x-hidden">

<?php include 'header.php'; ?>

<main>

<!-- UNIQUE CONTACT HERO -->
<section class="relative min-h-screen bg-white overflow-hidden flex items-center">

    <div class="absolute inset-y-0 right-0  bg-gradient-to-br from-blue-700 to-cyan-500 rounded-l-[90px] hidden lg:block"></div>

    <div class="absolute top-20 left-10 w-72 h-72 border-[12px] border-blue-700/10 rotate-12 rounded-[50px]"></div>
    <div class="absolute bottom-10 left-1/3 w-52 h-52 border-[10px] border-cyan-500/10 -rotate-12 rounded-[35px]"></div>

    <div class="max-w-7xl mt-20 mx-auto px-6 grid lg:grid-cols-[1fr_.9fr] gap-16 items-center relative z-10">

        <!-- LEFT -->
        <div class="mt-20">
            <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-blue-50 text-blue-700 font-black uppercase tracking-widest text-sm">
                <i class="fa-solid fa-paper-plane"></i>
                Contact School Office
            </span>

            <h1 class="mt-7 text-5xl lg:text-7xl font-black text-slate-900 leading-tight">
                Let’s Talk About
                <span class="block text-blue-700">Your Child’s Future</span>
            </h1>

            <p class="mt-7 text-slate-600 text-lg leading-9 max-w-2xl">
                Have questions about admission, academics, campus visit or school facilities?
                Our office team is ready to help you.
            </p>

            <!-- QUICK CONTACT -->
            <div class="mt-20 space-y-5 p-10">

                <a href="tel:+919876543210" class="flex items-center gap-5 group">
                    <div class="w-16 h-16 rounded-full bg-blue-700 text-white flex items-center justify-center text-2xl group-hover:scale-110 transition">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 font-bold">Call Us</p>
                        <h3 class="text-2xl font-black text-slate-900">+91 7775883933</h3>
                    </div>
                </a>

                <a href="mailto:info@indiragandhischool.edu.in" class="flex items-center gap-5 group">
                    <div class="w-16 h-16 rounded-full bg-cyan-500 text-white flex items-center justify-center text-2xl group-hover:scale-110 transition">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <p class="text-slate-500 font-bold">Email</p>
                        <h3 class="text-2xl font-black text-slate-900">indiragandhigardenschool2023@gmail.com</h3>
                    </div>
                </a>

            </div>
        </div>

        <!-- RIGHT FORM FLOATING -->
        <div class="relative">

            <div class="relative bg-white rounded-[45px] p-8 shadow-[0_40px_100px_rgba(15,23,42,0.22)] border border-slate-100">

                <div class="absolute -top-8 mt-8 left-8 px-6 py-4 rounded-2xl bg-slate-950 text-white font-black shadow-xl">
                    <i class="fa-solid fa-message mr-2"></i> Send Message
                </div>

                

                <form method="post" class="mt-8 space-y-5">

                    <input type="text" placeholder="Your Name" name="name"
                           class="w-full h-16 rounded-2xl bg-slate-50 border border-slate-200 px-5 outline-none focus:border-blue-700">

                    <input type="email" placeholder="Email Address" name="email"
                           class="w-full h-16 rounded-2xl bg-slate-50 border border-slate-200 px-5 outline-none focus:border-blue-700">

                    <input type="tel" placeholder="Mobile Number" name="mobile"
                           class="w-full h-16 rounded-2xl bg-slate-50 border border-slate-200 px-5 outline-none focus:border-blue-700">

                    <textarea rows="5" placeholder="Your Message" name="message"
                              class="w-full rounded-2xl bg-slate-50 border border-slate-200 p-5 outline-none focus:border-blue-700 resize-none"></textarea>

                    <button type="submit" name="submit_contact"
                            class="w-full h-16 rounded-2xl bg-gradient-to-r from-blue-700 to-cyan-500 text-white font-black text-lg hover:-translate-y-2 transition duration-500 shadow-xl">
                        Submit Message
                    </button>

                </form>

            </div>

        </div>

    </div>
</section>

<!-- CONTACT STRIP -->
<section class="py-16 bg-slate-950 text-white">
    <div class="max-w-7xl mx-auto px-6 grid md:grid-cols-3 gap-8">

        <div>
            <i class="fa-solid fa-location-dot text-4xl text-cyan-300"></i>
            <h3 class="mt-5 text-2xl font-black">Visit Campus</h3>
            <p class="mt-3 text-slate-300">Indira Gandhi Garden School, Chandrapur, Maharashtra</p>
        </div>

        <div>
            <i class="fa-solid fa-clock text-4xl text-cyan-300"></i>
            <h3 class="mt-5 text-2xl font-black">Office Hours</h3>
            <p class="mt-3 text-slate-300">Monday to Saturday<br>9:00 AM to 4:00 PM</p>
        </div>

        <div>
            <i class="fa-solid fa-user-graduate text-4xl text-cyan-300"></i>
            <h3 class="mt-5 text-2xl font-black">Admission Help</h3>
            <p class="mt-3 text-slate-300">Get guidance about admission process and class details.</p>
        </div>

    </div>
</section>

<!-- MAP STYLE -->
<section class="relative py-20 overflow-hidden bg-white">

    <!-- BACKGROUND SKETCHES -->
    <div class="absolute inset-0 overflow-hidden opacity-[0.30]">

        <!-- BIG BOX -->
        <div class="absolute top-10 left-10 w-80 h-80 border-[14px] border-blue-700 rotate-12 rounded-[50px]"></div>

        <!-- SMALL BOX -->
        <div class="absolute top-32 right-20 w-52 h-52 border-[10px] border-cyan-500 -rotate-12 rounded-[35px]"></div>

        <!-- CIRCLE -->
        <div class="absolute bottom-10 left-1/3 w-96 h-96 border-[16px] border-blue-900 rounded-full"></div>

        <!-- DASHED CIRCLE -->
        <div class="absolute top-1/2 right-0 w-72 h-72 border-[12px] border-dashed border-cyan-600 rounded-full"></div>

        <!-- LINES -->
        <div class="absolute top-24 left-1/4 w-[400px] h-[2px] bg-blue-700 rotate-[18deg]"></div>

        <div class="absolute bottom-24 right-1/4 w-[350px] h-[2px] bg-cyan-600 -rotate-[15deg]"></div>

        <!-- DOT GRID -->
        <div class="absolute bottom-10 left-20 grid grid-cols-5 gap-3">

            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>

            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>
            <span class="w-3 h-3 bg-blue-700 rounded-full"></span>

        </div>

    </div>

    <!-- GLOW -->
    <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-blue-200/30 blur-[120px] rounded-full"></div>

    <div class="absolute bottom-0 right-0 w-[400px] h-[400px] bg-cyan-200/30 blur-[120px] rounded-full"></div>



    <div class="max-w-7xl mx-auto px-6 relative z-10">

        <div class="grid lg:grid-cols-[.8fr_1.2fr] gap-8 items-stretch">

            <!-- LEFT CONTENT -->
            <div class="rounded-[40px] bg-white/80 backdrop-blur-xl p-10 border border-blue-100 shadow-[0_25px_70px_rgba(15,23,42,0.08)]">

                <span class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-blue-50 text-blue-700 font-black uppercase tracking-widest text-sm">

                    <i class="fa-solid fa-map-location-dot"></i>

                    School Location

                </span>

                <h2 class="mt-6 text-4xl font-black text-slate-900">
                    Find Us Easily
                </h2>

                <p class="mt-5 text-slate-600 leading-8 text-lg">
                    Visit Indira Gandhi School Chandrapur and explore
                    our modern campus, learning environment and facilities.
                </p>

                <div class="mt-8 space-y-5">

                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-700 to-cyan-500 text-white flex items-center justify-center text-xl shadow-xl">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        <div>

                            <h3 class="font-black text-slate-900 text-lg">
                                Indira Gandhi Garden school
                            </h3>

                            <p class="text-slate-500">
                                Chandrapur, Maharashtra
                            </p>

                        </div>

                    </div>



                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-cyan-500 to-blue-700 text-white flex items-center justify-center text-xl shadow-xl">

                            <i class="fa-solid fa-phone"></i>

                        </div>

                        <div>

                            <h3 class="font-black text-slate-900 text-lg">
                                Contact Number
                            </h3>

                            <p class="text-slate-500">
                                +91 7775883933
                            </p>

                        </div>

                    </div>



                    <div class="flex items-center gap-4">

                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-orange-500 to-amber-400 text-white flex items-center justify-center text-xl shadow-xl">

                            <i class="fa-solid fa-clock"></i>

                        </div>

                        <div>

                            <h3 class="font-black text-slate-900 text-lg">
                                Office Timing
                            </h3>

                            <p class="text-slate-500">
                                Monday to Saturday • 9 AM - 4 PM
                            </p>

                        </div>

                    </div>

                </div>

            </div>



            <!-- GOOGLE MAP -->
            <div class="rounded-[35px] overflow-hidden border border-slate-200 shadow-[0_25px_70px_rgba(15,23,42,0.10)] min-h-[420px] bg-white">

                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3750.1137271588!2d79.28285337468677!3d19.961718923571762!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bd2d67e9c9b2843%3A0xfbbf02baafca4563!2sIndira%20Gandhi%20garden%20school!5e0!3m2!1sen!2sin!4v1779712413898!5m2!1sen!2sin"
                    width="100%"
                    height="100%"
                    style="border:0; min-height:420px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>

            </div>

        </div>

    </div>

</section>

</main>

<?php include 'footer.php'; ?>

</body>
</html>