

<?php $__env->startSection('content'); ?>
    <h1 class="display-4">Home Page</h1>
    <p class="lead">This is homepage</p>

    
    <p>Nama : <?php echo e($nama); ?></p>
    <p>Pelajaran</p>
    <ul>
        <?php $__currentLoopData = $pelajaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($item); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/home.blade.php ENDPATH**/ ?>