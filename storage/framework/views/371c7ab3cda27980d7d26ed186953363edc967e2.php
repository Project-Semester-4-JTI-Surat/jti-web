<?php $__env->startComponent('mail::message'); ?>
# Password Reset

Halo <?php echo e($email); ?>,<br>
Kami telah membuat reset password untuk anda.<br>
Link dibawah ini akan expired dalam satu jam kedepan


<?php $__env->startComponent('mail::button', ['url' => route('save_password',['id'=>$id])]); ?>
Reset Password
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<br>
Jika tombol tidak bisa di klik maka copy link dibawah ini ke kolom pencarian browser anda
<?php echo e(route('save_password',['id'=>$id])); ?>

<?php echo $__env->renderComponent(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/reset_password.blade.php ENDPATH**/ ?>