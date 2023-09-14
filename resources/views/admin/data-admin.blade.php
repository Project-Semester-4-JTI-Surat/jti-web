@extends('layouts.master')
@section('title', 'Data Admin')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Admin </h4>
        <!-- Content -->
        <!-- Large Modal -->
        <div class="modal fade" id="editData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Edit Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" id="updateForm">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col mb-3 control-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username_update" name="username" class="form-control"
                                        readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nama" class="form-label">Nama Admin</label>
                                    <input type="text" id="nama_update" name="nama" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="text" id="no_hp_update" name="no_hp" class="form-control" readonly />
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="passwordSwitch">
                                    <label class="form-check-label" for="passwordSwitch">Edit Password</label>
                                </div>
                                <small id="password_help" class="form-text text-muted">Klik tombol diatas untuk mengubah
                                    password baru</small>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" id="password" autocomplete="false" name="password"
                                        class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <select id="prodi_id" class="form-select" name="prodi_id" required>
                                        @foreach ($prodi as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->keterangan }}</option>
                                        @endforeach
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
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Admin</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" id="formTambahData">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col mb-3 control-group">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nama" class="form-label">Nama Admin</label>
                                    <input type="text" id="nama" name="nama" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="no_hp" class="form-label">Nomor HP</label>
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="" class="form-label">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk"
                                            id="" value="L" checked>
                                        <label class="form-check-label" for="">
                                            Pria
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk"
                                            id="" value="P">
                                        <label class="form-check-label" for="">
                                            Wanita
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select class="form-select" name="role_id" required>
                                        @foreach ($role as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->keterangan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="prodi" class="form-label">Prodi</label>
                                    <select class="form-select" name="prodi_id" required>
                                        @foreach ($prodi as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->keterangan }}</option>
                                        @endforeach
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
            <h5 class="card-header">Data Admin</h5>
            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
                @if (Auth::guard('admin')->user()->role_id == 2)
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                        Tambah Data
                    </button>
                @endif

            </div>
            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                <div class="table-responsive text-nowrap">

                    <table class="table" id="tableAdmin">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>UUID</th>
                                <th>Nama</th>
                                <th>Prodi</th>
                                <th>Username</th>
                                <th>Jenis Kelamin</th>
                                <th>Role</th>
                                <th>No HP</th>
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
            $('#password').prop('readonly', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            });
            $.validator.addMethod("checkAlpha", function(value, element) {
                return (new RegExp("^[a-zA-Z ]*$").test(value))
            }, "Kolom harus diisi dengan huruf");
            $('#formTambahData').validate({
                // wrapper: "#form-input",
                rules: {
                    username: {
                        required: true,

                    },
                    nama: {
                        required: true,
                        checkAlpha: true,
                    },


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
                    // Add the `help-block` class to the error element

                    // if (element.prop("type") === "checkbox") {
                    //     error.insertAfter(element.parent("label"));
                    // } else {
                    //     error.insertAfter(element);
                    // }
                },
            });
            loadTable();
        })

        function loadTable() {
            var url = "{{ route('admin.data-admin.index') }}";
            $('#tableAdmin').DataTable({
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
                        data: 'prodi.keterangan',
                        name: 'prodi.keterangan'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },
                    {
                        data: 'jk',
                        name: 'jk'
                    },
                    {
                        data: 'role.keterangan',
                        name: 'role.keterangan'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        visible: {{ Auth::guard('admin')->user()->role_id == 2 ? 'true' : 'false' }}
                        // render: function(data, type, row) {
                        //   return '<button onclick="edit(' + row.id + ')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
                        //}
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
                    url: "{{ route('admin.data-admin.insert') }}",
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

        function edit(id) {
            var url = "{{ route('admin.data-admin.edit', ':id') }}"
            var updateUrl = "{{ route('admin.data-admin.update', ':id') }}"
            $.ajax({
                url: url.replace(':id', id),
                success: function(res) {
                    $("#prodi_id option:contains(" + res.data.prodi.keterangan + ")").attr('selected', true);
                    $('#username_update').val(res.data.username);
                    $('#nama_update').val(res.data.nama);
                    $('#no_hp_update').val(res.data.no_hp);
                    $('#updateForm').attr('action', updateUrl.replace(':id', id));
                    $('#editData').modal('show');
                },
                dataType: 'json',
            });

        }
        $('#editData').on('hidden.bs.modal', function() {
            $('#prodi_id option:selected').removeAttr('selected');
        })
        $('#passwordSwitch').change(function() {
            if ($(this).is(':checked')) {
                $('#password').prop('readonly', false);
            } else {
                $('#password').prop('readonly', true);
            }
        })
    </script>
@endsection
