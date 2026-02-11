<!-- Add Customer Modal -->
<div id="addCustomerModal_delete" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeCustomerModal()"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-lg transform transition-all scale-95 opacity-0"
            id="customerModalContent_delete">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Tambah Customer</h3>
                        <p class="text-xs text-gray-400">Isi data customer baru</p>
                    </div>
                </div>
                <button onclick="closeCustomerModal()"
                    class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="#" method="POST" id="editForm" class="p-6 space-y-4">
                @method ('DELETE')
                @csrf

                <!-- Nama -->
                <div class="space-y-1.5">
                    <label class="text-sm font-medium text-gray-700">Nama <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </span>
                        <input type="text" name="nama" id="edit_id" placeholder="Nama perusahaan" readonly
                            class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-gray-50 border border-gray-200 hidden focus:bg-white focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none text-sm transition-all">
                        <input type="text" name="custid" id="edit_nama" required placeholder="Nama perusahaan"
                            class="w-full pl-11 pr-4 py-2.5 rounded-xl bg-gray-50 border border-gray-200 focus:bg-white focus:border-red-500 focus:ring-2 focus:ring-red-500/20 focus:outline-none text-sm transition-all">
                    </div>
                </div>



                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="closeCustomerModal()"
                        class="px-5 py-2.5 text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-xl text-sm font-medium transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-red-500/25 hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Delete
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openCustomerModal_delete(data) {

        const modal = document.getElementById('addCustomerModal_delete');
        const form = document.getElementById('editForm');
        const itemdata = data;
        // console.log(itemData);
        const idInput = document.getElementById('edit_id');
        const nameInput = document.getElementById('edit_nama');

        // const modal = document.getElementById('addCustomerModal_edit');
        const content = document.getElementById('customerModalContent_delete');

        // Set data ke modal
        idInput.value = itemdata.custid;
        nameInput.value = itemdata.nama;

        modal.classList.remove('hidden');

        // Sesuaikan route

        const text = "{{ route('customer.destroy', ':id') }}";
        const update = text.replace(':id', itemdata.custid);
        form.action = update;


        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeCustomerModal() {
        const content = document.getElementById('customerModalContent_delete');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            document.getElementById('addCustomerModal_delete').classList.add('hidden');
        }, 200);
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeCustomerModal();
    });
</script>