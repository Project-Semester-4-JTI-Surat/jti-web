<?php $__env->startComponent('mail::message'); ?>
# Welcome to the first Newsletter

Dear <?php echo e($email); ?>,

We look forward to communicating more with you. For more information visit our blog.

<?php $__env->startComponent('mail::button', ['url' => 'http://jti-surat.my.id/verifikasi?id='.$id]); ?>
Blog
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/emaillayout.blade.php ENDPATH**/ ?>