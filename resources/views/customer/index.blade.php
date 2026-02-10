@section('title', 'Customer')
@section('subtitle', 'Kelola data customer')
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
                <input type="text" placeholder="Cari customer..."
                    class="input-enhanced w-full pl-10 pr-4 py-2.5 rounded-xl bg-gray-50 focus:bg-white focus:outline-none text-sm">
            </div>
        </div>
        <button onclick="openCustomerModal()"
            class="btn-primary text-white px-5 py-2.5 rounded-xl font-medium text-sm flex items-center gap-2 justify-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Tambah Customer
        </button>
    </div>

    <!-- Customer Table -->
    <div class="card-hover bg-white rounded-xl shadow-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Bidang
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Lokasi
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Telepon
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach ($customers as $cust)
                        <tr class="table-row-hover">
                            <td class="px-6 py-4 text-sm text-gray-500 font-mono">{{ $cust->custid }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 font-medium">{{ $cust->nama }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $cust->bidang ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $cust->lokasi ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $cust->notelp ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $cust->emailid ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm">
                                <button
                                    class="px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-xs font-medium hover:bg-red-100 transition-colors duration-150 border border-red-100">
                                    <i class="bi bi-pen"></i>
                                </button>
                                <button
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
    @include('customer.modal-add')

    @if($errors->any())
        <script>openCustomerModal();</script>
    @endif

@endsection