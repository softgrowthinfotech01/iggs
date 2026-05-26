<!-- MOBILE OVERLAY -->
<div id="sidebarOverlay"
    onclick="toggleSidebar()"
    class="fixed inset-0 bg-black/50 z-30 hidden lg:hidden">
</div>

<!-- SIDEBAR -->
<aside id="sidebar"
    class="fixed top-16 left-0 bottom-0 z-40 w-60 bg-slate-800 text-white transition-transform duration-300">

    <div class="flex flex-col h-full">

        <!-- MENU -->
        <!-- MENU -->
        <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

            <!-- Dashboard -->
            <a href="dashboard" id="dashboard-link"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 12l2-2m0 0l7-7 7 7m-9 2v8m4-8v8m5-10l2 2m-2-2v10a1 1 0 01-1 1h-3m-10 0H5a1 1 0 01-1-1V10" />

                </svg>

                Dashboard

            </a>

            <!-- About Us -->
            <a href="about_us" id="about_us-link"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                </svg>

                About Us

            </a>

            <!-- Principal's Message -->
            <a href="principal_message" id="principal_msg-link"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M8 10h8M8 14h5m-7 7h12a2 2 0 002-2V7l-5-5H6a2 2 0 00-2 2v15a2 2 0 002 2z" />

                </svg>

                Principal's Message

            </a>

            <!-- Slider Images -->
            <a href="slider_images" id="slider_images-link"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M3 5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5z" />

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M8.5 10a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M21 15l-5-5L5 21" />

                </svg>

                Slider Images

            </a>

            <!-- Contact Us -->
            <a href="contact_us"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M21 8V7l-3 2-2-2-4 4-2-2-5 5m16-6v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8m18 0l-9 6-9-6" />

                </svg>

                Contact Us

            </a>

            <!-- Admission -->
            <a href="admission"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-6-3h12" />

                </svg>

                Admission Enquiry

            </a>

            <!-- Galley -->
            <a href="gallery"
    class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

    <svg xmlns="http://www.w3.org/2000/svg"
        class="w-5 h-5"
        fill="none"
        viewBox="0 0 24 24"
        stroke="currentColor">

        <rect x="3"
            y="5"
            width="18"
            height="14"
            rx="2"
            ry="2"
            stroke-width="1.8" />

        <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.8"
            d="M7 15l3-3 2 2 4-4 1 1" />

        <path stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.8"
            d="M8 9h.01" />

    </svg>

    Gallery

</a>

        </nav>

        <!-- LOGOUT -->
        <div class="p-4 ">

            <a href="logout"
                class="flex items-center justify-center gap-3 w-full bg-red-500 hover:bg-red-600 px-4 py-3 rounded-xl text-sm font-medium transition">

                Logout

            </a>

        </div>

    </div>

</aside>

<!-- Sidebar Highlight -->
<script>
    const path = window.location.pathname;

    if (path.includes('dashboard')) {

        document.getElementById('dashboard-link')
            .classList.add('bg-white/10', 'border', 'border-white/10');

    } else if (path.includes('about_us')) {

        document.getElementById('about_us-link')
            .classList.add('bg-white/10', 'border', 'border-white/10');

    } else if (path.includes('principal_msg')) {

        document.getElementById('principal_msg-link')
            .classList.add('bg-white/10', 'border', 'border-white/10');

    } else if (path.includes('slider_images')) {

        document.getElementById('slider_images-link')
            .classList.add('bg-white/10', 'border', 'border-white/10');

    }
</script>
<!-- Sidebar Highlight -->