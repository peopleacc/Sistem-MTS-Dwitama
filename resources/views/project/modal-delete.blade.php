<!-- Delete Project Modal -->
<div id="deleteProjectModal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeDeleteProjectModal()"></div>
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-3xl transform transition-all scale-95 opacity-0"
            id="deleteProjectModalContent">
            <div class="flex items-center justify-between p-6 border-b border-gray-100">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center text-white shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">Hapus Project</h3>
                        <p class="text-xs text-gray-400">Tindakan ini tidak dapat dibatalkan</p>
                    </div>
                </div>
                <button onclick="closeDeleteProjectModal()"
                    class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-400 hover:text-gray-600 hover:bg-gray-100 transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <form action="#" id="deleteProjectForm" method="POST" class="p-6 space-y-4">
                @method('DELETE')
                @csrf

                <div class="space-y-3">
                    <p class="text-sm text-gray-600">Apakah Anda yakin ingin menghapus project berikut?</p>
                    <div class="bg-gray-50 border border-gray-200 rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-xs text-gray-500 uppercase tracking-wide">Nama Project</p>
                                <p class="text-sm font-semibold text-gray-800 mt-1" id="delete_project_name"></p>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500 uppercase tracking-wide">ID</p>
                                <p class="text-sm font-mono text-gray-600 mt-1" id="delete_project_id"></p>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-red-600 font-medium">
                        <i class="bi bi-exclamation-triangle"></i>
                        Project yang dihapus tidak dapat dipulihkan!
                    </p>
                </div>

                <div class="flex items-center justify-end gap-3 pt-4 border-t border-gray-100">
                    <button type="button" onclick="closeDeleteProjectModal()"
                        class="px-5 py-2.5 text-gray-600 hover:text-gray-800 bg-gray-100 hover:bg-gray-200 rounded-xl text-sm font-medium transition-all">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white rounded-xl text-sm font-semibold shadow-lg shadow-red-500/25 hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02] flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function openDeleteProjectModal(data) {
        const modal = document.getElementById('deleteProjectModal');
        const content = document.getElementById('deleteProjectModalContent');
        const form = document.getElementById('deleteProjectForm');

        // Set project info
        document.getElementById('delete_project_name').textContent = data.project_name;
        document.getElementById('delete_project_id').textContent = data.project_id;

        // Update form action
        const text = "{{ route('project.destroy', ':id') }}";
        const update = text.replace(':id', data.project_id);
        form.action = update;

        modal.classList.remove('hidden');
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteProjectModal() {
        const content = document.getElementById('deleteProjectModalContent');
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            document.getElementById('deleteProjectModal').classList.add('hidden');
        }, 200);
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeDeleteProjectModal();
    });
</script>
