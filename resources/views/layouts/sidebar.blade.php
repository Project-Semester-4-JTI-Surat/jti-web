<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img width="110" heigth="20" src="{{ asset('img/logo.svg') }}">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">JTISurat</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}"
            href="{{ route('admin.dashboard') }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Surat</span>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.surat.index' ? 'active' : '' }}">
            @php
                $status = \App\Models\Status::all();
            @endphp
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Status Surat</div>
            </a>
            <ul class="menu-sub">
                @foreach ($status as $key => $value)
                    <li class="menu-item {{ Request::get('status') == $value->id ? 'active' : '' }}">
                        <a href="{{ route('admin.surat.index', ['status' => $value->id]) }}" class="menu-link">
                            <div>{{ $value->keterangan }}</div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
         <li class="menu-item {{ Route::currentRouteName() == 'admin.rekap.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.rekap.index') }}">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Support">Rekap Surat</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.prodi.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.prodi.index') }}">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Support">Data Prodi</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.jenis_surat.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.jenis_surat.index') }}">
                <i class="menu-icon tf-icons bx bx-envelope"></i>
                <div data-i18n="Support">Jenis Surat</div>
            </a>
        </li>
        <!-- Data Master -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Data Master</span></li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.mahasiswa.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.mahasiswa.index') }}">
                <i class="menu-icon tf-icons bx bxs-graduation"></i>
                <div data-i18n="Support">Data Mahasiswa</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.dosen.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.dosen.index') }}">
                <i class="menu-icon tf-icons bx bxs-institution"></i>
                <div data-i18n="Support">Data Dosen</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.koordinator.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.koordinator.index') }}">
                <i class="menu-icon tf-icons bx bxs-business"></i>
                <div data-i18n="Support">Data Koordinator</div>
            </a>
        </li>
        <li class="menu-item {{ Route::currentRouteName() == 'admin.data-admin.index' ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('admin.data-admin.index') }}">
                <i class="menu-icon tf-icons bx bxs-user-check"></i>
                <div data-i18n="Support">Data Admin</div>
            </a>
        </li>
    </ul>
</aside>
<!-- / Menu -->
