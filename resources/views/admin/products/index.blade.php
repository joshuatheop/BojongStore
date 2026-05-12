<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-[#0a6634] leading-tight uppercase tracking-tight">
            {{ __('Manajemen Katalog Produk') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="flex justify-end mb-6">
                        <a href="{{ route('admin.products.create') }}"
                            class="bg-[#0a6634] hover:bg-[#074724] text-white font-bold py-2.5 px-6 rounded-lg shadow-md transition-colors flex items-center gap-2">
                            <i class='bx bx-plus'></i> Tambah Produk
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white">
                            <thead class="bg-[#fff8e1] border-b-2 border-[#0a6634]">
                                <tr>
                                    <th class="w-1/12 text-left py-4 px-6 text-[#0a6634] font-black uppercase text-xs tracking-widest">#</th>
                                    <th class="w-1/6 text-left py-4 px-6 text-[#0a6634] font-black uppercase text-xs tracking-widest">Gambar</th>
                                    <th class="w-1/4 text-left py-4 px-6 text-[#0a6634] font-black uppercase text-xs tracking-widest">Nama Produk</th>
                                    <th class="w-1/6 text-left py-4 px-6 text-[#0a6634] font-black uppercase text-xs tracking-widest">Kategori</th>
                                    <th class="w-1/6 text-left py-4 px-6 text-[#0a6634] font-black uppercase text-xs tracking-widest">Harga</th>
                                    <th class="text-left py-4 px-6 text-[#0a6634] font-black uppercase text-xs tracking-widest">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @forelse($products as $product)
                                    <tr>
                                        <td class="text-left py-3 px-4">
                                            {{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}
                                        </td>
                                        <td class="text-left py-3 px-4">
                                            @if($product->image)
                                                <img src="{{ asset('storage/' . str_replace('public/', '', $product->image)) }}" alt="{{ $product->name }}"
                                                    class="h-16 w-16 object-cover rounded">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-left py-3 px-4">{{ $product->name }}</td>
                                        <td class="text-left py-3 px-4">{{ $product->category->name ?? 'N/A' }}</td>
                                        <td class="text-left py-3 px-4">Rp{{ number_format($product->price, 0, ',', '.') }}
                                        </td>
                                        <td class="text-left py-4 px-6">
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('admin.products.edit', $product->id) }}"
                                                    class="text-[#0a6634] hover:bg-[#fff8e1] px-3 py-1 rounded-md font-bold transition-colors text-sm">Edit</a>
                                                <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:bg-red-50 px-3 py-1 rounded-md font-bold transition-colors text-sm">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-4">Tidak ada produk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>