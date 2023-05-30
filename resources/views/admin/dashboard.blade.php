@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            @if (Auth::guard('admin')->user()->change_password == 'false')
                <div class="alert alert-warning alert-dismissible" role="alert">
                    {{-- {{ Auth::guard('admin')->user()->admin_prodi-> }} --}}
                    Sepertinya anda belum mengubah password bawaan anda, Pastikan anda mengubah password anda di bagian
                    pengaturan akun
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="col-lg-8 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang {{ Auth::guard('admin')->user()->nama }}</h5>
                                <p class="mb-4">
                                    Ada beberapa surat yang belum di cek.. cek sekarang..
                                </p>

                                <a href="{{ route('admin.surat.index',['status'=>2]) }}" class="btn btn-sm btn-outline-primary">Cek Surat</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card text-white bg-success">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Surat Selesai</span>
                                <h3 class="card-title text-white mb-2">{{ App\Models\Surat::where('status_id','=','1')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class="card text-white bg-danger">
                            <div class="card-body">
                                <span class="fw-semibold d-block mb-1">Surat Ditolak</span>
                                <h3 class="card-title text-white mb-2">{{ App\Models\Surat::where('status_id','=','5')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="card-header m-0 me-2 pb-3">Statistika</h5>
                            <div class=" text-nowrap">

                            <table class="table" id="tableAdmin">
                                <thead>
                                    <tr>
                                        <th>Prodi</th>
                                        <th>Jumlah Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statistik_pengajuan as $key => $value)
                                        <tr>
                                        <td>{{ $value->keterangan }}</td>
                                        <td>{{ $value->count_prodi }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
            <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                <div class="row">
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block mb-1">Surat Menunggu</span>
                                <h3 class="card-title text-nowrap mb-2">{{ App\Models\Surat::where('status_id','=','2')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <span class="d-block mb-1">Surat Diproses</span>
                                <h3 class="card-title text-nowrap mb-2">{{ App\Models\Surat::where('status_id','=','3')->count() }}</h3>
                            </div>
                        </div>
                    </div>
                    <!-- </div>
                    <div class="row"> -->
                    <div class="col-12 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                    <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                        <div class="card-title">
                                            <h5 class="text-nowrap mb-2">Surat Dapat Diambil</h5>
                                        </div>
                                        <div class="mt-sm-auto">
                                            <h3 class="mb-0">{{ App\Models\Surat::where('status_id','=','4')->count() }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-lg-12">
            <div class="card">
                <div class="d-flex align-items-end row">

                    <div class="card-body">
                        <div style="padding-left: 1rem;">
                            <h5 class="card-title text-primary">Statistika</h5>
                        </div>
                        <div class="table-responsive text-nowrap">

                            <table class="table" id="tableAdmin">
                                <thead>
                                    <tr>
                                        <th>Prodi</th>
                                        <th>Jumlah Pengajuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($statistik_pengajuan as $key => $value)
                                        <tr>
                                        <td>{{ $value->keterangan }}</td>
                                        <td>{{ $value->count_prodi }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div> --}}
    </div>
@endsection

@php
    use App\Models\Prodi;
    
    $ambilProdi = $prodi = Prodi::where('id', '!=', '2')->get();
@endphp
