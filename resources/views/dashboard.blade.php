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
                <p class="text-3xl lg:text-4xl font-bold mt-1">{{ $tot_cus }}</p>
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

    {{-- Charts Section (Admin Only) --}}
    @if(!$isSales)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 lg:gap-6 mb-6">
            {{-- Doughnut Chart: Project per Status --}}
            <div class="bg-white rounded-2xl shadow-lg p-5 lg:p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-1 h-6 bg-red-500 rounded-full"></div>
                    <h3 class="text-lg font-bold text-gray-800">Project per Status</h3>
                </div>
                <div class="flex items-center justify-center" style="height: 280px;">
                    <canvas id="chartStatus"></canvas>
                </div>
            </div>

            {{-- Bar Chart: Project per Bulan --}}
            <div class="bg-white rounded-2xl shadow-lg p-5 lg:p-6">
                <div class="flex items-center gap-3 mb-5">
                    <div class="w-1 h-6 bg-rose-500 rounded-full"></div>
                    <h3 class="text-lg font-bold text-gray-800">Project per Bulan</h3>
                </div>
                <div style="height: 280px;">
                    <canvas id="chartBulanan"></canvas>
                </div>
            </div>
        </div>

        {{-- Horizontal Bar Chart: Top 5 Sales --}}
        <div class="bg-white rounded-2xl shadow-lg p-5 lg:p-6 mb-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-1 h-6 bg-red-500 rounded-full"></div>
                <h3 class="text-lg font-bold text-gray-800">Top 5 Sales (by Project)</h3>
            </div>
            <div style="height: 300px;">
                <canvas id="chartTopSales"></canvas>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // ── Doughnut: Project per Status ──
                new Chart(document.getElementById('chartStatus'), {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($chartStatus['labels']) !!},
                        datasets: [{
                            data: {!! json_encode($chartStatus['data']) !!},
                            backgroundColor: [
                                'rgba(239, 68, 68, 0.85)',   // red   – Progress
                                'rgba(245, 158, 11, 0.85)',   // amber – Pending
                                'rgba(34, 197, 94, 0.85)',    // green – Selesai
                            ],
                            borderColor: [
                                'rgba(239, 68, 68, 1)',
                                'rgba(245, 158, 11, 1)',
                                'rgba(34, 197, 94, 1)',
                            ],
                            borderWidth: 2,
                            hoverOffset: 8,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '60%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 16,
                                    usePointStyle: true,
                                    pointStyleWidth: 10,
                                    font: { family: 'Inter', size: 13 }
                                }
                            }
                        }
                    }
                });

                // ── Bar: Project per Bulan ──
                new Chart(document.getElementById('chartBulanan'), {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($chartBulanan['labels']) !!},
                        datasets: [{
                            label: 'Jumlah Project',
                            data: {!! json_encode($chartBulanan['data']) !!},
                            backgroundColor: 'rgba(239, 68, 68, 0.75)',
                            borderColor: 'rgba(239, 68, 68, 1)',
                            borderWidth: 1,
                            borderRadius: 8,
                            barPercentage: 0.6,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: { family: 'Inter', size: 12 }
                                },
                                grid: { color: 'rgba(0,0,0,0.05)' }
                            },
                            x: {
                                ticks: { font: { family: 'Inter', size: 11 } },
                                grid: { display: false }
                            }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });

                // ── Horizontal Bar: Top 5 Sales ──
                new Chart(document.getElementById('chartTopSales'), {
                    type: 'bar',
                    data: {
                        labels: {!! json_encode($chartTopSales['labels']) !!},
                        datasets: [{
                            label: 'Total Project',
                            data: {!! json_encode($chartTopSales['data']) !!},
                            backgroundColor: [
                                'rgba(239, 68, 68, 0.80)',
                                'rgba(251, 113, 133, 0.80)',
                                'rgba(244, 63, 94, 0.80)',
                                'rgba(225, 29, 72, 0.80)',
                                'rgba(190, 18, 60, 0.80)',
                            ],
                            borderColor: [
                                'rgba(239, 68, 68, 1)',
                                'rgba(251, 113, 133, 1)',
                                'rgba(244, 63, 94, 1)',
                                'rgba(225, 29, 72, 1)',
                                'rgba(190, 18, 60, 1)',
                            ],
                            borderWidth: 1,
                            borderRadius: 6,
                            barPercentage: 0.5,
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: { family: 'Inter', size: 12 }
                                },
                                grid: { color: 'rgba(0,0,0,0.05)' }
                            },
                            y: {
                                ticks: { font: { family: 'Inter', size: 13 } },
                                grid: { display: false }
                            }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            });
        </script>
    @endif

    {{-- Data Table: 10 Project Terbaru --}}
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        {{-- Table Header --}}
        <div class="px-5 lg:px-6 py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center gap-3">
                <div class="w-1 h-6 bg-red-500 rounded-full"></div>
                <h3 class="text-lg font-bold text-gray-800">10 Project Terbaru</h3>
            </div>
            <a href="{{ route('project.index') }}"
                class="inline-flex items-center gap-1.5 text-sm font-medium text-red-600 hover:text-red-700 transition-colors">
                Lihat Semua
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        {{-- Desktop Table --}}
        <div class="hidden sm:block overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Project</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($projects as $i => $project)
                        <tr class="hover:bg-red-50/50 transition-colors duration-150">
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $i + 1 }}</td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-800">{{ $project->project_name }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">ID: {{ $project->project_id }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $project->customer->nama ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $project->lokasi ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($project->status == 2)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>Selesai
                                    </span>
                                @elseif($project->status == 1)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                        <span class="w-1.5 h-1.5 bg-yellow-500 rounded-full mr-1.5"></span>Pending
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-600">
                                        <span class="w-1.5 h-1.5 bg-red-500 rounded-full mr-1.5"></span>Progress
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-center">
                                <a href="{{ route('project.show', $project->project_id) }}"
                                    class="inline-flex items-center gap-1.5 px-3.5 py-1.5 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-xs font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-sm hover:shadow-md shadow-red-500/20">
                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center">
                                <div class="flex flex-col items-center gap-2">
                                    <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    <p class="text-sm text-gray-400">Belum ada project</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Mobile Cards --}}
        <div class="sm:hidden divide-y divide-gray-100">
            @forelse($projects as $project)
                <div class="p-4 hover:bg-red-50/50 transition-colors duration-150">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <span class="text-xs text-gray-400">ID: {{ $project->project_id }}</span>
                            <div class="text-sm font-semibold text-gray-800">{{ $project->project_name }}</div>
                        </div>
                        @if($project->status == 2)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-700">Selesai</span>
                        @elseif($project->status == 1)
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Pending</span>
                        @else
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-600">Progress</span>
                        @endif
                    </div>
                    <div class="text-xs text-gray-500 mb-1">{{ $project->customer->nama ?? '-' }}</div>
                    <div class="text-xs text-gray-400 mb-3">{{ $project->lokasi ?? '-' }}</div>
                    <a href="{{ route('project.show', $project->project_id) }}"
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg text-xs font-medium hover:from-red-600 hover:to-red-700 transition-all shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        View
                    </a>
                </div>
            @empty
                <div class="p-6 text-center text-sm text-gray-400">Belum ada project</div>
            @endforelse
        </div>
    </div>

@endsection