<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-800 leading-tight">
            {{ __('Pengaturan Halaman Landing Page') }}
        </h2>
    </x-slot>

        {{-- Section: Sekilas Info --}}
    <div class="py-8">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">Sekilas Info</h3>

            {{-- Form Tambah/Edit --}}
            <form action="{{ route('admin.info.storeOrUpdate') }}" method="POST" class="mb-8">
                @csrf
                <input type="hidden" name="id" id="edit-id">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Teks Sekilas Info</label>
                    <textarea name="sekilas_info" id="edit-info"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500"
                        rows="3" required></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Simpan
                </button>
            </form>

            {{-- Tabel Data --}}
            <table class="min-w-full table-auto border rounded overflow-hidden">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2 text-left">#</th>
                        <th class="border px-4 py-2 text-left">Sekilas Info</th>
                        <th class="border px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($infos as $info)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2" id="info-text-{{ $info->id }}">{{ $info->sekilas_info }}</td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <button onclick="editInfo({{ $info->id }})"
                                        class="text-blue-600 hover:underline">Edit</button>

                                    <form action="{{ route('admin.info.destroy', $info->id) }}" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus info ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 py-4">Belum ada info.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Section: Sambutan --}}
    <div class="py-8">
        <div class="max-w-5xl mx-auto bg-white p-6 rounded-xl shadow-md space-y-6">
            <h3 class="text-lg font-semibold text-gray-700 border-b pb-2">Sambutan Kepala Desa</h3>

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.sambutan.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Kepala Desa</label>
                    <input type="text" name="nama_kepala_desa" value="{{ old('nama_kepala_desa', $sambutan->nama_kepala_desa ?? '') }}"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Sambutan</label>
                    <textarea name="sambutan" rows="6"
                        class="w-full mt-1 rounded-md border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500">{{ old('sambutan', $sambutan->sambutan ?? '') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Foto Kepala Desa</label>
                    @if (!empty($sambutan->foto))
                        <img src="{{ asset('storage/' . $sambutan->foto) }}" class="w-32 h-32 rounded shadow my-2 object-cover">
                    @endif
                    <input type="file" name="foto" class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                </div>

                <div class="text-right">
                    <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded-md hover:bg-green-700 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function editInfo(id) {
            const infoText = document.getElementById('info-text-' + id).innerText;
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-info').value = infoText.trim();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</x-app-layout>
