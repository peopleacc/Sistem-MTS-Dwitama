<nav
    class="w-full h-[60px] bg-white shadow-md flex items-center justify-between px-4 lg:px-6 z-[300] relative border-b border-gray-100">

    <div class="flex items-center gap-4">
        <!-- Sidebar toggle button (all screen sizes) -->
        <button id="sidebarToggleBtn" class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-all duration-200"
            aria-label="Toggle sidebar" onclick="toggleSidebar()">
            <!-- Hamburger icon (shown when sidebar closed) -->
            <svg id="iconHamburger" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <!-- Arrow left icon (shown when sidebar open) -->
            <svg id="iconArrow" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>

        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center shadow-md">
                <img src="{{ asset('image/logodtps2.png') }}" alt="Logo" class="h-8 w-auto"
                    onerror="this.style.display='none'">
            </div>
            <div>
                <span class="font-bold text-lg text-gray-800 tracking-tight">MTS System</span>
                <p class="text-xs text-gray-500">Marketing Tracking System</p>
            </div>
        </div>
    </div>

    <!-- Center: Welcome Message -->
    <div class="hidden lg:flex flex-col items-center">
        <span class="text-lg font-semibold text-gray-800">Welcome Back, {{ Auth::user()->name ?? 'User' }}</span>
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span>{{ now()->format('d M Y') }}</span>
        </div>
    </div>

    <div class="flex items-center gap-3 lg:gap-5">
        <!-- Status Badge -->
        <div class="hidden sm:flex items-center gap-2 bg-green-50 px-3 py-1.5 rounded-full border border-green-200">
            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
            <span class="text-xs font-medium text-green-600">Online</span>
        </div>

        <!-- User Dropdown -->
        <div class="relative" x-data="{ open: false }">
            <button onclick="toggleUserDropdown()"
                class="flex items-center gap-3 p-2 rounded-xl hover:bg-gray-100 transition-all duration-200">
                <div class="hidden md:block text-right">
                    <div class="text-sm font-medium text-gray-800">{{ Auth::user()->name ?? 'User' }}</div>
                    <div class="text-xs text-gray-500">{{ Auth::user()->role ?? 'Admin' }}</div>
                </div>

                <!-- User Avatar -->
                <div
                    class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white shadow-md ring-2 ring-red-100 overflow-hidden">
                    @if(Auth::user()->foto)
                        <img src="{{ route('profile.photo', Auth::user()->id) }}" alt="Profile"
                            class="w-full h-full object-cover">
                    @else
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                        </svg>
                    @endif
                </div>

                <!-- Dropdown Arrow -->
                <svg class="w-4 h-4 text-gray-500 hidden md:block" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>

            <!-- Dropdown Menu -->
            <div id="userDropdown"
                class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50">
                <!-- Tambah Akun -->
                <a href="{{ route('users.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                    </svg>
                    <span>Tambah Akun</span>
                </a>

                <hr class="my-1 border-gray-100">

                <!-- Logout -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 transition-colors duration-150">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
    function toggleUserDropdown() {
        const dropdown = document.getElementById('userDropdown');
        dropdown.classList.toggle('hidden');
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function (event) {
        const dropdown = document.getElementById('userDropdown');
        const button = event.target.closest('button[onclick="toggleUserDropdown()"]');

        if (!button && dropdown && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
</script>