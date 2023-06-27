<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/style.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/logo.svg') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/libs/filepond/filepond.min.css') }}" />
    <title>{{ env('APP_NAME') }} - Detail Surat</title>
</head>

<body class="" id="main">
    <main class="px-20 mt-14">
        <h1 class="text-center font-bold text-2xl pb-10">Surat {{ $surat->jenis_surat->keterangan }}</h1>
        <div
            class="pl-6 h-full w-full flex flex-col flex-shrink-1 bg-white  rounded-lg  border-2 mb-6">

            <form class="px-5 py-5">
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Dosen</label>
                    <input type="email" value="{{ $surat->dosen->nama }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Koordinator</label>
                    <input type="text" value="{{ $surat->koordinator->nama }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Judul TA</label>
                    <input type="text" value="{{ $surat->judul_ta }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Dibuat</label>
                    <input type="text" value="{{ $surat->tanggal_dibuat }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal
                        Pelaksanaan</label>
                    <input type="text" value="{{ $surat->tanggal_pelaksanaan }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Tanggal Selesai</label>
                    <input type="text" value="{{ $surat->tanggal_selesai }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Nama Mitra</label>
                    <input type="text" value="{{ $surat->nama_mitra }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Alamat Mitra</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $surat->alamat_mitra }}</textarea>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Kebutuhan</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $surat->kebutuhan }}</textarea>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Keterangan</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $surat->keterangan }}</textarea>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 ">Status</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $surat->status->keterangan }} {{ $surat->status->keterangan == 'Ditolak' ? '- '.$surat->alasan_penolakan : '' }}
                        </textarea>
                </div>
                @if ($surat->filescan != 'null')
                    <div class="mb-6">
                        <label for="confirm_password"
                            class="block mb-2 text-sm font-medium text-gray-900 ">File Scan</label>

                        <a href="{{env('APP_URL') .'/storage/'.$surat->softfile_scan}}"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">Download Scan
                            <span class="bx bx-chevron-right"></span>
                        </a>
                    </div>
                @endif
{{--                @if($surat->metode_pengajuan == 'Anjungan')--}}
{{--                    <div class="mb-6">--}}
{{--                        <label for="confirm_password"--}}
{{--                               class="block mb-2 text-sm font-medium text-gray-900 ">Upload File</label>--}}
{{--                        <input name="softfile" id="softfile" type="file">--}}
{{--                    </div>--}}
{{--                @endif--}}
                <h1 class=" py-2 text-xl font-bold">Daftar Anggota</h1>
                @php
                    $anggota = App\Models\Anggota::where('surat_id', '=', $surat->uuid)->get();
                @endphp
                <div>
                    @foreach ($anggota as $key => $value)
                        <h1 class=" py-2 text-lg font-bold">Anggota {{ $key + 1 }}</h1>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">NIM
                                    Anggota</label>
                                <input type="tel" value="{{ $value->nim }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                            </div>
                            <div>
                                <label for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                                    Anggota</label>
                                <input type="text" value="{{ $value->nama }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                            </div>
                            <div>
                                <label for="last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">Prodi
                                    Anggota</label>
                                <input type="text" value="{{ $value->prodi->keterangan }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Doe" required>
                            </div>
                            <div>
                                <label for="company"
                                    class="block mb-2 text-sm font-medium text-gray-900 ">No HP
                                    Anggota</label>
                                <input type="text" value="{{ $value->no_hp }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400  dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Flowbite" required>
                            </div>


                        </div>
                    @endforeach





                </div>
            </form>

        </div>
    </main>
    <footer class="">
        <div class="">
            <p class="text-center "> &copy; JTI-Surat, 2023 </p>
            <!-- <div class="max-w-2xl mx-auto text-white py-10">
            <div class="mt-28 flex flex-col md:flex-row md:justify-between items-center text-sm text-gray-400">
            </div>
        </div> -->
        </div>
    </footer>

</body>

</html>
<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/jquery/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond.jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond-plugin-file-validate-type.js') }}"></script>
<script src="{{ asset('vendor/libs/filepond/filepond-plugin-pdf-preview.min.js') }}"></script>
<script src="{{ asset('js/mahasiswa.js') }}"></script>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
        FilePond.registerPlugin(
            FilePondPluginFileValidateType,
            FilePondPluginPdfPreview
        );
        $('#softfile').filepond({
            allowPdfPreview: true,
            pdfPreviewHeight: 320,
            pdfComponentExtraParams: 'toolbar=0&view=fit&page=1',
            acceptedFileTypes: ['application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword'],
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
    })
    var toogle = $('#toogle');
    toogle.click(function(e) {
        var hide = $("#navbar-default").toggleClass("hidden");
        // console.log(hide);
    })

    function dropdown() {
        $('#dropdown').toggleClass('hidden');
        $('#icon').toggleClass('rotate-180');
    }
    document.addEventListener("click", (e) => {
        // Check if the filter list parent element exist
        //const isClosest = e.target.closest(document.getElementById('dropdown'));

        // If `isClosest` equals falsy & popup has the class `show`
        // then hide the popup
        //if (!isClosest && popupEl.classList.contains("hidden")) {
        // $('#dropdown').toggleClass('hidden');
        //  $('#icon').toggleClass('rotate-180');
        //}
    });
    // document.addEventListener('click', printMousePos, true);
    // function printMousePos(e) {

    //     let cursorX = e.pageX;
    //     let cursorY = e.pageY;
    //     console.log(cursorX, cursorY);
    //     //   if (cursorX >= 300 && cursorX <= 500) {
    //     //     $('#dropdown').toggleClass('hidden');
    //     //     $('#icon').toggleClass('rotate-180');
    //     //   }
    //     //   $( "#test" ).text( "pageX: " + cursorX +",pageY: " + cursorY );
    // }
</script>
