<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - MTS System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Sidebar transition for main content */
        #mainContent {
            transition: margin-left 0.3s ease-in-out;
            margin-left: 0;
        }

        #mainContent.sidebar-open {
            margin-left: 260px;
        }

        /* On mobile, main content should never shift */
        @media (max-width: 767px) {
            #mainContent.sidebar-open {
                margin-left: 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans min-h-screen">

    <!-- Sidebar component -->
    <x-sidebar />

    <!-- Main Container -->
    <div id="mainContent" class="flex flex-col min-h-screen transition-all duration-300">
        <!-- Navbar component -->
        <x-nav />

        <!-- Main Content -->
        <main class="flex-1 p-4 lg:p-6 overflow-x-hidden">
            <div class="max-w-7xl mx-auto animate-fade-in">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>

<script>
    let sidebarOpen = false;

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const mainContent = document.getElementById('mainContent');
        const iconHamburger = document.getElementById('iconHamburger');
        const iconArrow = document.getElementById('iconArrow');

        if (!sidebar) return;

        sidebarOpen = !sidebarOpen;

        if (sidebarOpen) {
            // Open sidebar
            sidebar.classList.remove('-translate-x-full');
            if (overlay && window.innerWidth < 768) {
                overlay.classList.remove('hidden');
            }
            if (mainContent && window.innerWidth >= 768) {
                mainContent.classList.add('sidebar-open');
            }
            // Switch icons
            if (iconHamburger) iconHamburger.classList.add('hidden');
            if (iconArrow) iconArrow.classList.remove('hidden');
        } else {
            // Close sidebar
            sidebar.classList.add('-translate-x-full');
            if (overlay) {
                overlay.classList.add('hidden');
            }
            if (mainContent) {
                mainContent.classList.remove('sidebar-open');
            }
            // Switch icons
            if (iconHamburger) iconHamburger.classList.remove('hidden');
            if (iconArrow) iconArrow.classList.add('hidden');
        }
    }

    // Handle resize events
    window.addEventListener('resize', function () {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const mainContent = document.getElementById('mainContent');

        if (window.innerWidth >= 768) {
            // Desktop: hide overlay, keep sidebar state
            if (overlay && !overlay.classList.contains('hidden')) {
                overlay.classList.add('hidden');
            }
            // If sidebar is open on desktop, shift main content
            if (sidebarOpen && mainContent) {
                mainContent.classList.add('sidebar-open');
            }
        } else {
            // Mobile: remove main content shift, show overlay if sidebar open
            if (mainContent) {
                mainContent.classList.remove('sidebar-open');
            }
            if (sidebarOpen && overlay) {
                overlay.classList.remove('hidden');
            }
        }
    });
</script>