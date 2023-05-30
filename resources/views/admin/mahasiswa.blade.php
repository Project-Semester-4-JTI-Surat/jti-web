@extends('layouts.master')
@section('title', 'Data Mahasiswa')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / </span>Mahasiswa </h4>
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
        <div class="card">
            <h5 class="card-header">Data Mahasiswa</h5>
            <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">
            </div>
            <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                <div class="table-responsive text-nowrap">

                    <table class="table" id="tableMhs">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>UUID</th>
                                <th>Nim</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Prodi</th>
                                <th>No HP</th>
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
            loadTarif();
        })

        function loadTarif() {
            var url = "{{ route('admin.mahasiswa.index') }}";
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
                        data: 'nim',
                        name: 'nim',
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
                        data: 'prodi.keterangan',
                        name: 'prodi.keterangan'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp'
                    },
                ],
            });
        }
    </script>
@endsection
