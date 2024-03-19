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
                            @if ($surat->mata_kuliah)
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="mata_kuliah">Mata Kuliah</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="mata_kuliah" readonly
                                            value="{{ $surat->mata_kuliah }}">
                                    </div>
                                </div>
                            @endif
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
                                <label class="col-sm-2 col-form-label" for="tanggal_pelaksanaan">Tanggal
                                    pelaksanaan</label>
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
                                <label class="col-sm-2 col-form-label" for="keterangan">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea id="keterangan" class="form-control" readonly aria-describedby="basic-icon-default-message2">{{ $surat->keterangan }}</textarea>
                                </div>
                            </div>
                            @if ($surat->status_id == 1)
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('admin.surat.proses_surat', ['id' => $surat->uuid]) }}"
                                            class="btn btn-primary">Proses Surat</a>
                                    </div>
                                </div>
                            @endif

                            @if ($surat->status_id == 3)
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('admin.surat.dapat_diambil', ['id' => $surat->uuid]) }}"
                                            class="btn btn-primary">Dapat diambil </a>
                                        <div class="form-text">Dengan menekan tombol diatas. maka status surat menjadi
                                            dapat diambil
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($surat->status_id == 2)
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <a href="{{ route('admin.surat.surat_selesai', ['id' => $surat->uuid]) }}"
                                            class="btn btn-success">Selesai </a>
                                        <div class="form-text">Dengan menekan tombol diatas. maka status surat menjadi
                                            selesai
                                        </div>
                                    </div>
                                </div>
                            @endif
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
                                    @if ($value->ketua == 'true')
                                        <div class="alert alert-primary" role="alert">Ketua Kelompok</div>
                                    @endif
                                    <label class="col-sm-2 col-form-label" for="">Nama Anggota
                                        {{ $key ==1 ? $key+1 : " " }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" readonly
                                            value="{{ $value->nama }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Nim Anggota
                                      {{ $key ==1 ? $key+1 : " " }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nim" readonly
                                            value="{{ $value->nim }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">Prodi
                                      {{ $key ==1 ? $key+1 : " " }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="prodi_id" readonly
                                            value="{{ $value->prodi->keterangan }}">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="">No.Hp Anggota
                                      {{ $key ==1 ? $key+1 : " " }}</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="no_hp" readonly
                                            value="{{ $value->no_hp }}">
                                    </div>
                                </div>
                                <hr class="hr" />
                            @endforeach


                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if ($surat->status_id == 2)
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Preview Dokumen</h5>
                </div>
                <div class="card-body">
                    <div id="editor">
                        {!! $preview_surat !!}
                    </div>
                </div>
            </div>
            {{--    </div> --}}
        @endif
        @if ($surat->status_id != 4)

            @if ($surat->status_id != 1)
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Upload softfile</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('admin.surat.softfile_save', ['id' => $surat->uuid]) }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="softfile">File <span
                                        class='text-danger'>*</span></label>
                                <div class="col-sm-10">
                                    {{ csrf_field() }}
                                    <input name="softfile" id="softfile" type="file">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    {{-- <div class="form-text">Dengan menekan tombol diatas, surat akan masuk ke bagian surat
                                        ditolak
                                    </div> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif

            @if ($surat->status_id == 1)
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Tolak Pengajuan</h5>
                    </div>
                    <div class="card-body">
                        <form id="tolakSurat" method="post"
                            action="{{ route('admin.surat.tolak_surat', ['id' => $surat->uuid]) }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="keterangan">Keterangan <span
                                        class='text-danger'>*</span></label>
                                <div class="col-sm-10">
                                    {{ csrf_field() }}
                                    <textarea id="alasan_penolakan" required class="form-control" name="alasan_penolakan"></textarea>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-danger">
                                        Tolak Surat
                                    </button>
                                    <div class="form-text">Dengan menekan tombol diatas, surat akan masuk ke bagian
                                        surat
                                        ditolak
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div>
    @endif

    @endif
@endsection
@section('script')
    <script src="{{ asset('vendor/libs/tinymce/tinymce.min.js') }}"></script>
    <script>
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val(),
                },
                // headers: {
                //     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                // },
            });
            FilePond.registerPlugin(
                FilePondPluginFileValidateType,
                FilePondPluginPdfPreview
            );
            $('#softfile').filepond({
                allowPdfPreview: true,
                pdfPreviewHeight: 320,
                pdfComponentExtraParams: 'toolbar=0&view=fit&page=1',
                acceptedFileTypes: ['application/pdf',
                    'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    'application/msword'
                ],
                credits: false,
                fileValidateTypeDetectType: [],
                fileValidateTypeLabelExpectedTypes: 'File harus berekstensi .pdf/.doc atau .docx',
                labelFileProcessingComplete: `Upload Berhasil`,
                labelTapToUndo: `ketuk untuk membatalkan`,
                labelTapToCancel: `ketuk untuk membatalkan`,
                labelFileProcessingError: `Gagal Memproses`,
                labelTapToRetry: `ketuk untuk coba lagi`,
                labelFileProcessing: `Sedang memproses`,
                labelIdle: `Seret dan tempel atau <span class="filepond--label-action">Pilih dokumen</span>`,
                labelInvalidField: 'File tidak didukung',
                server: {
                    url: "{{ env('APP_URL') }}",
                    process: "/temp/file/upload",
                    revert: {
                        url: "/temp/file/delete/",
                        method: 'GET',
                    },
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    }
                }
            }, );
            var url = "{{ route('editorSave', ':id') }}";
            tinymce.init({
                selector: 'div#editor',
                height: 500,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'help', 'wordcount', 'save'
                ],
                toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help' +
                    'save',
                // content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                content_css: '{{ asset('css/surat/style.css') }}',
                // plugin_preview_height : "1056",
                plugin_preview_width: "50%", //This do the trick
                {{-- setup: (editor) => { --}}
                {{--    editor.on('change', (e) => { --}}
                {{--        $.ajax({ --}}
                {{--            type: 'POST', --}}
                {{--            url: url.replace(':id','{{$surat->uuid}}'), --}}

                {{--            data: { --}}
                {{--                editor: tinymce.get('editor').getContent() --}}
                {{--            }, --}}
                {{--            success: function(data){ --}}
                {{--                $('#editor').val(''); --}}
                {{--                console.log(data) --}}
                {{--            } --}}
                {{--        }) --}}
                {{--    }) --}}
                {{-- }, --}}
            });


        })

        function tolakSurat(id) {
            if ($('#alasan_penolakan').val() == '') {
                console.log($('#alasan_penolakan').val());
                $('#alasan_penolakan').addClass('is-invalid')
                $('#alasan_penolakan').after(
                    '<span id="nama-error" class="error invalid-feedback">Kolom harus diisi</span>')
            } else {
                swal({
                    title: "Anda yakin?",
                    text: "Anda yakin untuk menolak pengajuan surat? (Proses ini tidak bisa dibatalkan)",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    // console.log(willDelete);
                    if (willDelete) {

                    }
                })
            }
        }

        $('#tolakSurat').submit(function(e) {
            var form = this;
            e.preventDefault();
            if ($('#alasan_penolakan').val() == '') {
                console.log($('#alasan_penolakan').val());
                $('#alasan_penolakan').addClass('is-invalid')
                $('#alasan_penolakan').after(
                    '<span id="nama-error" class="error invalid-feedback">Kolom harus diisi</span>')
            } else {
                swal({
                    title: "Anda yakin?",
                    text: "Anda yakin untuk menolak pengajuan surat? (Proses ini tidak bisa dibatalkan)",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true
                }).then((willDelete) => {
                    // console.log(willDelete);
                    if (willDelete) {
                        form.submit();
                    }
                })
            }
        })
    </script>
@endsection
