<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - MTS System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="font-sans text-base leading-relaxed antialiased min-h-screen bg-gray-50">

    <div class="min-h-screen flex">
        <!-- Left Side - Branding -->
        <div
            class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-red-500 via-red-600 to-red-700 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute inset-0">
                <div class="absolute top-20 left-20 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
                <div class="absolute bottom-20 right-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-white/10 rounded-full blur-3xl">
                </div>
                <!-- Extra decorative circles -->
                <div class="absolute top-10 right-32 w-20 h-20 border-2 border-white/20 rounded-full"></div>
                <div class="absolute bottom-32 left-16 w-32 h-32 border border-white/10 rounded-full"></div>
                <div class="absolute top-1/3 right-10 w-12 h-12 bg-white/10 rounded-full"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex flex-col items-center justify-center w-full p-12 text-white">
                <!-- Logo -->
                <div class="mb-8">
                    <div
                        class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center shadow-2xl ring-4 ring-white/10">
                        <img src="{{ asset('image/logodtps2.png') }}" alt="Logo" class="h-16 w-auto"
                            onerror="this.parentElement.innerHTML='<span class=\'text-4xl font-bold\'>MTS</span>'">
                    </div>
                </div>

                <h1 class="text-4xl font-bold mb-4 text-center">Marketing Tracking System</h1>
                <p class="text-xl text-white/80 text-center max-w-md mb-12">Kelola customer, project, dan agenda bisnis
                    Anda dengan mudah dan efisien</p>

                <!-- Stats Preview -->
                <div class="grid grid-cols-3 gap-6 w-full max-w-md">
                    <div
                        class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-center border border-white/10 hover:bg-white/20 transition-all duration-300">
                        <div class="text-3xl font-bold">125+</div>
                        <div class="text-sm text-white/70">Customer</div>
                    </div>
                    <div
                        class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-center border border-white/10 hover:bg-white/20 transition-all duration-300">
                        <div class="text-3xl font-bold">48+</div>
                        <div class="text-sm text-white/70">Project</div>
                    </div>
                    <div
                        class="bg-white/10 backdrop-blur-sm rounded-2xl p-4 text-center border border-white/10 hover:bg-white/20 transition-all duration-300">
                        <div class="text-3xl font-bold">32+</div>
                        <div class="text-sm text-white/70">Agenda</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Login Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-12 bg-white">
            <div class="w-full max-w-md">

                <!-- Mobile Logo -->
                <div class="lg:hidden flex justify-center mb-8">
                    <div
                        class="w-20 h-20 bg-gradient-to-br from-red-500 to-red-700 rounded-2xl flex items-center justify-center shadow-lg">
                        <img src="{{ asset('image/logodtps2.png') }}" alt="Logo" class="h-12 w-auto"
                            onerror="this.parentElement.innerHTML='<span class=\'text-2xl font-bold text-white\'>MTS</span>'">
                    </div>
                </div>

                <!-- Welcome Text -->
                <div class="text-center lg:text-left mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang! 👋</h1>
                    <p class="text-gray-500">Silakan login untuk melanjutkan ke dashboard</p>
                </div>

                <!-- Error Message -->
                @if(session('error'))
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm text-red-600">{{ session('error') }}</span>
                        </div>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Username Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Username</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <input type="text" name="name" placeholder="Masukkan username" required
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none transition-all duration-200">
                        </div>
                    </div>

                    <!-- Password Input -->
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-700">Password</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                            </span>
                            <input type="password" name="password" placeholder="••••••••" required
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none transition-all duration-200">
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <input type="checkbox" name="remember"
                                class="w-4 h-4 rounded border-gray-300 text-red-500 focus:ring-red-400" />
                            <span class="text-sm text-gray-600 group-hover:text-gray-800 transition">Ingat saya</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white py-3.5 rounded-xl font-semibold text-base shadow-lg hover:shadow-xl shadow-red-500/25 transition-all duration-300 transform hover:scale-[1.02]">
                        <span class="flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login
                        </span>
                    </button>
                </form>

                <!-- Footer -->
                <div class="mt-10 text-center">
                    <p class="text-sm text-gray-400">
                        &copy; {{ date('Y') }} Marketing Tracking System. All rights reserved.
                    </p>
                </div>

            </div>
        </div>
    </div>

</body>

</html>