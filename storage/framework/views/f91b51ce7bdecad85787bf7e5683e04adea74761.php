
<?php $__env->startSection('title', 'Detail Surat'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Surat /</span> Detail</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Detail Surat</h5>
                        
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="dosen_id">Dosen</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dosen_id" readonly
                                        value="<?php echo e($surat->dosen->nama); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="koordinator_id">koordinator</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="koordinator_id" readonly
                                        value="<?php echo e($surat->koordinator->nama); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_mitra">Nama Mitra</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_mitra" readonly
                                        value="<?php echo e($surat->nama_mitra); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_mitra">Alamat Mitra</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat_mitra" readonly
                                        value="<?php echo e($surat->alamat_mitra); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal_dibuat">Tanggal Dibuat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_dibuat" readonly
                                        value="<?php echo e($surat->tanggal_dibuat); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal_pelaksanaan">Tanggal pelaksanaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_pelaksanaan" readonly
                                        value="<?php echo e($surat->tanggal_pelaksanaan); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal_selesai">Tanggal selesai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_selesai" readonly
                                        value="<?php echo e($surat->tanggal_selesai); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="kebutuhan">Kebutuhan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kebutuhan" readonly
                                        value="<?php echo e($surat->kebutuhan); ?>">
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                                <div class="col-sm-10">
                                    <textarea id="basic-default-message" class="form-control" readonly aria-describedby="basic-icon-default-message2"><?php echo e($surat->keterangan); ?></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Daftar Anggota -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Daftar Anggota</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $count = 0;
                                ?>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Nama Anggota
                                        <?php echo e($key+1); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" readonly
                                            value="<?php echo e($value->nama); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Nim Anggota
                                        <?php echo e($key+1); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" readonly
                                            value="<?php echo e($value->nim); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Prodi
                                        <?php echo e($key+1); ?></label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prodi_id" readonly
                                            value="<?php echo e($value->prodi->keterangan); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">No.Hp Anggota
                                        <?php echo e($key+1); ?></label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_hp" readonly
                                            value="<?php echo e($value->no_hp); ?>">
                                    </div>
                                </div>
                                <hr class="hr" />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--/ Card layout -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/admin/detail-surat.blade.php ENDPATH**/ ?>