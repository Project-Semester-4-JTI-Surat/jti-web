@extends('layouts.master')
@section('title', 'Data Koordinator')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Koordinator </h4>
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
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col mb-3 control-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nama" class="form-label">Nama Koordinator</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="number" id="no_hp" name="no_hp" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="kode_surat" class="form-label">Jenis</label>
                                    <select class="form-select" id="jenis_surat" name="kode_surat" required>
                                        @foreach ($jsurat as $key => $value)
                                            <option value="{{ $value->kode }}">{{ $value->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="prodi_id" class="form-label">Prodi</label>
                                    <select class="form-select" id="prodi_id" name="prodi" required>
                                        <option value="TIF">TIF(Teknik Informatika)</option>
                                        <option value="TKK">TKK(Teknik Komputer)</option>
                                        <option value="MIF">MIF(Manajemen Informatika)</option>
                                        <option value="BD">BD(Bisnis Digital)</option>
                                        <option value="PLJ">PLJTIF</option>
                                       
                                    </select>
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
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Koordinator</h5>
                        <button type="button"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" id="formTambahData">
                        {{ csrf_field() }}
                            <div class="row">
                                <div class="col mb-3 control-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nama" class="form-label">Nama Koordinator</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="number" id="no_hp" name="no_hp" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="kode_surat" class="form-label">Jenis</label>
                                    <select class="form-select" name="kode_surat" required>
                                        @foreach ($jsurat as $key => $value)
                                            <option value="{{ $value->kode }}">{{ $value->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="prodi_id" class="form-label">Prodi</label>
                                    <select class="form-select" name="prodi" required>
                                        <option value="TIF">TIF(Teknik Informatika)</option>
                                        <option value="TKK">TKK(Teknik Komputer)</option>
                                        <option value="MIF">MIF(Manajemen Informatika)</option>
                                        <option value="BD">BD(Bisnis Digital)</option>
                                        <option value="PLJ">PLJTIF</option>
                                       
                                    </select>
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
            <h5 class="card-header">Data Koordinator</h5>
             <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
             @if(Auth::guard('admin')->user()->role_id == 2)
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                </button>
             @endif

            </div>
            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                <div class="table-responsive text-nowrap">

                    <table class="table" id="tableKoordinator">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>UUID</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Prodi</th>
                                <th>No HP</th>
                                <th>Jenis</th>
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
@endsection

@section('script')
@if (Session::has('updateSuccess'))
        <script>
            swal("Success", "Data berhasil diubah", "success");
        </script>
    @endif
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            $.validator.addMethod("checkAlpha", function(value, element) {
                return (new RegExp("^[a-zA-Z ]*$").test(value))
            }, "Kolom harus diisi dengan huruf");
            $.validator.addMethod("checkAlphaSym", function(value, element) {
                return (new RegExp("^[a-zA-Z .,]*$").test(value))
            }, "Kolom harus diisi dengan huruf");
            $('#formTambahData').validate({
                // wrapper: "#form-input",
                rules: {
                    email: {
                        required: true,
                        email:true,
                    },
                    nama: {
                        required: true,
                        checkAlphaSym: true,
                    },
                    no_hp: {
                        required: true,
                        number: true
                    }


                },
                //hightlight: function(element) {
                //    $(element).addClass('is-invalid')
                //},
                errorElement: "span",
                errorPlacement: function(error, element) {
                     $(element).addClass('is-invalid')
                    error.addClass("invalid-feedback");
                    // error.appendTo("#form-input");
                    error.insertAfter(element);
                },
            });
            loadTable();
        })

        function loadTable() {
            var url = "{{ route('admin.koordinator.index') }}";
            $('#tableKoordinator').DataTable({
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
                        visible: false,
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'prodi',
                        name: 'prodi'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'jenis_surat.keterangan',
                        name: 'jenis_surat.keterangan'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi'
                    }
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
                    url: "{{ route('admin.koordinator.insert') }}",
                    type: 'POST',
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        form.each(function(){
                            this.reset();
                        });
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

        function edit(id) {
            var updateUrl = "{{ route('admin.koordinator.update', ':id') }}"
            var url = "{{ route('admin.koordinator.edit', ':id') }}"
            $.ajax({
                url: url.replace(':id', id),
                success: function(res) {
                    console.log(res.data);
                    $('#email').val(res.data.email);
                    $('#nama').val(res.data.nama);
                    $('#no_hp').val(res.data.no_hp);

                    $('#jenis_surat').val(res.data.kode_surat);
                    $('#prodi_id').val(res.data.prodi);

                    // $("#jenis_surat option:contains(" + res.data.kode_surat + ")").attr('selected', true);
                    // $('#username_update').val(res.data.username);
                    // $('#nama_update').val(res.data.nama);
                    // $('#no_hp_update').val(res.data.no_hp);
                    $('#updateForm').attr('action', updateUrl.replace(':id', id));
                    $('#updateModal').modal('show')

                },
                dataType: 'json',
            });

        }
    </script>
@endsection
