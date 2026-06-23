<?php if (isset($component)) { $__componentOriginal44deac33eb74610d70428b57443ac63e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal44deac33eb74610d70428b57443ac63e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-panel','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-panel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    
    <div class="mb-1">
        <nav class="text-xs text-gray-400 flex items-center gap-1.5">
            <span>Produk</span>
            <i class='bx bx-chevron-right'></i>
            <span class="text-gray-600 font-medium">Daftar Produk</span>
        </nav>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6 mt-4">
        
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-11 h-11 bg-[#e8f5ec] rounded-xl flex items-center justify-center flex-shrink-0">
                <i class='bx bx-package text-2xl text-[#1a5c2a]'></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Total Produk</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo e(number_format($total_products)); ?></p>
                <p class="text-xs <?php echo e($productGrowth >= 0 ? 'text-[#1a5c2a]' : 'text-red-600'); ?> font-semibold mt-0.5">
                    <?php echo e($productGrowth > 0 ? '↑ +' : ($productGrowth < 0 ? '↓ ' : '')); ?><?php echo e($productGrowth); ?>% bulan ini
                </p>
            </div>
        </div>

        
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-11 h-11 bg-orange-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class='bx bxs-star text-2xl text-orange-400'></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Produk Unggulan</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo e($total_featured); ?></p>
                <p class="text-xs text-gray-400 mt-0.5">Status: Aktif</p>
            </div>
        </div>

        
        <div class="bg-white rounded-xl p-5 border border-gray-100 shadow-sm flex items-center gap-4">
            <div class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0">
                <i class='bx bx-category text-2xl text-blue-500'></i>
            </div>
            <div>
                <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Jumlah Kategori</p>
                <p class="text-2xl font-bold text-gray-800"><?php echo e($total_categories); ?></p>
                <p class="text-xs text-gray-400 mt-0.5">2 Baru ditambahkan</p>
            </div>
        </div>
    </div>

    
    <div class="bg-white rounded-xl border border-gray-100 shadow-sm">
        
        <div class="p-5 flex flex-col sm:flex-row items-center gap-3 border-b border-gray-100">
            
            <div class="relative flex-1 w-full">
                <i class='bx bx-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg'></i>
                <input type="text" id="searchInput" placeholder="Sambal" onkeyup="filterTable()"
                    class="w-full pl-9 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-400">
            </div>

            
            <select id="categoryFilter" onchange="filterTable()"
                class="border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 min-w-[160px]">
                <option value="">Semua Kategori</option>
                <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->name); ?>"><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            
            <button onclick="document.getElementById('modalTambahProduk').classList.remove('hidden')"
                class="flex items-center gap-2 bg-[#1a5c2a] hover:bg-[#154a22] text-white text-sm font-semibold px-5 py-2.5 rounded-lg transition-colors whitespace-nowrap shadow-sm">
                <i class='bx bx-plus text-lg'></i> Tambah Produk
            </button>
        </div>

        
        <div class="overflow-x-auto">
            <table class="w-full" id="productTable">
                <thead>
                    <tr class="border-b border-gray-100">
                        <th class="text-left py-3 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider">Produk
                        </th>
                        <th class="text-left py-3 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider">Harga
                        </th>
                        <th class="text-left py-3 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider">
                            Kategori</th>
                        <th class="text-center py-3 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider">
                            Unggulan</th>
                        <th class="text-right py-3 px-5 text-xs font-bold text-gray-400 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50/50 transition-colors"
                            data-category="<?php echo e($product->category->name ?? ''); ?>"
                            data-name="<?php echo e(strtolower($product->name)); ?>">
                            
                            <td class="py-3.5 px-5">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                                        <?php if($product->image): ?>
                                            <?php
                                                $imgUrl = $product->image_url;
                                            ?>
                                            <img src="<?php echo e($imgUrl); ?>" alt="<?php echo e($product->name); ?>"
                                                class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <div class="w-full h-full flex items-center justify-center">
                                                <i class='bx bx-image text-gray-300 text-2xl'></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-800"><?php echo e($product->name); ?></p>
                                        <p class="text-xs text-gray-400">SKU:
                                            PRD-<?php echo e(str_pad($product->id, 3, '0', STR_PAD_LEFT)); ?></p>
                                    </div>
                                </div>
                            </td>

                            
                            <td class="py-3.5 px-5">
                                <span class="text-sm font-semibold text-gray-700">Rp
                                    <?php echo e(number_format($product->price, 0, ',', '.')); ?></span>
                            </td>

                            
                            <td class="py-3.5 px-5">
                                <?php if($product->category): ?>
                                    <span
                                        class="text-xs font-semibold px-2.5 py-1 rounded-full
                                                                    <?php echo e(in_array($product->category->name, ['Makanan', 'Minuman', 'Makanan & Minuman']) ? 'bg-orange-100 text-orange-600' : 'bg-blue-100 text-blue-600'); ?>">
                                        <?php echo e($product->category->name); ?>

                                    </span>
                                <?php else: ?>
                                    <span class="text-xs text-gray-400">—</span>
                                <?php endif; ?>
                            </td>

                            
                            <td class="py-3.5 px-5 text-center">
                                <form action="<?php echo e(route('admin.products.toggleFeatured', $product->id)); ?>" method="POST"
                                    class="inline">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit"
                                        title="<?php echo e($product->is_featured ? 'Nonaktifkan' : 'Jadikan Unggulan'); ?>"
                                        class="relative inline-flex items-center w-11 h-6 rounded-full transition-colors focus:outline-none
                                                               <?php echo e($product->is_featured ? 'bg-[#1a5c2a]' : 'bg-gray-200'); ?>">
                                        <span
                                            class="inline-block w-5 h-5 bg-white rounded-full shadow transform transition-transform
                                                                 <?php echo e($product->is_featured ? 'translate-x-5' : 'translate-x-0.5'); ?>"></span>
                                    </button>
                                </form>
                            </td>

                            
                            <td class="py-3.5 px-5 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="<?php echo e(route('admin.products.edit', $product->id)); ?>"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-[#1a5c2a] transition-colors">
                                        <i class='bx bx-edit-alt text-base'></i>
                                    </a>
                                    <form action="<?php echo e(route('admin.products.destroy', $product->id)); ?>" method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-500 hover:bg-red-50 hover:text-red-500 transition-colors">
                                            <i class='bx bx-trash text-base'></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-16 text-gray-400">
                                <i class='bx bx-package text-4xl mb-2 block'></i>
                                <p class="text-sm">Belum ada produk. Tambah produk pertama Anda!</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        
        <div class="px-5 py-4 border-t border-gray-100 flex flex-col sm:flex-row items-center justify-between gap-3">
            <p class="text-xs text-gray-400">
                Menampilkan <?php echo e($products->firstItem()); ?>–<?php echo e($products->lastItem()); ?> dari <?php echo e($products->total()); ?>

                produk
            </p>
            <div class="text-sm">
                <?php echo e($products->links()); ?>

            </div>
        </div>
    </div>

    
    <div id="modalTambahProduk"
        class="hidden fixed inset-0 z-[200] bg-black/40 backdrop-blur-sm flex items-center justify-center px-4"
        onclick="if(event.target===this) this.classList.add('hidden')">

        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-3xl max-h-[90vh] overflow-y-auto">
            
            <div class="px-7 pt-7 pb-4 flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-bold text-gray-900">Tambah Produk Baru</h2>
                    <p class="text-sm text-gray-500 mt-1">Lengkapi informasi produk UMKM sesuai standar kualitas
                        Bojongsoang untuk ditayangkan di BojongStore.</p>
                </div>
                <button onclick="document.getElementById('modalTambahProduk').classList.add('hidden')"
                    class="text-gray-400 hover:text-gray-600 transition-colors ml-4 mt-1">
                    <i class='bx bx-x text-2xl'></i>
                </button>
            </div>

            
            <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="px-7 pb-7">
                    <div class="flex flex-col md:flex-row gap-6">

                        
                        <div class="md:w-5/12 flex-shrink-0">
                            <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Foto Produk</p>

                            
                            <label for="mainImageInput"
                                class="block w-full aspect-square border-2 border-dashed border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 cursor-pointer transition-colors relative overflow-hidden">
                                <div id="mainImagePreview"
                                    class="w-full h-full flex flex-col items-center justify-center text-gray-400 gap-2">
                                    <i class='bx bx-upload text-4xl'></i>
                                    <span class="text-sm font-medium">Pilih Foto Utama</span>
                                    <span class="text-[10px] text-center text-gray-400 px-4">Format JPG, PNG atau
                                        WEBP.<br>Rekomendasi 1200×1600px (Maks. 5MB).</span>
                                </div>
                                <img id="mainImagePreviewImg" src="" alt=""
                                    class="hidden absolute inset-0 w-full h-full object-cover">
                                <input type="file" id="mainImageInput" name="image" accept="image/*" class="hidden"
                                    onchange="previewMainImage(event)">
                            </label>
                        </div>

                        
                        <div class="flex-1 space-y-4">
                            
                            <div>
                                <label
                                    class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Nama
                                    Produk</label>
                                <input type="text" name="name" placeholder="Contoh: Kripik Pisang Madu Organik"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                    value="<?php echo e(old('name')); ?>" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Harga
                                        (RP)</label>
                                    <input type="number" name="price" placeholder="0" min="0"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20"
                                        value="<?php echo e(old('price')); ?>" required>
                                </div>
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Kategori</label>
                                    <select name="category_id"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20"
                                        required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <?php $__currentLoopData = \App\Models\Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
                                                <?php echo e($category->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                            
                            <div>
                                <label
                                    class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Deskripsi
                                    Produk</label>
                                <textarea name="description" rows="4"
                                    placeholder="Jelaskan detail produk, bahan, dan keunggulan..."
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300 resize-none"
                                    required><?php echo e(old('description')); ?></textarea>
                                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            
                            <div class="border border-gray-200 rounded-xl p-4 flex items-center gap-4">
                                <div
                                    class="w-9 h-9 bg-[#e8f5ec] rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class='bx bxs-star text-[#1a5c2a]'></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-sm font-semibold text-gray-800">Jadikan Produk Unggulan</p>
                                    <p class="text-xs text-gray-400">Produk akan tampil di halaman depan sebagai
                                        rekomendasi.</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="is_featured" value="1" class="sr-only peer" <?php echo e(old('is_featured') ? 'checked' : ''); ?>>
                                    <div
                                        class="w-11 h-6 bg-gray-200 peer-checked:bg-[#1a5c2a] rounded-full transition-colors">
                                    </div>
                                    <div
                                        class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5">
                                    </div>
                                </label>
                            </div>

                            
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Nomor
                                        WhatsApp</label>
                                    <input type="text" name="whatsapp" placeholder="Contoh: 628123456789"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('whatsapp')); ?>">
                                </div>
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Link
                                        Shopee</label>
                                    <input type="url" name="shoppee" placeholder="Contoh: https://shopee.co.id/..."
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('shoppee')); ?>">
                                </div>
                            </div>

                            
                            <div>
                                <label
                                    class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Tags
                                    (pisahkan dengan koma)</label>
                                <input type="text" name="tags" placeholder="Contoh: keripik, pisang, manis"
                                    class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                    value="<?php echo e(old('tags')); ?>">
                            </div>

                            
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Berat
                                        Produk</label>
                                    <input type="text" name="weight" placeholder="Contoh: 250g, 1 kg"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('weight')); ?>">
                                </div>
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Jenis
                                        Produk</label>
                                    <input type="text" name="type" placeholder="Contoh: Makanan, Minuman"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('type')); ?>">
                                </div>
                            </div>

                            <div class="grid grid-cols-3 gap-3">
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Kemasan</label>
                                    <input type="text" name="packaging" placeholder="Contoh: Pouch, Botol"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('packaging')); ?>">
                                </div>
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Daya
                                        Tahan</label>
                                    <input type="text" name="shelf_life" placeholder="Contoh: 6 bulan"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('shelf_life')); ?>">
                                </div>
                                <div>
                                    <label
                                        class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Produksi</label>
                                    <input type="text" name="production" placeholder="Contoh: Setiap Hari"
                                        class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                        value="<?php echo e(old('production')); ?>">
                                </div>
                            </div>

                            
                            <input type="hidden" name="seller" value="<?php echo e(Auth::user()->name); ?>">
                        </div>
                    </div>
                </div>

                
                <div class="px-7 py-4 border-t border-gray-100 flex justify-end gap-3">
                    <button type="button" onclick="document.getElementById('modalTambahProduk').classList.add('hidden')"
                        class="px-5 py-2.5 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">
                        Batal
                    </button>
                    <button type="submit"
                        class="flex items-center gap-2 bg-[#1a5c2a] hover:bg-[#154a22] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors shadow-sm">
                        <i class='bx bx-check'></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <?php if($errors->any()): ?>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('modalTambahProduk').classList.remove('hidden');
            });
        </script>
    <?php endif; ?>

    <script>
        // Preview gambar utama
        function previewMainImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('mainImagePreviewImg');
                img.src = e.target.result;
                img.classList.remove('hidden');
                document.getElementById('mainImagePreview').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        // Filter tabel
        function filterTable() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const category = document.getElementById('categoryFilter').value.toLowerCase();
            const rows = document.querySelectorAll('#productTable tbody tr');
            rows.forEach(row => {
                const name = (row.dataset.name || '').toLowerCase();
                const cat = (row.dataset.category || '').toLowerCase();
                const matchSearch = search === '' || name.includes(search);
                const matchCat = category === '' || cat.includes(category);
                row.style.display = (matchSearch && matchCat) ? '' : 'none';
            });
        }
    </script>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal44deac33eb74610d70428b57443ac63e)): ?>
<?php $attributes = $__attributesOriginal44deac33eb74610d70428b57443ac63e; ?>
<?php unset($__attributesOriginal44deac33eb74610d70428b57443ac63e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal44deac33eb74610d70428b57443ac63e)): ?>
<?php $component = $__componentOriginal44deac33eb74610d70428b57443ac63e; ?>
<?php unset($__componentOriginal44deac33eb74610d70428b57443ac63e); ?>
<?php endif; ?><?php /**PATH D:\SMT 6\PPL\clone ppl\BojongStore\resources\views/admin/products/index.blade.php ENDPATH**/ ?>