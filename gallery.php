<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Gallery | Indira Gandhi School</title>

    <link rel="stylesheet" href="dist/output.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap" rel="stylesheet">

<style>
body{
    font-family:'Inter',sans-serif;
}
html{
    scroll-behavior:smooth;
}
</style>
</head>

<body class="bg-white overflow-x-hidden">
<?php include 'header.php'; ?>

<main class="overflow-hidden bg-[#050816] text-white">

<!-- UNIQUE GALLERY HERO -->
<section class="relative min-h-screen flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,#38bdf8,transparent_35%),radial-gradient(circle_at_bottom_right,#f97316,transparent_30%)] opacity-30"></div>
    <div class="absolute inset-0 bg-[#050816]/90"></div>

    <div class="max-w-7xl mx-auto px-6 relative z-10 grid lg:grid-cols-2 gap-14 items-center">
        <div>
            <span class="inline-flex px-5 py-3 rounded-full bg-white/10 border border-white/10 text-cyan-300 font-black tracking-widest uppercase">
                <i class="fa-solid fa-camera-retro mr-2"></i> School Memories
            </span>

            <h1 class="mt-8 text-5xl lg:text-8xl font-black leading-tight">
                Moments That <span class="text-cyan-300">Inspire</span>
            </h1>

            <p class="mt-6 text-slate-300 text-lg leading-8 max-w-xl">
                A creative glimpse of classroom learning, activities, celebrations and student life at Indira Gandhi School.
            </p>

            <a href="#gallery" class="inline-flex mt-9 px-8 py-4 rounded-full bg-cyan-400 text-slate-950 font-black hover:bg-orange-400 hover:-translate-y-2 transition duration-500">
                View Gallery
            </a>
        </div>

        <div class="grid grid-cols-2 gap-5 rotate-2">
            <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=700&q=80" class="h-72 w-full object-cover rounded-[40px] shadow-2xl hover:scale-105 transition duration-700 mt-10">
            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=700&q=80" class="h-96 w-full object-cover rounded-[40px] shadow-2xl mt-14 hover:scale-105 transition duration-700">
            <img src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=700&q=80" class="h-96 w-full object-cover rounded-[40px] shadow-2xl -mt-14 hover:scale-105 transition duration-700 mb-6">
            <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?auto=format&fit=crop&w=700&q=80" class="h-72 w-full object-cover rounded-[40px] shadow-2xl hover:scale-105 transition duration-700 ">
        </div>
    </div>
</section>

<!-- CATEGORY STRIP -->
<section class="py-12 bg-white text-slate-950">
    <div class="max-w-7xl mx-auto px-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="p-7 rounded-[30px] bg-slate-100 hover:bg-cyan-100 hover:-translate-y-2 transition duration-500">
            <i class="fa-solid fa-book-open text-4xl text-cyan-600"></i>
            <h3 class="mt-4 text-xl font-black">Learning</h3>
        </div>
        <div class="p-7 rounded-[30px] bg-slate-100 hover:bg-orange-100 hover:-translate-y-2 transition duration-500">
            <i class="fa-solid fa-futbol text-4xl text-orange-500"></i>
            <h3 class="mt-4 text-xl font-black">Sports</h3>
        </div>
        <div class="p-7 rounded-[30px] bg-slate-100 hover:bg-blue-100 hover:-translate-y-2 transition duration-500">
            <i class="fa-solid fa-music text-4xl text-blue-600"></i>
            <h3 class="mt-4 text-xl font-black">Events</h3>
        </div>
        <div class="p-7 rounded-[30px] bg-slate-100 hover:bg-emerald-100 hover:-translate-y-2 transition duration-500">
            <i class="fa-solid fa-users text-4xl text-emerald-600"></i>
            <h3 class="mt-4 text-xl font-black">Student Life</h3>
        </div>
    </div>
</section>

<!-- UNIQUE MASONRY GALLERY -->
<section id="gallery" class="py-24 bg-[#050816]">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center max-w-3xl mx-auto">
            <span class="text-cyan-300 font-black uppercase tracking-widest">Photo Wall</span>
            <h2 class="mt-5 text-4xl lg:text-6xl font-black">Our Beautiful Campus Stories</h2>
        </div>

        <div class="mt-16 columns-1 sm:columns-2 lg:columns-3 gap-6 space-y-6">

            <?php
            $gallery = [
                ["https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=900&q=80","Classroom Learning"],
                ["https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=900&q=80","Campus Life"],
                ["https://images.unsplash.com/photo-1571260899304-425eee4c7efc?auto=format&fit=crop&w=900&q=80","Library"],
                ["https://images.unsplash.com/photo-1544717297-fa95b6ee9643?auto=format&fit=crop&w=900&q=80","Activities"],
                ["https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=900&q=80","Reading Time"],
                ["https://images.unsplash.com/photo-1529390079861-591de354faf5?auto=format&fit=crop&w=900&q=80","Celebrations"]
            ];

            foreach($gallery as $item){
            ?>
            <div class="group break-inside-avoid relative overflow-hidden rounded-[35px] bg-white/10 border border-white/10 shadow-2xl">
                <img src="<?php echo $item[0]; ?>" class="w-full object-cover group-hover:scale-110 transition duration-[1200ms]">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-90"></div>
                <div class="absolute bottom-0 left-0 right-0 p-6 translate-y-3 group-hover:translate-y-0 transition duration-500">
                    <h3 class="text-2xl font-black"><?php echo $item[1]; ?></h3>
                    <p class="mt-2 text-slate-300">Indira Gandhi School Chandrapur</p>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
</section>

<!-- FINAL CTA -->
<section class="relative py-24 bg-white text-slate-950 overflow-hidden">
    <div class="absolute -top-24 -left-24 w-80 h-80 bg-cyan-200 rounded-full blur-3xl opacity-60"></div>
    <div class="absolute -bottom-24 -right-24 w-80 h-80 bg-orange-200 rounded-full blur-3xl opacity-60"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-6 text-center">
        <h2 class="text-4xl lg:text-6xl font-black">Want To Visit Our Campus?</h2>
        <p class="mt-6 text-black text-lg">Connect with us and experience our school environment personally.</p>
        <a href="contact.php" class="inline-flex mt-10 px-10 py-5 rounded-full bg-slate-950 text-white font-black hover:bg-cyan-500 hover:text-slate-950 hover:-translate-y-2 transition duration-500">
            Contact School
        </a>
    </div>
</section>

</main>

<?php include 'footer.php'; ?>

</body>
</html>