<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol Kembali -->
            <a href="{{ route('admin.berita') }}"
               class="inline-block mb-4 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                ← Kembali
            </a>

            <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                @csrf @method('PUT')

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Judul</label>
                    <input type="text" name="judul" value="{{ $berita->judul }}" class="form-input w-full mt-1" required>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Deskripsi</label>
                    <textarea name="deskripsi" rows="5" class="form-textarea w-full mt-1" required>{{ $berita->deskripsi }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Cover Saat Ini</label>
                    <img src="{{ asset('storage/' . $berita->cover) }}" class="w-32 rounded my-2">
                    <input type="file" name="cover" class="form-input w-full mt-1">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">Tambah Gambar Tambahan</label>
                    <input type="file" name="gambar[]" class="form-input w-full mt-1" multiple>
                </div>

                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Update
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
