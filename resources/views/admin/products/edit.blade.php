<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-2xl text-[#0a6634] leading-tight uppercase tracking-tight">
            {{ __('Edit Produk: ') . $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-2xl">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <div class="mb-4">
                                    <label for="name" class="block text-sm font-medium text-gray-700">Nama
                                        Produk</label>
                                    <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="seller" class="block text-sm font-medium text-gray-700">Nama
                                        Penjual</label>
                                    <input type="text" name="seller" id="seller"
                                        value="{{ old('seller', $product->seller) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Harga
                                        (Rp)</label>
                                    <input type="number" name="price" id="price"
                                        value="{{ old('price', $product->price) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="category_id"
                                        class="block text-sm font-medium text-gray-700">Kategori</label>
                                    <select name="category_id" id="category_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm"
                                        required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar Produk
                                        (Kosongkan jika tidak ingin diubah)</label>
                                    <input type="file" name="image" id="image" class="mt-1 block w-full">
                                    @if($product->image)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . str_replace('public/', '', $product->image)) }}" alt="{{ $product->name }}"
                                                class="h-24 w-24 object-cover rounded">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <div>
                                <div class="mb-4">
                                    <label for="description"
                                        class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <textarea name="description" id="description" rows="5"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm"
                                        required>{{ old('description', $product->description) }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="tags" class="block text-sm font-medium text-gray-700">Tags (pisahkan
                                        dengan koma)</label>
                                    <input type="text" name="tags" id="tags" value="{{ old('tags', $product->tags) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm">
                                </div>
                                <div class="mb-4">
                                    <label for="shoppee" class="block text-sm font-medium text-gray-700">Link
                                        Shopee</label>
                                    <input type="url" name="shoppee" id="shoppee"
                                        value="{{ old('shoppee', $product->shoppee) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm">
                                </div>
                                <div class="mb-4">
                                    <label for="whatsapp" class="block text-sm font-medium text-gray-700">Nomor
                                        WhatsApp</label>
                                    <input type="text" name="whatsapp" id="whatsapp"
                                        value="{{ old('whatsapp', $product->whatsapp) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#0a6634] focus:ring-[#0a6634] sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 flex justify-end">
                            <a href="{{ route('admin.products.index') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-lg mr-4 transition-colors">Batal</a>
                            <button type="submit"
                                class="bg-[#0a6634] hover:bg-[#074724] text-white font-bold py-3 px-8 rounded-lg shadow-md transition-colors">Update
                                Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>