<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
      data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>JTISurat - Dashboard Mahasiswa</title>

    <meta name="description" content="" />

    @include('layouts.css')
    <style>
        .btn-create {
            width: 90%;
            text-align: center;
            border: 2px solid #24b4fb;
            background-color: #24b4fb;
            border-radius: 0.9em;
            padding: 0.8em 1.2em 0.8em 1em;
            -webkit-transition: all ease-in-out 0.2s;
            transition: all ease-in-out 0.2s;
            font-size: 16px;
        }

        .btn-create span {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            color: #fff;
            font-weight: 600;
        }

        button:hover {
            background-color: #0071e2;
        }
    </style>
</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item">
                   <div class="text-center mb-2" style="width: 100%">
                       <button onclick="window.location.href='{{route('mahasiswa.pengajuan_surat')}}'" class="btn-create">
                      <span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
                          Ajukan Surat
                      </span>
                       </button>
                   </div>
                </li><!-- Dashboard -->
                @php
                    $status = \App\Models\Status::all();
                @endphp
                    @foreach ($status as $key => $value)
                        <li class="menu-item {{ Request::get('status') == $value->id ? 'active' : '' }}" >
                            <a href="{{ route('mahasiswa.dashboard', ['status' => $value->id]) }}" class="menu-link">
                                <div>{{ $value->keterangan }}</div>
                            </a>
                        </li>
                    @endforeach

            </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                 id="layout-navbar">
                <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                        <i class="bx bx-menu bx-sm"></i>
                    </a>
                </div>

                <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                    <ul class="navbar-nav flex-row align-items-center ms-auto">
                        <li class="nav-item navbar-dropdown dropdown pr-2">
{{--                            <a class="nav-link nav-icon iconClass dropdown-toggle hide-arrow" id="notif-icon" href="javascript:void(0);"--}}
{{--                               data-bs-toggle="dropdown">--}}
{{--                                <i class="bx bx-bell bx-sm"></i>--}}
{{--                                <span data-count="0" id="notification-count" class="badge bg-primary badge-number"></span>--}}
{{--                            </a>--}}
                            <ul class="dropdown-menu dropdown-menu-end" id="notification-wrapper">

                        </li>

                    </ul>
                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                                <img src="{{Avatar::create(Auth::guard('mahasiswa')->user()->nama)->toBase64()}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                                <img src="{{Avatar::create(Auth::guard('mahasiswa')->user()->nama)->toBase64()}}" alt class="w-px-40 h-auto rounded-circle" />
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">{{ Auth::guard('mahasiswa')->user()->nama }}</span>
                                            <small class="text-muted">{{ Auth::guard('mahasiswa')->user()->nim }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            {{-- <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                            </li> --}}
                            <li>
                                <a class="dropdown-item" href="{{ route('mahasiswa.profile') }}">
                                    <i class="bx bx-cog me-2"></i>
                                    <span class="align-middle">Pengaturan Akun</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('mahasiswa.logout') }}">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--/ User -->
                    </ul>
                </div>
            </nav>


            <!-- Content wrapper -->
            <div class="content-wrapper">

                <div class="container-xxl flex-grow-1 container-p-y">

                    <div class="card">
                        <h5 class="card-header">Data Surat</h5>
                        <div class="col-md-5" style="padding-left: 2rem; padding-bottom: 2rem">

                        </div>
                        <div style="padding-left: 2rem; padding-right: 2rem; padding-bottom: 2rem">
                            <div class="table-responsive text-nowrap">

                                <table class="table" id="surat">
                                    <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>uuid</th>
                                        <th>Kode Surat</th>
                                        <th>Status</th>
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
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
</div>
<!-- / Layout wrapper -->

@include('layouts.script')
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
        var url = "{{ route('mahasiswa.dashboard', ['status' => Request::get('status')]) }}";
        $('#surat').DataTable({
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
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                        // render: function(data, type, row) {
                        //   return '<button onclick="edit(' + row.id + ')" class="btn btn-icon me-2 btn-primary"><span class="tf-icons bx bx-pencil"></span></button>';
                        //}
                },
            ],
        });
    }
</script>
</body>

</html>
