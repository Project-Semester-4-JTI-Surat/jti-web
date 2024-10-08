@extends('layouts.master')
@section('title', 'Data Dosen')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Dosen </h4>
        <!-- Content -->
        <!-- Large Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel3">Tambah Dosen</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="formTambahData">
                            @csrf
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nip" class="form-label">NIP</label>
                                    <input type="text" id="nip" name="nip" class="form-control"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" id="no_hp" name="no_hp" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mb-3">
                                    <label for="price" class="form-label">Prodi</label>
                                    <select class="form-select" name="prodi_id">
                                        @foreach ($prodi as $item)
                                            <option value="{{$item->id}}">{{$item->keterangan}}</option>
                                        @endforeach
                                    </select>
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
        </div>
        <div class="card">
            <h5 class="card-header">Data Dosen</h5>
            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
            @if(Auth::guard('admin')->user()->role_id == 1)
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                </button>
             @endif
                {{-- <button class="btn btn-primary" {{ Auth::guard('admin')->user()->role_id != 2 ? 'disabled' : '' }}
                    data-bs-toggle="modal" data-bs-target="#tambahData">
                    Tambah Data
                </button> --}}
            </div>
            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                <div class="table-responsive text-nowrap">

                    <table class="table" id="tableMhs">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>UUID</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Prodi</th>
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
            $.validator.addMethod("checkAlpha", function(value, element) {
                return (new RegExp("^[a-zA-Z ]*$").test(value))

            }, "Kolom harus diisi dengan huruf");
            $.validator.addMethod("checkAlphaSym", function(value, element) {
                return (new RegExp("^[a-zA-Z .,]*$").test(value))
            }, "Kolom harus diisi dengan huruf");
            $('#formTambahData').validate({
                // wrapper: "#form-input",
                rules: {
                    // email: {
                    //     required: true,
                    //     email: true,
                    // },
                    nama: {
                        required: true,
                        checkAlphaSym: true,
                    },
                    nip: {
                        required: true,
                        number: true,
                        maxlength: 20,
                    },
                    no_hp:{
                        required: true
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
                    // Add the `help-block` class to the error element

                    // if (element.prop("type") === "checkbox") {
                    //     error.insertAfter(element.parent("label"));
                    // } else {
                    //     error.insertAfter(element);
                    // }
                },
                success: function(label, element) {
                    $(element).removeClass('is-invalid');
                }
            });
            loadTable();
        })

        function loadTable() {
            var url = "{{ route('admin.dosen.index') }}";
            $('#tableMhs').DataTable({
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
                        data: 'nip',
                        name: 'nip',
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp',
                    },
                    {
                        data: 'prodi.keterangan',
                        name: 'prodi.keterangan'
                    },
                ],
            });
        }
        $('#formTambahData').submit(function(e) {
            var form = $('#formTambahData');
            // form.resetForm();
            if (form.valid()) {
                console.log(form.valid());
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('admin.dosen.insert') }}",
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
    </script>
@endsection
