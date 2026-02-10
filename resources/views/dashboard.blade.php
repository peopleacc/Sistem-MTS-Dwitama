@section('title', 'Dashboard')
@section('subtitle', 'Selamat datang di Marketing Tracking System')
@extends('layout.app')
@section('content')

    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 lg:gap-6 mb-6">
        <!-- Card: Total Customer -->
        <div
            class="bg-gradient-to-br from-red-500 to-red-600 rounded-2xl shadow-lg shadow-red-500/20 p-5 lg:p-6 text-white relative overflow-hidden transform hover:scale-105 transition-all duration-300">
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full -ml-8 -mb-8"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                </div>
                <p class="text-white/80 text-sm font-medium">Total Customer</p>
                <p class="text-3xl lg:text-4xl font-bold mt-1">{{ $tot_cus   }}</p>
            </div>
        </div>

        <!-- Card: Total Project -->
        <div
            class="bg-gradient-to-br from-rose-400 to-rose-500 rounded-2xl shadow-lg shadow-rose-400/20 p-5 lg:p-6 text-white relative overflow-hidden transform hover:scale-105 transition-all duration-300">
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full -ml-8 -mb-8"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-white/80 text-sm font-medium">Total Project</p>
                <p class="text-3xl lg:text-4xl font-bold mt-1">{{ $tot_Prod }}</p>
            </div>
        </div>

        <!-- Card: Total Agenda -->
        <div
            class="bg-gradient-to-br from-red-400 to-red-500 rounded-2xl shadow-lg shadow-red-400/20 p-5 lg:p-6 text-white relative overflow-hidden transform hover:scale-105 transition-all duration-300">
            <div class="absolute top-0 right-0 w-24 h-24 bg-white/10 rounded-full -mr-12 -mt-12"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 bg-white/5 rounded-full -ml-8 -mb-8"></div>
            <div class="relative">
                <div class="flex items-center justify-between mb-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                </div>
                <p class="text-white/80 text-sm font-medium">Total Agenda</p>
                <p class="text-3xl lg:text-4xl font-bold mt-1">{{ $tot_Agen }}</p>
            </div>
        </div>
    </div>

    <!-- Data Table Section -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <!-- Table Header -->
        <div
            class="px-5 lg:px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center gap-3">
                <div class="w-1 h-6 bg-red-500 rounded-full"></div>
                <h3 class="text-lg font-bold text-gray-800">Data Project</h3>
            </div>

            <!-- Search & Add Button -->
            <div class="flex items-center gap-3">
                <!-- Search Input -->
                <div class="relative">
                    <input type="text" placeholder="Pencarian..."
                        class="pl-10 pr-4 py-2 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent w-48">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <!-- Add Button -->
                <button
                    class="flex items-center gap-2 bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-xl text-sm font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-md hover:shadow-lg shadow-red-500/20">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah
                </button>
            </div>
        </div>

        <!-- Desktop Table -->
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Project
                            ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Lokasi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Operation</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @for($i = 1; $i <= 5; $i++)
                        <tr class="hover:bg-red-50/50 transition-colors duration-150">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $i }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 font-medium">PRJ-{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">Customer {{ $i }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">Jakarta</td>
                            <td class="px-6 py-4 text-sm">
                                @if($i % 3 == 0)
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                                        Selesai
                                    </span>
                                @elseif($i % 2 == 0)
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                        <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5"></span>
                                        Pending
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5"></span>
                                        Progress
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button
                                        class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors duration-150 border border-red-100">
                                        <i class="bi bi-pen"></i>
                                    </button>
                                    <button
                                        class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-100 transition-colors duration-150 border border-gray-200">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>

        <!-- Mobile Cards -->
        <div class="sm:hidden divide-y divide-gray-100">
            @for($i = 1; $i <= 5; $i++)
                <div class="p-4 hover:bg-red-50/50 transition-colors duration-150">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="text-xs text-gray-400">PRJ-{{ str_pad($i, 4, '0', STR_PAD_LEFT) }}</span>
                            <div class="text-sm font-semibold text-gray-800">Customer {{ $i }}</div>
                        </div>
                        @if($i % 3 == 0)
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Selesai</span>
                        @elseif($i % 2 == 0)
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Pending</span>
                        @else
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-600">Progress</span>
                        @endif
                    </div>
                    <div class="text-xs text-gray-400 mb-2">Jakarta</div>
                    <div class="flex gap-2">
                        <button
                            class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-medium border border-red-100">Update</button>
                        <button
                            class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs font-medium border border-gray-200">Delete</button>
                    </div>
                </div>
            @endfor
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-between bg-gray-50">
            <div class="text-sm text-gray-500">
                Showing 1 to 5 of 48 entries
            </div>
            <div class="flex items-center gap-1">
                <button
                    class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-200 rounded-lg transition-colors duration-150">
                    &laquo;
                </button>
                <button class="px-3 py-1.5 text-sm bg-red-500 text-white rounded-lg shadow-sm">1</button>
                <button
                    class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-200 rounded-lg transition-colors duration-150">2</button>
                <button
                    class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-200 rounded-lg transition-colors duration-150">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button
                    class="px-3 py-1.5 text-sm text-gray-600 hover:bg-gray-200 rounded-lg transition-colors duration-150">10</button>
                <button
                    class="px-3 py-1.5 text-sm text-gray-500 hover:bg-gray-200 rounded-lg transition-colors duration-150">
                    &raquo;
                </button>
            </div>
        </div>
    </div>

@endsection