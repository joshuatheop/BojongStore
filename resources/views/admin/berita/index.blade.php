<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Berita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('admin.berita.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Tambah Berita</a>

            @if(session('success'))
                <div class="mb-4 text-green-700 bg-green-100 px-4 py-2 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2">Judul</th>
                            <th class="px-4 py-2">Cover</th>
                            <th class="px-4 py-2">Dibaca</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $b)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $b->judul }}</td>
                                <td class="px-4 py-2">
                                    <img src="{{ asset('storage/' . $b->cover) }}" class="w-20 rounded">
                                </td>
                                <td class="px-4 py-2">{{ $b->dibaca }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('admin.berita.show', $b->id) }}" class="text-blue-600 hover:underline">Lihat</a>
                                    <a href="{{ route('admin.berita.edit', $b->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                                    <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus berita ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
