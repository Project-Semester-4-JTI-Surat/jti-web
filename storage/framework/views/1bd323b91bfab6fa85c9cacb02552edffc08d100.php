<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img width="110" heigth="20" src="<?php echo e(asset('img/logo.svg')); ?>">
            </span>
            
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''); ?>"
            href="<?php echo e(route('admin.dashboard')); ?>">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Surat</span>
        </li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.surat.index' ? 'active' : ''); ?>">
            <?php
                $status = \App\Models\Status::all();
            ?>
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Status Surat</div>
            </a>
            <ul class="menu-sub">
                <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="menu-item <?php echo e(Request::get('status') == $value->id ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('admin.surat.index', ['status' => $value->id])); ?>" class="menu-link">
                            <div><?php echo e($value->keterangan); ?></div>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.prodi.index' ? 'active' : ''); ?>">
            <a class="menu-link" href="<?php echo e(route('admin.prodi.index')); ?>">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Support">Data Prodi</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.jenis_surat.index' ? 'active' : ''); ?>">
            <a class="menu-link" href="<?php echo e(route('admin.jenis_surat.index')); ?>">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Support">Jenis Surat</div>
            </a>
        </li>
        <!-- Data Master -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Master</span></li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.mahasiswa.index' ? 'active' : ''); ?>">
            <a class="menu-link" href="<?php echo e(route('admin.mahasiswa.index')); ?>">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Support">Data Mahasiswa</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.dosen.index' ? 'active' : ''); ?>">
            <a class="menu-link" href="<?php echo e(route('admin.dosen.index')); ?>">
                <i class="menu-icon tf-icons bx bxs-institution"></i>
                <div data-i18n="Support">Data Dosen</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.koordinator.index' ? 'active' : ''); ?>">
            <a class="menu-link" href="<?php echo e(route('admin.koordinator.index')); ?>">
                <i class="menu-icon tf-icons bx bxs-business"></i>
                <div data-i18n="Support">Data Koordinator</div>
            </a>
        </li>
        <li class="menu-item <?php echo e(Route::currentRouteName() == 'admin.data-admin.index' ? 'active' : ''); ?>">
            <a class="menu-link" href="<?php echo e(route('admin.data-admin.index')); ?>">
                <i class="menu-icon tf-icons bx bxs-user-check"></i>
                <div data-i18n="Support">Data Admin</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
<?php /**PATH C:\laragon\www\jti-surat\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>