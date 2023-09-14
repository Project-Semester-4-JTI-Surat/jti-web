@extends('layouts.master')
@section('title', 'Data Dosen')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Pengaturan Akun</h5>
                <!-- Account -->
                <hr class="my-0" />
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Ketika anda mengubah data anda, anda harus mengulangi
                                proses login</h6>
                        </div>
                    </div>
                    <form id="formAccountSettings" method="POST" action="{{ route('admin.updateAkun') }}">
                    {{ csrf_field() }}
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" value="{{ Auth::guard('admin')->user()->username }}" />
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="password">Password</label>
                                <input type="text" id="password" name="password" placeholder="************"
                                    class="form-control" readonly />
                            </div>
                            <div class="mb-3 col-md-12">
                                <div class="form-check form-switch mb-2">
                                    <input class="form-check-input" type="checkbox" id="passwordSwitch">
                                    <label class="form-check-label" for="passwordSwitch">Edit Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
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
        })
    </script>
     <script>
        $('#passwordSwitch').change(function() {
        if ($(this).is(':checked')) {
            
            $('#password').prop('readonly', false);
        } else {
            
            $('#password').prop('readonly', true);
        }

    })
    </script>
@endsection
