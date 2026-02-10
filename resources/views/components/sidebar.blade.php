<aside id="sidebar"
    class="fixed inset-y-0 left-0 z-40 w-[260px] bg-white shadow-xl flex flex-col transition-transform duration-300 ease-in-out -translate-x-full"
    style="height: 100vh; height: 100dvh;">

    <!-- Sidebar Header with Close Button -->
    <div class="flex items-center justify-between p-4 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <div
                class="w-8 h-8 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </div>
            <span class="font-bold text-sm text-gray-700">Menu</span>
        </div>
        <button onclick="toggleSidebar()"
            class="p-1.5 rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all duration-200"
            aria-label="Close sidebar">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Profile Section -->
    <div class="p-5 border-b border-gray-100">
        <div class="flex items-center gap-3 mb-4">
            <div
                class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center text-white shadow-md overflow-hidden">
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
            <div>
                <h3 class="text-sm font-semibold text-gray-500">Your Info</h3>
            </div>
        </div>

        <!-- Profile Details Card -->
        <div class="bg-gray-50 rounded-xl p-4 space-y-2">
            <div>
                <div class="text-base font-bold text-gray-800">{{ Auth::user()->name ?? 'User' }}</div>
                <div class="text-sm text-red-600 italic">{{ Auth::user()->role ?? 'Role' }}</div>
            </div>
            <div class="text-sm text-gray-600 leading-relaxed">
                <div>{{ Auth::user()->alamat ?? 'Alamat belum diisi' }}</div>
            </div>
            <div class="text-sm text-gray-500">
                {{ Auth::user()->notelp ?? '-' }}
            </div>
            <div class="text-sm text-gray-500">
                {{ Auth::user()->email ?? '-' }}
            </div>

            <!-- Update Button -->
            <a href="{{ route('profile.edit') }}"
                class="mt-3 w-full flex items-center justify-center gap-2 text-red-600 hover:text-red-700 text-sm font-medium py-2 px-3 rounded-lg border border-red-200 hover:bg-red-50 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Update Profile
            </a>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 px-4 py-4 overflow-y-auto">
        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-3 mt-2">
            Home
        </div>

        <ul class="space-y-1">
            <!-- Dashboard -->
            <li>
                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                          {{ request()->routeIs('dashboard') ? 'bg-red-50 text-red-600 border-l-4 border-red-500' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span class="font-medium">Dashboard</span>
                </a>
            </li>

            <!-- Users -->
            @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                <li>
                    <a href="{{ route('users.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200
                                                                          {{ request()->routeIs('users.*') ? 'bg-red-50 text-red-600 border-l-4 border-red-500' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                        <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span class="font-medium">Users</span>
                    </a>
                </li>
            @endif
        </ul>
        <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider px-3 mb-3 mt-4">
            Menu
        </div>

        <ul class="space-y-1">
            <!-- Perusahaan -->
            <li>
                <a href="{{ route('customer.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-gray-600 hover:bg-gray-100 hover:text-gray-800
                     {{ request()->routeIs('customer.*') ? 'bg-red-50 text-red-600 border-l-4 border-red-500' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                    <span class="font-medium">Perusahaan</span>
                </a>
            </li>

            <!-- Project -->
            <li>
                <a href="{{ route('project.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-gray-600 hover:bg-gray-100 hover:text-gray-800
                    {{ request()->routeIs('project.*') ? 'bg-red-50 text-red-600 border-l-4 border-red-500' : 'text-gray-600 hover:bg-gray-100 hover:text-gray-800' }}">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <span class="font-medium">Project</span>
                </a>
            </li>

            <!-- Agenda -->

            <li>
                <a href="#"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-200 text-gray-600 hover:bg-gray-100 hover:text-gray-800">
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span class="font-medium">Agenda</span>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Logout Section -->
    <div class="p-4 border-t border-gray-100 mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="w-full flex items-center justify-center gap-2 px-4 py-3 rounded-xl text-red-500 hover:bg-red-50 transition-all duration-200 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<!-- Overlay for mobile when sidebar is open -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 backdrop-blur-sm z-30 hidden transition-opacity duration-300"
    onclick="toggleSidebar()"></div>