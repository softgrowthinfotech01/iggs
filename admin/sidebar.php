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
            <a href="principal_msg" id="principal_msg-link"
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

            <!-- Courses -->
            <!-- <a href="#"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M12 6.253v13m0-13C10.832 5.483 9.246 5 7.5 5 5.754 5 4.168 5.483 3 6.253v13C4.168 18.483 5.754 18 7.5 18c1.746 0 3.332.483 4.5 1.253m0-13C13.168 5.483 14.754 5 16.5 5c1.746 0 3.332.483 4.5 1.253v13C19.832 18.483 18.246 18 16.5 18c-1.746 0-3.332.483-4.5 1.253" />

                </svg>

                Courses

            </a> -->

            <!-- Reports -->
            <!-- <a href="#"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M9 17v-6m4 6V7m4 10v-3M5 21h14" />

                </svg>

                Reports

            </a> -->

            <!-- Settings -->
            <!-- <a href="#"
                class="flex items-center gap-3 hover:bg-white/5 px-4 py-3 rounded-xl text-sm font-medium transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M11.983 13.983a2 2 0 100-3.966 2 2 0 000 3.966z" />

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="1.8"
                        d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09a1.65 1.65 0 00-1-1.51 1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09a1.65 1.65 0 001.51-1 1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33h.09A1.65 1.65 0 0010 3.09V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51h.09a1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82v.09A1.65 1.65 0 0020.91 10H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z" />

                </svg>

                Settings

            </a> -->

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