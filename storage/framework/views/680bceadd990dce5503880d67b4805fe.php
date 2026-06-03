<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'BojongStore')); ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('favicon.ico')); ?>">

    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">

    
    <?php echo $__env->yieldPushContent('styles'); ?>

    
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body x-data x-init="$el.classList.add('opacity-0'); setTimeout(() => $el.classList.remove('opacity-0'), 100)"
    class="transition-opacity duration-700 ease-in-out opacity-0">
    <div>
        
        <?php if(auth()->guard()->check()): ?>
            <?php echo $__env->make('layouts.navigation.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('layouts.navigation.landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('a[href]:not([target="_blank"]):not([href^="#"])');
            links.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const href = this.href;
                    document.body.classList.add('opacity-0');
                    setTimeout(() => {
                        window.location.href = href;
                    }, 150);
                });
            });
        });
    </script>
</body>

</html><?php /**PATH D:\SMT 6\PPL\clone ppl\BojongStore\resources\views/layouts/landing.blade.php ENDPATH**/ ?>