@extends('layouts.master')
@section('title', 'Detail Surat')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard / Surat /</span> Detail</h4>
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Detail Surat</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="dosen_id">Dosen</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dosen_id" readonly
                                        value="{{ $surat->dosen->nama }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="koordinator_id">koordinator</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="koordinator_id" readonly
                                        value="{{ $surat->koordinator->nama }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_mitra">Nama Mitra</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama_mitra" readonly
                                        value="{{ $surat->nama_mitra }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="nama_mitra">Alamat Mitra</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat_mitra" readonly
                                        value="{{ $surat->alamat_mitra }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal_dibuat">Tanggal Dibuat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_dibuat" readonly
                                        value="{{ $surat->tanggal_dibuat }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal_pelaksanaan">Tanggal pelaksanaan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_pelaksanaan" readonly
                                        value="{{ $surat->tanggal_pelaksanaan }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="tanggal_selesai">Tanggal selesai</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="tanggal_selesai" readonly
                                        value="{{ $surat->tanggal_selesai }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="kebutuhan">Kebutuhan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kebutuhan" readonly
                                        value="{{ $surat->kebutuhan }}">
                                </div>
                            </div>

                            {{-- <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" id="basic-default-email" class="form-control"
                                        placeholder="john.doe" aria-label="john.doe"
                                        aria-describedby="basic-default-email2">
                                    <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                </div>
                                <div class="form-text">You can use letters, numbers &amp; periods</div>
                            </div>
                        </div> --}}
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                                <div class="col-sm-10">
                                    <textarea id="basic-default-message" class="form-control" readonly aria-describedby="basic-icon-default-message2">{{ $surat->keterangan }}</textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Daftar Anggota -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Daftar Anggota</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            @foreach ($anggota as $key => $value)
                                @php
                                    $count = 0;
                                @endphp
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Nama Anggota
                                        {{ $key+1 }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" readonly
                                            value="{{ $value->nama }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Nim Anggota
                                        {{ $key+1 }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" readonly
                                            value="{{ $value->nim }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Prodi
                                        {{ $key+1 }}</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prodi_id" readonly
                                            value="{{ $value->prodi->keterangan }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">No.Hp Anggota
                                        {{ $key+1 }}</label>
                                   <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_hp" readonly
                                            value="{{ $value->no_hp }}">
                                    </div>
                                </div>
                                <hr class="hr" />
                            @endforeach

                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!--/ Card layout -->
    </div>
@endsection
