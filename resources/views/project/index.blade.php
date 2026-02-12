@section('title', 'Project')
@section('subtitle', 'Kelola data project')
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

    <!-- Error Messages -->
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
            <div class="flex items-center gap-2 mb-2">
                <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-sm font-semibold text-red-700">Terdapat error:</span>
            </div>
            <ul class="list-disc list-inside text-sm text-red-600 space-y-1">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Header Actions -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div class="flex items-center gap-3">
            <div class="relative flex-1 sm:w-64">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input type="text" placeholder="Cari project..."
                    class="input-enhanced w-full pl-10 pr-4 py-2.5 rounded-xl bg-gray-50 focus:bg-white focus:outline-none text-sm">
            </div>
        </div>
        <button onclick="openProjectModal()"
            class="btn-primary text-white px-5 py-2.5 rounded-xl font-medium text-sm flex items-center gap-2 justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Project
        </button>
    </div>

    <!-- Project Table -->
    <div class="card-hover bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Project</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Lokasi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Level</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($projects as $project)
                        <tr class="table-row-hover">
                            <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $project->project_id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $project->project_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $project->customer->nama ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $project->lokasi ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($project->level == 'High')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">High</span>
                                @elseif($project->level == 'Medium')
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">Medium</span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">Low</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm">
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
                            </td>
                            <td class="px-6 py-4 text-sm">
                                <a href="{{ route('project.show', $project->project_id) }}"
                                    class="px-3 py-1.5 bg-blue-50 text-blue-600 rounded-lg text-xs font-medium hover:bg-blue-100 transition-colors duration-150 border border-blue-100 inline-block">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button onclick="openEditProjectModal({{ json_encode($project) }})"
                                    class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors duration-150 border border-red-100">
                                    <i class="bi bi-pen"></i>
                                </button>
                                <button onclick="openDeleteProjectModal({{ json_encode($project) }})"
                                    class="px-3 py-1.5 bg-gray-50 text-gray-600 rounded-lg text-xs font-medium hover:bg-gray-100 transition-colors duration-150 border border-gray-200">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal terpisah -->
    @include('project.modal-add')
    @include('project.modal-edit')
    @include('project.modal-delete')

    @if($errors->any())
        <script>openProjectModal();</script>
    @endif

@endsection