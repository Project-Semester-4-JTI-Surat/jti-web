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
                                <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea id="keterangan" class="form-control" readonly aria-describedby="basic-icon-default-message2"><?php echo e($surat->keterangan); ?></textarea>
                                </div>
                            </div>
                            <?php if($surat->status_id == 1): ?>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="<?php echo e(route('admin.surat.proses_surat', ['id' => $surat->uuid])); ?>"
                                            class="btn btn-primary">Proses Surat</a>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($surat->status_id == 3): ?>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="<?php echo e(route('admin.surat.dapat_diambil', ['id' => $surat->uuid])); ?>"
                                            class="btn btn-primary">Dapat diambil </a>
                                        <div class="form-text">Dengan menekan tombol diatas. maka status surat menjadi
                                             dapat diambil
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if($surat->status_id == 2): ?>
                                 <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="<?php echo e(route('admin.surat.surat_selesai', ['id' => $surat->uuid])); ?>"
                                            class="btn btn-success">Selesai </a>
                                        <div class="form-text">Dengan menekan tombol diatas. maka status surat menjadi
                                            selesai
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
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
                                <?php if($value->ketua == 'true'): ?>
                                     <div class="alert alert-primary" role="alert">Ketua Kelompok</div>
                                <?php endif; ?>
                                    <label class="col-sm-2 col-form-label" for="">Nama Anggota
                                        <?php echo e($key + 1); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" readonly
                                            value="<?php echo e($value->nama); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Nim Anggota
                                        <?php echo e($key + 1); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" readonly
                                            value="<?php echo e($value->nim); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Prodi
                                        <?php echo e($key + 1); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prodi_id" readonly
                                            value="<?php echo e($value->prodi->keterangan); ?>">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">No.Hp Anggota
                                        <?php echo e($key + 1); ?></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_hp" readonly
                                            value="<?php echo e($value->no_hp); ?>">
                                    </div>
                                </div>
                                <hr class="hr" />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if($surat->status_id != 1): ?>
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Upload softfile</h5>
                </div>
                <div class="card-body">
                    <form method="post"
                        action="<?php echo e(route('admin.surat.softfile_save', ['id' => $surat->uuid])); ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="softfile">File <span
                                    class='text-danger'>*</span></label>
                            <div class="col-sm-10">
                                <?php echo e(csrf_field()); ?>

                                <input name="softfile" id="softfile" type="file">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>
        <?php if($surat->status_id == 1): ?>
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Tolak Pengajuan</h5>
                </div>
                <div class="card-body">
                    <form id="tolakSurat" method="post"
                        action="<?php echo e(route('admin.surat.tolak_surat', ['id' => $surat->uuid])); ?>">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="keterangan">Keterangan <span
                                    class='text-danger'>*</span></label>
                            <div class="col-sm-10">
                                <?php echo e(csrf_field()); ?>

                                <textarea id="alasan_penolakan" required class="form-control" name="alasan_penolakan"></textarea>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-danger">
                                    Surat</button>
                                <div class="form-text">Dengan menekan tombol diatas, surat akan masuk ke bagian surat
                                    ditolak
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php endif; ?>


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
            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginPdfPreview
            );
            $('#softfile').filepond({
                allowPdfPreview: true,
                pdfPreviewHeight: 320,
                pdfComponentExtraParams: 'toolbar=0&view=fit&page=1',
                acceptedFileTypes: ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword'],
                credits: false,
                fileValidateTypeDetectType: [],
                fileValidateTypeLabelExpectedTypes: 'File harus berekstensi .pdf/.doc atau .docx',
                labelFileProcessingComplete: `Upload Berhasil`,
                labelTapToUndo: `ketuk untuk membatalkan`,
                labelTapToCancel: `ketuk untuk membatalkan`,
                labelFileProcessingError: `Gagal Memproses`,
                labelTapToRetry: `ketuk untuk coba lagi`,
                labelFileProcessing: `Sedang memproses`,
                labelIdle: `Seret dan tempel atau <span class="filepond--label-action">Pilih dokumen</span>`,
                labelInvalidField: 'File tidak didukung',
                server: {
                    url: "<?php echo e(env('APP_URL')); ?>",
                    process: "/temp/file/upload",
                    revert: {
                        url: "/temp/file/delete/",
                        method: 'GET',
                    },
                    headers: {
                        'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    }
                }
            }, );
        })

        function tolakSurat(id) {
            if ($('#alasan_penolakan').val() == '') {
                console.log($('#alasan_penolakan').val());
                $('#alasan_penolakan').addClass('is-invalid')
                $('#alasan_penolakan').after(
                    '<span id="nama-error" class="error invalid-feedback">Kolom harus diisi</span>')
            } else {
                swal({
                    title: "Anda yakin?",
                    text: "Anda yakin untuk menolak pengajuan surat? (Proses ini tidak bisa dibatalkan)",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    // console.log(willDelete);
                    if (willDelete) {

                    }
                })
            }
        }
        $('#tolakSurat').submit(function(e) {
            var form = this;
            e.preventDefault();
            if ($('#alasan_penolakan').val() == '') {
                console.log($('#alasan_penolakan').val());
                $('#alasan_penolakan').addClass('is-invalid')
                $('#alasan_penolakan').after(
                    '<span id="nama-error" class="error invalid-feedback">Kolom harus diisi</span>')
            } else {
                swal({
                    title: "Anda yakin?",
                    text: "Anda yakin untuk menolak pengajuan surat? (Proses ini tidak bisa dibatalkan)",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    // console.log(willDelete);
                    if (willDelete) {
                        form.submit();
                    }
                })
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/admin/detail-surat.blade.php ENDPATH**/ ?>