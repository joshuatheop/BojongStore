<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Berita') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
             <!-- Tombol Kembali -->
            <a href="{{ route('admin.berita') }}"
               class="inline-block mb-4 px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">
                ← Kembali
            </a>
            <div class="bg-white p-6 rounded shadow">
                <h1 class="text-2xl font-bold">{{ $berita->judul }}</h1>
                <p class="text-sm text-gray-500 mb-4">Dibaca {{ $berita->dibaca }} kali</p>

                <img src="{{ asset('storage/' . $berita->cover) }}" class="rounded mb-4 w-full max-w-xl">

                <div class="prose max-w-none">
                    {!! nl2br(e($berita->deskripsi)) !!}
                </div>

                @if ($berita->gambar)
                    <h3 class="mt-6 text-lg font-semibold">Gambar Tambahan:</h3>
                    <div class="flex flex-wrap gap-4 mt-2">
                        @foreach ($berita->gambar as $g)
                            <img src="{{ asset('storage/' . $g) }}" class="w-32 rounded">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
