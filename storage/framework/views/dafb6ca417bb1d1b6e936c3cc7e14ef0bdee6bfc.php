
<?php $__env->startSection('title', 'Data Dosen'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Pengaturan Akun</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Ketika anda mengubah data anda, anda harus mengulangi
                                proses login</h6>
                        </div>
                    </div>
                    <form id="formAccountSettings" method="POST" action="<?php echo e(route('admin.updateAkun')); ?>">
                    <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo e(Auth::guard('admin')->user()->username); ?>" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="password">Password</label>
                                <input type="text" id="password" name="password" placeholder="************"
                                    class="form-control" readonly />
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="passwordSwitch">
                                    <label class="form-check-label" for="passwordSwitch">Edit Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>

        </div>
    </div>

    <!--/ Card layout -->
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
        })
    </script>
     <script>
        $('#passwordSwitch').change(function() {
        if ($(this).is(':checked')) {
            
            $('#password').prop('readonly', false);
        } else {
            
            $('#password').prop('readonly', true);
        }

    })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/admin/pengaturan-akun.blade.php ENDPATH**/ ?>