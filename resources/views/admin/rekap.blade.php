@extends('layouts.master')
@section('title', 'Data Rekap Surat')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Rekap Surat </h4>

        <div class="card">
            <h5 class="card-header">Rekap Surat</h5>

            <div class="col-md-12" style="padding-left: 2rem; padding-bottom: 2rem">
                <form action="{{route('admin.rekap.export')}}" method="POST">
                    @csrf
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
                            <th>File Scan</th>
                            <th>Tanggal dibuat</th>
                            <th>Kebutuhan</th>
{{--                            <th>Aksi</th>--}}
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
@endsection

@section('script')
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
            var url = "{{ route('admin.rekap.index') }}";
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
                        data: 'softfile_scan',
                        name: 'softfile_scan',
                        // visible: row.softfile_scan =='null' ? 'true' : 'false',
                        hideIfEmpty: true,
                        render: function(data, type, row) {
                            return row.softfile_scan == '' || row.softfile_scan == null || row.softfile_scan == null ?
                                '-'
                                :
                                '<a target="_blank" href={{env('APP_URL')}}/storage/'+row.softfile_scan+' class="btn  btn-icon me-2 btn-primary"> <i class="fa-solid fa-file"></i> </a>'
                        }
                    },
                    {
                        data: 'tanggal_dibuat',
                        name: 'tanggal_dibuat',
                    },
                    {
                        data: 'kebutuhan',
                        name: 'kebutuhan',
                    },
                    // {
                    //     data: 'detail',
                    //     name: 'detail',
                    // },
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
                    url: "{{ route('admin.jenis_surat.insertJenisSurat') }}",
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
@endsection
