<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <li class="nav-item navbar-dropdown dropdown pr-2">
                <a class="nav-link nav-icon iconClass dropdown-toggle hide-arrow" id="notif-icon"
                    href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="bx bx-bell bx-sm"></i>
                    <span data-count="0" id="notification-count" class="badge bg-primary badge-number"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" id="notification-wrapper">


            </li>

        </ul>
        </li>
        <!-- User -->
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                    <img src="{{ Auth::guard('admin')->user()->jk == 'L' ? asset('img/avatars/man.png') : asset('img/avatars/woman.png') }}"
                        alt class="w-px-40 h-auto rounded-circle" />
                </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar avatar-online">
                                    <img src="{{ Auth::guard('admin')->user()->jk == 'L' ? asset('img/avatars/man.png') : asset('img/avatars/woman.png') }}"
                                        alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <span class="fw-semibold d-block">{{ Auth::guard('admin')->user()->nama }}</span>
                                @php
                                    $auth = Auth::guard('admin')->user();
                                    $admin_prodi = App\Models\AdminProdi::with(['prodi'])
                                        ->where('admin_id', '=', $auth->uuid)
                                        ->get();
                                    $count = count($admin_prodi);
                                    $index = 0;

                                @endphp
                                <small class="text-muted">{{ Auth::guard('admin')->user()->role->keterangan }} -
                                    @foreach ($admin_prodi as $item)
                                    @php
                                        $index++;
                                    @endphp
                                    {{ $item->prodi->keterangan }} {{$index != $count ? ', ' : ' ' }}
                                        
                                    @endforeach
                                    
                                </small>
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
                    <a class="dropdown-item" href="{{ route('admin.pengaturan_akun') }}">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Pengaturan Akun</span>
                    </a>
                </li>
                <li>
                    <div class="dropdown-divider"></div>
                </li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('auth.logout') }}">
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
