<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Judul</label>
                    <input type="text" name="judul" class="form-input w-full mt-1" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="form-textarea w-full mt-1" required></textarea>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Cover</label>
                    <input type="file" name="cover" class="form-input w-full mt-1" required>
                </div>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Gambar Tambahan</label>
                    <input type="file" name="gambar[]" class="form-input w-full mt-1" multiple>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>
