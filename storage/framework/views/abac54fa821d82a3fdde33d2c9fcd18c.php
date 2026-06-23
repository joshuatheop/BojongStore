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
            <a href="<?php echo e(route('admin.products.index')); ?>" class="hover:text-gray-600">Produk</a>
            <i class='bx bx-chevron-right'></i>
            <span class="text-gray-600 font-medium">Tambah Produk Baru</span>
        </nav>
    </div>

    
    <div class="mb-6">
        <h1 class="text-xl font-bold text-gray-800">Tambah Produk Baru</h1>
        <p class="text-sm text-gray-500 mt-0.5">Lengkapi informasi produk sesuai standar kualitas BojongStore.</p>
    </div>

    <?php if($errors->any()): ?>
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-5 text-sm">
            <ul class="list-disc list-inside space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.products.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
            <div class="flex flex-col lg:flex-row gap-6">

                
                <div class="lg:w-5/12 flex-shrink-0">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-3">Foto Produk <span class="text-red-500">*</span></p>

                    
                    <label for="mainImageInput"
                        class="block w-full aspect-square border-2 border-dashed border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 cursor-pointer transition-colors relative overflow-hidden">
                        <div id="mainImagePreview"
                            class="w-full h-full flex flex-col items-center justify-center text-gray-400 gap-2">
                            <i class='bx bx-upload text-4xl'></i>
                            <span class="text-sm font-medium">Pilih Foto Utama</span>
                            <span class="text-[10px] text-center text-gray-400 px-4">Format JPG, PNG atau
                                WEBP.<br>Rekomendasi 1200×1600px (Maks. 2MB).</span>
                        </div>
                        <img id="mainImagePreviewImg" src="" alt=""
                            class="hidden absolute inset-0 w-full h-full object-cover">
                        <input type="file" id="mainImageInput" name="image" accept="image/*" class="hidden" required
                            onchange="previewMainImage(event)">
                    </label>

                    
                    <div class="grid grid-cols-3 gap-2 mt-3">
                        <?php for($i = 0; $i < 3; $i++): ?>
                            <label
                                class="aspect-square border-2 border-dashed border-gray-200 rounded-xl bg-gray-50 hover:bg-gray-100 cursor-pointer flex items-center justify-center transition-colors">
                                <i class='bx bx-plus text-gray-300 text-2xl'></i>
                            </label>
                        <?php endfor; ?>
                    </div>
                </div>

                
                <div class="flex-1 space-y-4">
                    
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Nama Produk <span class="text-red-500">*</span></label>
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
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Harga (RP) <span class="text-red-500">*</span></label>
                            <input type="number" name="price" placeholder="0" min="0"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20"
                                value="<?php echo e(old('price')); ?>" required>
                            <?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Kategori <span class="text-red-500">*</span></label>
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
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Deskripsi Produk <span class="text-red-500">*</span></label>
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
                        <div class="w-9 h-9 bg-[#e8f5ec] rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class='bx bxs-star text-[#1a5c2a]'></i>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-gray-800">Jadikan Produk Unggulan</p>
                            <p class="text-xs text-gray-400">Produk akan tampil di halaman depan sebagai rekomendasi.</p>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1" class="sr-only peer" <?php echo e(old('is_featured') ? 'checked' : ''); ?>>
                            <div class="w-11 h-6 bg-gray-200 peer-checked:bg-[#1a5c2a] rounded-full transition-colors mb-0"></div>
                            <div class="absolute left-0.5 top-0.5 w-5 h-5 bg-white rounded-full shadow transition-transform peer-checked:translate-x-5"></div>
                        </label>
                    </div>

                    
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Nomor WhatsApp</label>
                            <input type="text" name="whatsapp" placeholder="Contoh: 628123456789"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('whatsapp')); ?>">
                            <?php $__errorArgs = ['whatsapp'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Link Shopee</label>
                            <input type="url" name="shoppee" placeholder="Contoh: https://shopee.co.id/..."
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('shoppee')); ?>">
                            <?php $__errorArgs = ['shoppee'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <div>
                        <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Tags (pisahkan dengan koma)</label>
                        <input type="text" name="tags" placeholder="Contoh: keripik, pisang, manis"
                            class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                            value="<?php echo e(old('tags')); ?>">
                        <?php $__errorArgs = ['tags'];
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
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Berat Produk</label>
                            <input type="text" name="weight" placeholder="Contoh: 250g, 1 kg"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('weight')); ?>">
                            <?php $__errorArgs = ['weight'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Jenis Produk</label>
                            <input type="text" name="type" placeholder="Contoh: Makanan, Minuman"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('type')); ?>">
                            <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Kemasan</label>
                            <input type="text" name="packaging" placeholder="Contoh: Pouch, Botol"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('packaging')); ?>">
                            <?php $__errorArgs = ['packaging'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Daya Tahan</label>
                            <input type="text" name="shelf_life" placeholder="Contoh: 6 bulan"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('shelf_life')); ?>">
                            <?php $__errorArgs = ['shelf_life'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase tracking-wider block mb-1.5">Produksi</label>
                            <input type="text" name="production" placeholder="Contoh: Setiap Hari"
                                class="w-full border border-gray-200 rounded-lg px-3 py-2.5 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#1a5c2a]/20 placeholder-gray-300"
                                value="<?php echo e(old('production')); ?>">
                            <?php $__errorArgs = ['production'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="text-xs text-red-500 mt-1"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    
                    <input type="hidden" name="seller" value="<?php echo e(Auth::user()->name); ?>">
                </div>
            </div>

            
            <div class="mt-6 flex justify-end gap-3 border-t border-gray-100 pt-4">
                <a href="<?php echo e(route('admin.products.index')); ?>"
                    class="px-5 py-2.5 rounded-lg border border-gray-200 text-sm font-semibold text-gray-600 hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="flex items-center gap-2 bg-[#1a5c2a] hover:bg-[#154a22] text-white text-sm font-semibold px-6 py-2.5 rounded-lg transition-colors shadow-sm">
                    <i class='bx bx-check'></i> Simpan Produk
                </button>
            </div>
        </div>
    </form>

    <script>
        // Preview gambar utama
        function previewMainImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            if (file.size > 2 * 1024 * 1024) {
                alert('Ukuran foto produk maksimal 2MB (batasan server). Silakan pilih foto lain.');
                event.target.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('mainImagePreviewImg');
                img.src = e.target.result;
                img.classList.remove('hidden');
                document.getElementById('mainImagePreview').classList.add('hidden');
            };
            reader.readAsDataURL(file);
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
<?php endif; ?><?php /**PATH D:\SMT 6\PPL\clone ppl\BojongStore\resources\views/admin/products/create.blade.php ENDPATH**/ ?>