<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indira Gandhi College</title>

    <link rel="stylesheet" href="output.css">

    <script>
        let sidebarOpen = true;

        function toggleSidebar() {

            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');

            sidebarOpen = !sidebarOpen;

            // DESKTOP
            if (window.innerWidth >= 1024) {

                if (sidebarOpen) {

                    sidebar.classList.remove('-translate-x-full');
                    mainContent.classList.add('lg:pl-60');

                } else {

                    sidebar.classList.add('-translate-x-full');
                    mainContent.classList.remove('lg:pl-60');

                }

            }

            // MOBILE
            else {

                if (sidebarOpen) {

                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.remove('hidden');

                } else {

                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('hidden');

                }

            }

        }
    </script>

</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <!-- HEADER -->
    <header class="fixed top-0 left-0 right-0 h-16 bg-white border-b border-slate-200 z-50">

        <div class="h-full px-5 flex items-center justify-between">

            <!-- LEFT -->
            <div class="flex items-center gap-4">

                <!-- TOGGLE -->
                <button onclick="toggleSidebar()"
                    class="bg-slate-800 text-white w-11 h-10 rounded-xl flex items-center justify-center">

                    ☰

                </button>

                <!-- TITLE -->
                <div>

                    <h1 class="text-lg lg:text-2xl font-bold text-blue-900">
                        Indira Gandhi Garden School
                    </h1>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="relative">

                <!-- ADMIN BOX -->
                <div
                    onclick="toggleProfileMenu()"
                    class="bg-gray-400 hover:bg-gray-300 px-3 md:px-4 py-1 rounded-xl flex items-center gap-5 cursor-pointer transition">

                    <!-- IMAGE -->
                    <img
                        src="<?php echo !empty($admin['profile_image'])
                                    ? 'images/' . $admin['profile_image']
                                    : 'images/default-profile.webp'; ?>"

                        class="w-10 h-10 md:w-12 md:h-12 rounded-full border-2 border-blue-900 object-contain"
                        alt="">

                    <!-- TEXT -->
                    <div class="hidden md:block">

                        <h4 class="font-semibold text-gray-700">
                            Admin
                        </h4>

                    </div>

                </div>

                <!-- DROPDOWN -->
                <div
                    id="profileMenu"
                    class="hidden absolute right-0 top-14 w-48 bg-white rounded-xl shadow-lg border border-slate-200 z-[9999]">

                    <a
                        href="profile"
                        class="block px-5 py-3 hover:bg-slate-300 transition text-slate-700 font-medium">

                        Profile

                    </a>

                    <a
                        href="logout"
                        class="block px-5 py-3 hover:bg-red-600 hover:text-white transition text-slate-700 font-medium border-t border-slate-100">

                        Logout

                    </a>

                </div>

            </div>

        </div>

    </header>

    <script>
        function toggleProfileMenu() {

            const profileMenu = document.getElementById('profileMenu');

            profileMenu.classList.toggle('hidden');

        }

        // CLOSE DROPDOWN WHEN CLICKING OUTSIDE
        window.addEventListener('click', function(e) {

            const profileMenu = document.getElementById('profileMenu');

            if (!e.target.closest('.relative')) {

                profileMenu.classList.add('hidden');

            }

        });
    </script>