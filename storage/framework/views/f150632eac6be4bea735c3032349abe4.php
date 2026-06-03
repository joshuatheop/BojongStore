<?php $__env->startSection('content'); ?>
<div class="max-w-6xl mx-auto px-4" style="padding-top: 120px;">
<div class="max-w-6xl mx-auto px-4" style="padding-top: 10px;">
    
    <form method="GET" action="<?php echo e(route('katalog')); ?>" class="flex flex-col md:flex-row gap-4 mb-12">
        
        <div class="w-full md:w-1/4">
            <select name="category" class="border border-gray-300 rounded-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                <option value="">Semua Kategori</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>" <?php echo e(request('category') == $category->id ? 'selected' : ''); ?>>
                        <?php echo e($category->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <div class="flex w-full md:w-2/4">
            <input type="text" name="search" value="<?php echo e(request('search')); ?>" class="border border-gray-300 rounded-l-lg px-4 py-3 w-full focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent" placeholder="Cari Produk">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-12 rounded-r-lg transition-colors duration-200 font-medium whitespace-nowrap">
                Cari
            </button>
        </div>
    </form>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">

        
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <a href="<?php echo e(route('produk.detail', $product->slug)); ?>" class="bg-white border rounded-xl shadow-lg p-4 flex flex-col items-center hover:shadow-xl transition-shadow duration-300 no-underline">
            <div class="w-full h-48 mb-4 flex items-center justify-center">
                
                <img  src="<?php echo e($product->image ? asset('storage/' . $product->image) : 'https://placehold.co/400x400/e2e8f0/333333?text=No+Image'); ?>" alt="<?php echo e($product->name); ?>" class="max-h-full max-w-full object-contain">
            </div>
            <div class="text-center w-full">
                
                <h3 class="font-semibold text-sm md:text-base mb-2 text-gray-800 line-clamp-2"><?php echo e($product->name); ?></h3>
                
                
                <div class="text-green-700 font-bold text-lg mb-2">
                    Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?>

                </div>
                
                
                <div class="flex justify-center text-yellow-400 text-sm mb-3">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <?php echo $i <= 4 ? '★' : '☆'; ?> 
                    <?php endfor; ?>
                </div>

                
                <div class="w-full bg-green-600 text-white py-2 px-4 rounded-lg text-sm font-medium">
                    Lihat Detail
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="mt-12 flex justify-center items-center">
        <?php echo e($products->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SMT 6\PPL\clone ppl\BojongStore\resources\views/katalog.blade.php ENDPATH**/ ?>