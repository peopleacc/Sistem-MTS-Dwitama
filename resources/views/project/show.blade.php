@section('title', 'Detail Project')
@section('subtitle', $project->project_name)
@extends('layout.app')
@section('content')

    <!-- Success Message -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
            <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-sm text-green-700 font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('project.index') }}"
            class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-red-600 transition-colors duration-200 group">
            <svg class="w-4 h-4 transform group-hover:-translate-x-1 transition-transform" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Kembali ke Daftar Project
        </a>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

        <!-- LEFT: Tracking Timeline -->
        <div class="lg:col-span-7">
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <!-- Header -->
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div
                                class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white shadow-md">
                                <i class="bi bi-diagram-3 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">Tracking Agenda</h3>
                                <p class="text-xs text-gray-400">{{ $project->agendas->count() }} agenda tercatat</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div class="p-6">
                    @if($project->agendas->count() > 0)
                        <div class="relative">
                            @foreach($project->agendas as $index => $agenda)
                                <div class="flex gap-4 {{ !$loop->last ? 'pb-8' : '' }} relative">
                                    <!-- Vertical Line -->
                                    @if(!$loop->last)
                                        <div class="absolute left-[19px] top-10 bottom-0 w-0.5 bg-gradient-to-b from-red-300 to-gray-200"></div>
                                    @endif

                                    <!-- Node Circle -->
                                    <div class="flex-shrink-0 relative z-10">
                                        @if($agenda->status == 2)
                                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center shadow-lg shadow-green-500/25">
                                                <i class="bi bi-check-lg text-white text-lg"></i>
                                            </div>
                                        @elseif($agenda->status == 1)
                                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center shadow-lg shadow-blue-500/25 animate-pulse">
                                                <i class="bi bi-arrow-repeat text-white text-lg"></i>
                                            </div>
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-gray-300 flex items-center justify-center shadow-md">
                                                <i class="bi bi-clock text-white text-lg"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Content Card -->
                                    <div class="flex-1 bg-gray-50 rounded-xl p-4 border border-gray-100 hover:border-red-200 hover:shadow-sm transition-all duration-200">
                                        <div class="flex items-start justify-between mb-2">
                                            <div>
                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                                                    {{ $agenda->status == 2 ? 'bg-green-100 text-green-700' : ($agenda->status == 1 ? 'bg-blue-100 text-blue-700' : 'bg-gray-100 text-gray-600') }}">
                                                    {{ $agenda->status == 2 ? 'Selesai' : ($agenda->status == 1 ? 'Proses' : 'Pending') }}
                                                </span>
                                            </div>
                                            <span class="text-[11px] text-gray-400 font-medium">
                                                #{{ $index + 1 }}
                                            </span>
                                        </div>
                                        <h4 class="text-sm font-semibold text-gray-800 mb-1">{{ $agenda->ket }}</h4>
                                        <div class="flex flex-wrap items-center gap-3 text-xs text-gray-500">
                                            <span class="flex items-center gap-1">
                                                <i class="bi bi-calendar3"></i>
                                                {{ $agenda->tgl ? $agenda->tgl->format('d M Y') : '-' }}
                                            </span>
                                            @if($agenda->jam)
                                                <span class="flex items-center gap-1">
                                                    <i class="bi bi-clock"></i>
                                                    {{ $agenda->jam }}
                                                </span>
                                            @endif
                                            @if($agenda->lokasi)
                                                <span class="flex items-center gap-1">
                                                    <i class="bi bi-geo-alt"></i>
                                                    {{ $agenda->lokasi }}
                                                </span>
                                            @endif
                                        </div>
                                        @if($agenda->respon)
                                            <div class="mt-2 p-2 bg-white rounded-lg border border-gray-100">
                                                <p class="text-xs text-gray-500"><span class="font-semibold text-gray-600">Respon:</span> {{ $agenda->respon }}</p>
                                                @if($agenda->tgl_respond)
                                                    <p class="text-[10px] text-gray-400 mt-1">{{ $agenda->tgl_respond->format('d M Y H:i') }}</p>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="bi bi-journal-text text-2xl text-gray-400"></i>
                            </div>
                            <p class="text-sm text-gray-500 font-medium">Belum ada agenda</p>
                            <p class="text-xs text-gray-400 mt-1">Tambahkan agenda pertama di bawah ini</p>
                        </div>
                    @endif

                    <!-- Add Agenda Form -->
                    <div id="tambah-agenda" class="mt-6 pt-6 border-t border-gray-100">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-full bg-red-50 border-2 border-dashed border-red-300 flex items-center justify-center">
                                <i class="bi bi-plus-lg text-red-500"></i>
                            </div>
                            <h4 class="text-sm font-bold text-gray-700">Tambah Agenda Baru</h4>
                        </div>

                        <form action="{{ route('project.agenda.store', $project->project_id) }}" method="POST"
                            class="bg-gray-50 rounded-xl p-4 border border-gray-100 space-y-3">
                            @csrf

                            <div class="space-y-1.5">
                                <label class="text-xs font-medium text-gray-600">Keterangan <span class="text-red-500">*</span></label>
                                <input type="text" name="ket" required placeholder="Contoh: Meeting dengan klien"
                                    class="w-full px-4 py-2.5 rounded-xl bg-white border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none text-sm transition-all">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                                <div class="space-y-1.5">
                                    <label class="text-xs font-medium text-gray-600">Tanggal <span class="text-red-500">*</span></label>
                                    <input type="date" name="tgl" required
                                        class="w-full px-4 py-2.5 rounded-xl bg-white border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none text-sm transition-all">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-xs font-medium text-gray-600">Jam</label>
                                    <input type="time" name="jam"
                                        class="w-full px-4 py-2.5 rounded-xl bg-white border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none text-sm transition-all">
                                </div>
                                <div class="space-y-1.5">
                                    <label class="text-xs font-medium text-gray-600">Lokasi</label>
                                    <input type="text" name="lokasi" placeholder="Lokasi agenda"
                                        class="w-full px-4 py-2.5 rounded-xl bg-white border border-gray-200 focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none text-sm transition-all">
                                </div>
                            </div>

                            <div class="flex justify-end pt-1">
                                <button type="submit"
                                    class="px-5 py-2.5 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-red-500/25 hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] flex items-center gap-2">
                                    <i class="bi bi-plus-circle"></i>
                                    Tambah Agenda
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT: Project Detail -->
        <div class="lg:col-span-5 space-y-6">
            <!-- Project Info Card -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-800 rounded-xl flex items-center justify-center text-white shadow-md">
                            <i class="bi bi-building text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">Detail Project</h3>
                            <p class="text-xs text-gray-400">Informasi lengkap project</p>
                        </div>
                    </div>
                </div>

                <div class="p-6 space-y-4">
                    <!-- Project Name -->
                    <div>
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Nama Project</label>
                        <p class="text-sm font-semibold text-gray-800 mt-1">{{ $project->project_name }}</p>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Project ID -->
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">ID</label>
                            <p class="text-sm text-gray-700 mt-1 font-mono">{{ $project->project_id }}</p>
                        </div>
                        <!-- Status -->
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Status</label>
                            <div class="mt-1">
                                @if($project->status == 0)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                                        <span class="w-1.5 h-1.5 bg-gray-500 rounded-full mr-1.5"></span>Pending
                                    </span>
                                @elseif($project->status == 1)
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                        <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-1.5"></span>Progress
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>Selesai
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <!-- Level -->
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Level</label>
                            <div class="mt-1">
                                @if($project->level == 'High')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">High</span>
                                @elseif($project->level == 'Medium')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Medium</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Low</span>
                                @endif
                            </div>
                        </div>
                        <!-- Wilayah -->
                        <div>
                            <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Wilayah</label>
                            <p class="text-sm text-gray-700 mt-1">{{ $project->wil ?? '-' }}</p>
                        </div>
                    </div>

                    <!-- Customer -->
                    <div>
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Customer</label>
                        <p class="text-sm text-gray-700 mt-1">{{ $project->customer->nama ?? '-' }}</p>
                    </div>

                    <!-- Lokasi -->
                    <div>
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Lokasi</label>
                        <p class="text-sm text-gray-700 mt-1">{{ $project->lokasi ?? '-' }}</p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Alamat</label>
                        <p class="text-sm text-gray-700 mt-1">{{ $project->alamat ?? '-' }}</p>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label class="text-xs font-medium text-gray-400 uppercase tracking-wider">Keterangan</label>
                        <p class="text-sm text-gray-700 mt-1">{{ $project->ket ?? '-' }}</p>
                    </div>
                </div>
            </div>

            <!-- PIC Card -->
            <div class="bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">
                <div class="p-6 border-b border-gray-100">
                    <div class="flex items-center gap-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center text-white shadow-md">
                            <i class="bi bi-people text-lg"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-800">PIC Project</h3>
                            <p class="text-xs text-gray-400">{{ $project->pics->count() }} orang</p>
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    @if($project->pics->count() > 0)
                        <div class="space-y-3">
                            @foreach($project->pics as $pic)
                                <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-xl border border-gray-100">
                                    <div class="w-9 h-9 rounded-full bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                                        {{ strtoupper(substr($pic->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-semibold text-gray-800 truncate">{{ $pic->name }}</p>
                                        <div class="flex items-center gap-3 text-xs text-gray-500 mt-0.5">
                                            @if($pic->phone)
                                                <span class="flex items-center gap-1">
                                                    <i class="bi bi-telephone"></i>
                                                    {{ $pic->phone }}
                                                </span>
                                            @endif
                                            @if($pic->email)
                                                <span class="flex items-center gap-1 truncate">
                                                    <i class="bi bi-envelope"></i>
                                                    {{ $pic->email }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="bi bi-person-x text-xl text-gray-400"></i>
                            </div>
                            <p class="text-sm text-gray-500">Belum ada PIC</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
