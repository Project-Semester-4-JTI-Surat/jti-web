@extends('layouts.master')
@section('title', 'Data Surat')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Surat </h4>
        <!-- Content -->
        <!-- Large Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Tarif</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="updateForm">
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="priceBefore" class="form-label">Harga Semula</label>
                                    <input type="text" id="priceBefore" name="priceBefore" class="form-control" readonly
                                        disabled />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="price" class="form-label">Harga</label>
                                    <input type="text" id="price" name="price" class="form-control" />
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Surat</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" id="formTambahData">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col mb-3 control-group">
                                    <label for="keterangan" class="form-label">keterangan</label>
                                    <input type="text" id="keterangan" name="keterangan" class="form-control" required />
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Data Surat</h5>
            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
              
            </div>
            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                <div class="table-responsive text-nowrap">

                    <table class="table" id="jsurat">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>uuid</th>
                                <th>Kode Surat</th>
                                <th>Prodi</th>
                                <th>Status</th>
                                <th>Dosen</th>
                                <th>Koordinator</th>
                                <th>Nama Mitra</th>
                                <th>Alamat Mitra</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Tanggal Selesai</th>
                                <th>Judul Ta</th>
                                <th>Kebutuhan</th>
                                <th>Alasan Penolakan</th>
                                <th>Softfile</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                                <th>Print</th>
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
            var url = "{{ route('admin.surat.index', ['status' => Request::get('status')]) }}";
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
                        data: 'uuid',
                        name: 'uuid',
                        visible:false,
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
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'dosen.nama',
                        name: 'dosen.nama',
                    },
                    {
                        data: 'koordinator.nama',
                        name: 'koordinator.nama',
                    },
                    {
                        data: 'nama_mitra',
                        name: 'nama_mitra',
                    },
                    {
                        data: 'alamat_mitra',
                        name: 'alamat_mitra',
                    },
                    {
                        data: 'tanggal_dibuat',
                        name: 'tanggal_dibuat',
                    },
                    {
                        data: 'tanggal_pelaksanaan',
                        name: 'tanggal_pelaksanaan',
                    },
                    {
                        data: 'tanggal_selesai',
                        name: 'tanggal_selesai',
                    },
                    {
                        data: 'judul_ta',
                        name: 'judul_ta',
                    },
                    {
                        data: 'kebutuhan',
                        name: 'kebutuhan',
                    },
                    {
                        data: 'alasan_penolakan',
                        name: 'alasan_penolakan',
                        visible: {{ Request::get('status') == 5 ? 'true' : 'false'  }}
                    },
                    {
                        data: 'softfile',
                        name: 'softfile',
                        visible: {{ Request::get('status') == 4 ? 'true' : 'false'  }}
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan',
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        visible: {{ Auth::guard('admin')->user()->role_id == '1' ? 'true' : 'false'  }}
                        // render: function(data, type, row) {
                        //   return '<button onclick="edit(' + row.id + ')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
                        //}
                    },
                    {
                        data: 'print',
                        name: 'print',
                        visible: {{ Request::get('status') == 4 ? 'true' : 'false'  }}
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
