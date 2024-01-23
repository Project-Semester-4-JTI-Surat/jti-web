<?php $__env->startSection('title', 'Data Rekap Surat'); ?>
<?php $__env->startSection('content'); ?>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Rekap Surat </h4>

        <div class="card">
            <h5 class="card-header">Rekap Surat</h5>

            <div class="col-md-12" style="padding-left: 2rem; padding-bottom: 2rem">
                <form action="<?php echo e(route('admin.rekap.export')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row g-3" style="padding-bottom: 1rem;">
                        <div class="col-md-3">
                            <input placeholder="Masukkan range tanggal" class="datepicker-here form-control digits" name="date" type="text" id="daterange" data-date-format="yyyy-mm-dd" data-range="true" data-multiple-dates-separator=" - " data-language="en" autocomplete="off" data-bs-original-title="" title="">
                        </div>
                    </div>
                    <button class="btn btn-primary">Export</button>
                </form>
            </div>
            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                <div class="table-responsive text-nowrap">

                    <table class="table" id="jsurat">
                        <thead>
                        <tr>
                            <th>NO</th>
                            <th>Kode</th>
                            <th>Prodi</th>
                            <th>Metode Pengajuan</th>
                            <th>File Scan</th>
                            <th>Tanggal dibuat</th>
                            <th>Kebutuhan</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>

                    </table>
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
            loadTable();
        })

        function loadTable() {
            var url = "<?php echo e(route('admin.rekap.index')); ?>";
            $('#jsurat').DataTable({
                searching: true,
                paging: true,
                destroy: true,
                "ordering": false,
                // serverSide: true,
                ajax: url,
                columnDefs: [{
                    target: 2,
                    visible: false,
                }],
                columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                    {
                        data: 'kode_surat',
                        name: 'kode_surat',
                    },
                    {
                        data: 'prodi.keterangan',
                        name: 'prodi.keterangan',
                    },
                    {
                        data: 'metode_pengajuan',
                        name: 'metode_pengajuan',
                    },

                    {
                        data: 'file_scan',
                        name: 'file_scan',
                        // visible: row.softfile_scan =='null' ? 'true' : 'false',
                        
                        
                        
                        
                        
                        
                        
                    },
                    {
                        data: 'tanggal_dibuat',
                        name: 'tanggal_dibuat',
                    },
                    {
                        data: 'kebutuhan',
                        name: 'kebutuhan',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                    },
                ],
            });
        }
        $('#formTambahData').submit(function(e) {
            var form = $('#formTambahData');
            if (form.valid()) {
                console.log(form.valid());
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "<?php echo e(route('admin.jenis_surat.insertJenisSurat')); ?>",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        $('#tambahData').modal('hide');
                        loadTable();
                        swal("Success", "Data berhasil dimasukkan", "success");
                        // $("#btn-save").html('Submit');
                        // $("#btn-save"). attr("disabled", false);
                    },
                    error: function(data) {
                        swal("Gagal", "Data telah ada", "error");
                    }
                })
            }

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\jti-surat\resources\views/admin/rekap.blade.php ENDPATH**/ ?>