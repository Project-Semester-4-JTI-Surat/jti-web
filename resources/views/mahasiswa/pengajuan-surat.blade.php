<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/libs/sweet-alert/sweetalert2.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/pengajuan_surat.css') }}">
    <title>Pengajuan Surat</title>
    <style>
        .swal-modal .swal-text {
            text-align: center;
        }
    </style>
</head>

<body>

<main>
    <form id="multistepsform" method="POST" action="{{ route('mahasiswa.surat_insert') }}">
        <!-- progressbar -->
        <ul id="progressbar" class="">
            <li class="active">Data Kampus</li>
            <li>Data Instansi</li>
            <li>Data Anggota</li>

        </ul>
        @if($errors->any())
            <div class="error-wrapper">

                <div class="error-alert">
                    {{--                <svg style="color: rgb(252, 87, 88);" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
                    {{--                    <path d="M12 4a8 8 0 1 0 0 16 8 8 0 0 0 0-16zM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12z" fill="#0D0D0D"/>--}}
                    {{--                    <path d="M12 14a1 1 0 0 1-1-1V7a1 1 0 1 1 2 0v6a1 1 0 0 1-1 1zm-1.5 2.5a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0z" fill="#0D0D0D"/>--}}
                    {{--                </svg>--}}
                    <ul>
                        {!! implode('', $errors->all('<li clas="text-error">:message</li>')) !!}
                    </ul>
                </div>
            </div>
        @endif

        {{ csrf_field() }}
        <!-- fieldsets -->
        <fieldset class="hidden" id="kebutuhan_surat">
            <h2 class="fs-title">Kebutuhan Surat </h2>

            <h3 class="fs-subtitle">Jika memilih opsi internal, alur akan menuju admin jurusan. ketika sebaliknya, alur akan menuju admin prodi</h3>
            <div class="form-label">
                <label for="">Jenis Surat</label>
            </div>
            <input type="hidden" name="web" value="true">
{{--            <input type="hidden" name="metode_pengajuan" value="admin">--}}
            <input type="hidden" name="prodi_id" value="{{ Auth::guard('mahasiswa')->user()->prodi_id }}">
            <select name="kode_surat" placeholder="Jenis Surat" id="jenis_surat">
                <option value=""> --Jenis Surat--</option>
                @foreach ($jsurat as $key => $value)
                    <option value="{{ $value->kode }}"> {{ $value->keterangan }}</option>
                @endforeach
            </select>

            <div class="form-label">
                <label for="">Koordinator</label>
            </div>
            <select name="koordinator_id" placeholder="Koordinator" id="koordinator">
                <option value=""> --Pilih Koordinator--</option>
                @foreach ($koordinator as $key => $value)
                    <option value="{{ $value->uuid }}"> {{ $value->nama }}</option>
                @endforeach

            </select>

            <div class="form-label">
                <label for="dosen">Dosen</label>
            </div>
            <select name="dosen_id" id="dosen">
                <option value=""> --Pilih Dosen--</option>
                @foreach ($dosen as $key => $value)
                    <option value="{{ $value->uuid }}"> {{ $value->nama }}</option>
                @endforeach
            </select>

            <div class="form-label">
                <label for="Kebutuhan">Kebutuhan</label>
            </div>
            <select name="kebutuhan" id="Kebutuhan">
                <option value=""> --Pilih Kebutuhan--</option>
                <option value="Eksternal">Eksternal</option>
                <option value="Internal">Internal</option>
            </select>

            <div class="form-label">
                <label for="metode_pengajuan">Metode Pengajuan</label>
            </div>
            <select name="metode_pengajuan" id="metode_pengajuan">
                <option value=""> --Pilih Kebutuhan--</option>
                <option value="Anjungan">Anjungan</option>
                <option value="Admin">Admin</option>
            </select>

            <div class="form-label">
                <label for="judul_ta">Judul TA</label>
            </div>
            <input id="judul_ta" type="text" name="judul_ta" value="{{old('judul_ta')}}"
                   placeholder="Masukkan judul ta.. Jika memilih jenis surat TA(Tugas Akhir)"/>

            <div class="form-label">
                <label for="tanggal_pelaksanaan">Pilih Tanggal Pelaksanan</label>
            </div>
            <input type="date" name="tanggal_pelaksanaan" value="{{old('tanggal_pelaksanaan')}}" id="tanggal_pelaksanaan" placeholder="Tanggal"/>

            <div class="form-label">
                <label for="tanggal_selesai">Pilih Tanggal Selesai</label>
            </div>
            <input type="date" name="tanggal_selesai" value="{{old('tanggal_selesai')}}" id="tanggal_selesai" placeholder="Tanggal"/>
            <button type="button" name="next" class="next action-button">Next</button>
            {{--            <input type="button" name="next" class="next action-button" value="Next"/>--}}
        </fieldset>

        <fieldset id="data_instansi">
            <h2 class="fs-title">Data Instansi</h2>
            <h3 class="fs-subtitle">Mohon isi kolom dibawah ini dengan benar, Dimohon untuk mengisi alamat mitra secara lengkap</h3>
            <div class="form-label">
                <label for="">Nama Mitra</label>
            </div>
            <input type="text" value="{{old('nama_mitra')}}" name="nama_mitra" id="nama_mitra" placeholder="Kepada"/>
            <div class="form-label">
                <label for="">Alamat Mitra</label>
            </div>
            <textarea name="alamat_mitra" id="alamat_mitra" placeholder="Alamat">{{old('alamat_mitra')}}</textarea>

            <input type="button" name="previous" class="previous action-button" value="Previous"/>

            {{--            <input type="button" name="next" class="next action-button" value="Next"/>--}}
            <button type="button" name="next" class="next action-button">Next</button>
        </fieldset>
        <fieldset id="data_anggota">
            <h2 class="fs-title">Data Anggota</h2>
            <div style="padding:  0.5rem  0 1rem 0; display: flex; justify-content: center;">
                <div style=" float: left;clear: none;">
                    <input style=" float: left; clear: none; margin: 2px 0 0 2px;" type="radio" id="individu"
                           name="status_keanggotan" value="individu" id="individu">
                    <label for=""
                           style="float: left; clear: none; display: block; padding: 0px 1em 0px 8px;">Individu</label>
                </div>
                <div style=" float: left; clear: none;">
                    <input style=" float: left; clear: none; margin: 2px 0 0 2px;" type="radio" id="kelompok"
                           name="status_keanggotan" id="" value="kelompok">
                    <label for=""
                           style="float: left; clear: none; display: block; padding: 0px 1em 0px 8px;">Kelompok</label>
                </div>
            </div>
            <div id="kolom-dataAnggota">

            </div>


            <button type="button" name="previous" class="previous action-button">Previous</button>
            <button type="submit" class="action-button">Submit</button>
        </fieldset>
        {{-- <button type="submit" name="submit" class="submit action-button">Submit</button> --}}
    </form>
</main>
</body>
@if (Auth::guard('mahasiswa')->check())
    <script>
        var timeout = ({{config('session.lifetime')}} * 60000);
        setTimeout(function(){
            window.location.reload(1);
        },  timeout);



    </script>
@endif

<script src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('vendor/libs/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ asset('vendor/libs/jquery/validate/jquery.validate.js') }}"></script>
<script src="{{ asset('js/mahasiswa.js') }}"></script>
<script src="{{ asset('js/jquery.prefix-input.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
@if (Session::has('multiple'))
    <script>
        swal("Error", "Surat sebelumnya belum terselesaikan, Harap selesaikan surat sebelumnya terlebih dahulu", "error");
    </script>
@endif
<script>
    $(document).ready(function () {
        $('#koordinator').attr('disabled', true);
        $('#dosen').attr('disabled', true);
    });
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".next").click(function () {
        if (animating) return false;
        current_fs = $(this).parent();
        fieldID = current_fs[0]['id'];
        var $inputs = $('#'+fieldID+' :input:not(:hidden):not(:button):not(:disabled)');
        var error;
        // console.log($inputs);
        $inputs.each(function(index){
            // console.log($(this).val)
            console.log("attr "+$(this).attr('id')+"-> "+$(this).val());

            if ($(this).val() === ''){
                swal("Error", "Mohon isi field yang tersedia dengan data yang valid", "error");
                error = true;
            }else{
                error = false;
            }
        })
        console.log(error);
        if (!error){
            animating = true;
            next_fs = $(this).parent().next();
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
            next_fs.show();
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    scale = 1 - (1 - now) * 0.2;
                    left = now * 50 + "%";
                    opacity = 1 - now;
                    current_fs.css({
                        transform: "scale(" + scale + ")",
                        position: "absolute"
                    });
                    next_fs.css({
                        left: left,
                        opacity: opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                easing: "easeInOutBack"
            });
        }
    });

    $(".previous").click(function () {
        if (animating) return false;
        animating = true;

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();
        $("#progressbar li")
            .eq($("fieldset").index(current_fs))
            .removeClass("active");

        previous_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function (now, mx) {
                scale = 0.8 + (1 - now) * 0.2;
                left = (1 - now) * 50 + "%";
                opacity = 1 - now;
                current_fs.css({
                    left: left
                });
                previous_fs.css({
                    transform: "scale(" + scale + ")",
                    opacity: opacity
                });
            },
            duration: 800,
            complete: function () {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack"
        });
    });

    $(".submit").click(function () {
        return false;
    });

    $('#individu').click(function () {
        let individu = ` <div id="form-individu" style="display: none;">
                    <input type="text" name="nama_anggota[]" value="{{ Auth::guard('mahasiswa')->user()->nama }}"
                        readonly />
                    <input type="text" name="nim_anggota[]" value="{{ Auth::guard('mahasiswa')->user()->nim }}"
                        readonly />
                    <input type="text" name="nohp_anggota[]"
                        value="{{ Auth::guard('mahasiswa')->user()->no_hp }}" readonly />
                    <input type="text" name=""
                        value="{{ Auth::guard('mahasiswa')->user()->prodi->keterangan }}" readonly />
                    <input type="hidden" name="prodi_id_anggota[]"
                        value="{{ Auth::guard('mahasiswa')->user()->prodi->id }}"  />
                </div>`;
        $('#form-kelompok').css({
            display: 'none'
        });

        $('#form-kelompok').remove();
        $('#kolom-dataAnggota').append(individu);
        $('#form-individu').toggle(this.checked)
    });
    $('#kelompok').click(function () {
        let kelompok = `<div id="form-kelompok" style="display: none; overflow-x:auto;">
                    <button type="button" id="tambahAnggota" class="action-button">Tambah Anggota</button>
                    <div id="parent-list">
                        <div id="list"
                            style="border-style: solid; border-color: #e1e1e1; padding: 1rem 1rem 1rem 1rem; margin-bottom: 1.5rem;">
                             <input type="text" name="nama_anggota[]" value="{{ Auth::guard('mahasiswa')->user()->nama }}"
                        readonly />
                    <input type="text" name="nim_anggota[]" value="{{ Auth::guard('mahasiswa')->user()->nim }}"
                        readonly />
                    <input type="text" name="nohp_anggota[]"
                        value="{{ Auth::guard('mahasiswa')->user()->no_hp }}" readonly />
                    <input type="text" name=""
                        value="{{ Auth::guard('mahasiswa')->user()->prodi->keterangan }}" readonly />
                    <input type="hidden" name="prodi_id_anggota[]"
                        value="{{ Auth::guard('mahasiswa')->user()->prodi->id }}"  />
                        </div>
                    </div>
                </div>`;
        $('#form-individu').css({
            display: 'none'
        });
        $('#form-individu').remove();
        $('#kolom-dataAnggota').append(kelompok);
        $('#form-kelompok').toggle(this.checked);

        let template = `<div id="list" style="border-style: solid; border-color: #e1e1e1; padding: 1rem 1rem 1rem 1rem; margin-bottom: 1.5rem;">
          <input type="text" name="nama_anggota[]" placeholder="Nama Mahasiswa" />
          <input type="text" name="nim_anggota[]" placeholder="NIM Mahasiswa" />
          <input type="text" class="ibacor_fi" id="no_hp" onkeyup="setPrefix(this)" onblur="setPrefix(this)" data-prefix="+62" name="nohp_anggota[]" placeholder="No. HP Mahasiswa" />
             <select name="prodi_id_anggota[]"  id="prodi_id_anggota">
                                <option value=""> --Pilih Prodi--</option>
                                @foreach ($prodi as $key => $value)
        <option value="{{ $value->id }}"> {{ $value->keterangan }}</option>
                                @endforeach
        </select>
<button type="button" id="hapusField" class="action-button">x</button>
</div>`;

        $("#tambahAnggota").on("click", () => {
            $("#parent-list").append(template);
        })
        $("body").on("click", "#hapusField", (e) => {
            $(e.target).parent("div").remove();
        })
    });

    $('#jenis_surat').on('change', function () {
        if (this.value == "MK") {
            $('#koordinator').attr('disabled', true);
            $('#dosen').attr('disabled', false);
        } else {
            $('#koordinator').attr('disabled', false);
            $('#dosen').attr('disabled', true);
        }
        if (this.value == "TA" || this.value == "OBS") {
            $('#judul_ta').attr('disabled', false)
        } else {
            $('#judul_ta').attr('disabled', true)

        }
    })

    function redirect()
    {
        window.location="{{route('mahasiswa.dashboard')}}";
    }
    // $('#multistepsform').submit(function (e) {
    //     var nama_mitra = $('#nama_mitra').val();
    //     var alamat_mitra = $('#alamat_mitra').val();
    //     var keterangan = $('#keterangan').val();
    //     var tanggal_selesai = $('#tanggal_selesai').val();
    //     var tanggal_pelaksanaan = $('#tanggal_pelaksanaan').val();
    //     if (nama_mitra == '' || alamat_mitra == '' || keterangan == '' || tanggal_pelaksanaan == '' ||
    //         tanggal_selesai == '') {
    //         e.preventDefault();
    //         swal("Error", "Oops ada data yang anda lewatkan..", "error");
    //         console.log(tanggal_selesai + " => ");
    //
    //     }
    //
    //     // alert("Anda akan di arahkan kembali ke dashboard");
    //     // redirect()
    //     // setTimeout('Redirect()', 2000);
    // })

    function setPrefix(data) {
        var prefix = '+62';
        if (data.value.substring(0, prefix.length) != prefix) {
            data.value = prefix;
        }
    }

    $('[data-form="no_hp"]').keyup(function () {
        var prefix = '+62';
        if (this.value.substring(0, prefix.length) != prefix) {
            this.value = prefix;
        }
    });
    $('[data-form="no_hp"]').blur(function () {
        var prefix = '+62';
        if (this.value.substring(0, prefix.length) != prefix) {
            this.value = prefix;
        }
        //this.value = prefix;
        //if(!(this.value.match('^+62'))) this.value = prefix;
    })
    $('#tanggal_pelaksanaan').change(function (){
        const val = $(this).val();
        console.log(val);
        $('#tanggal_selesai').attr({'min':val});
    })
</script>

</html>
