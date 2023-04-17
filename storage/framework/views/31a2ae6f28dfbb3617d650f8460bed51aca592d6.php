<?php $__env->startComponent('mail::message'); ?>
# Surat Ditolak

Halo <?php echo e($email); ?>,<br>
Surat Anda ditolak dengan alasan berikut : <br>
<p style="font-weight: bold"><?php echo e($alasan_penolakan); ?></p>


<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/tolak-surat-email.blade.php ENDPATH**/ ?>