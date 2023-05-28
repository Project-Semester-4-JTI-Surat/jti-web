<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('vendor/libs/select2/select2.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/mahasiswa/pengajuan_surat.css')); ?>">
    <title>Pengajuan Surat</title>
</head>

<body>
    <main>
        <form id="multistepsform" method="POST" action="<?php echo e(route('mahasiswa.surat_insert')); ?>">
            <!-- progressbar -->
            <ul id="progressbar" class="">
                <li class="active">Data Kampus</li>
                <li>Data Instansi</li>
                <li>Data Anggota</li>

            </ul>
            <?php echo e(csrf_field()); ?>

            <!-- fieldsets -->
            <fieldset class="hidden">
                <h2 class="fs-title">Kebutuhan Surat </h2>
                <h3 class="fs-subtitle"></h3>
                <div class="form-label">
                    <label for="">Jenis Surat</label>
                </div>
                <input type="hidden" name="web" value="true">
                <input type="hidden" name="prodi_id" value="<?php echo e(Auth::guard('mahasiswa')->user()->prodi_id); ?>">
                <select name="kode_surat" placeholder="Jenis Surat" id="jenis_surat">
                    <option value=""> --Jenis Surat--</option>
                    <?php $__currentLoopData = $jsurat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->kode); ?>"> <?php echo e($value->keterangan); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <div class="form-label">
                    <label for="">Koordinator</label>
                </div>
                <select name="koordinator_id" placeholder="Koordinator" id="koordinator">
                    <option value=""> --Pilih Koordinator--</option>
                    <?php $__currentLoopData = $koordinator; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->uuid); ?>"> <?php echo e($value->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </select>

                <div class="form-label">
                    <label for="">Dosen</label>
                </div>
                <select name="dosen_id" placeholder="Dosen" id="dosen">
                    <option value=""> --Pilih Dosen--</option>
                    <?php $__currentLoopData = $dosen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($value->uuid); ?>"> <?php echo e($value->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <div class="form-label">
                    <label for="">Kebutuhan</label>
                </div>
                <select name="kebutuhan" placeholder="Kebutuhan" id="Kebutuhan">
                    <option value=""> --Pilih Kebutuhan--</option>
                    <option value="Eksternal">Eksternal</option>
                    <option value="Internal">Internal</option>

                </select>

                <div class="form-label">
                    <label for="judul_ta">Judul TA</label>
                </div>
                <input id="judul_ta" type="text" name="judul_ta"
                    placeholder="Masukkan judul ta.. Jika memilih jenis surat TA(Tugas Akhir)" />

                <div class="form-label">
                    <label for="">Pilih Tanggal Pelaksanan</label>
                </div>
                <input type="date" name="tanggal_pelaksanaan" placeholder="Tanggal" />
                <div class="form-label">
                    <label for="">Pilih Tanggal Selesai</label>
                </div>
                <input type="date" name="tanggal_selesai" placeholder="Tanggal" />
                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>

            <fieldset>
                <h2 class="fs-title">Data Instansi</h2>
                <h3 class="fs-subtitle">Mohon isi kolom dibawah ini dengan benar</h3>
                <div class="form-label">
                    <label for="">Nama Mitra</label>
                </div>
                <input type="text" name="nama_mitra" placeholder="Kepada" required />
                <div class="form-label">
                    <label for="">Alamat Mitra</label>
                </div>
                <textarea name="alamat_mitra" placeholder="Alamat"></textarea>
                <div class="form-label">
                    <label for="">Keterangan</label>
                </div>
                <textarea name="keterangan" placeholder="Keterangan"></textarea>
                <input type="button" name="previous" class="previous action-button" value="Previous" />

                <input type="button" name="next" class="next action-button" value="Next" />
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Data Anggota</h2>
                <div style="padding:  0.5rem  0 1rem 0; display: flex; justify-content: center;">
                    <div style=" float: left;clear: none;">
                        <input style=" float: left; clear: none; margin: 2px 0 0 2px;" type="radio" id="individu"
                            name="status_keanggotan" checked  value="individu" id="individu">
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
            
        </form>
    </main>
</body>
<script src="<?php echo e(asset('vendor/libs/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/libs/sweet-alert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/libs/jquery/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('js/mahasiswa.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.prefix-input.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
    $(document).ready(function() {

    });
    var current_fs, next_fs, previous_fs;
    var left, opacity, scale;
    var animating;
    $(".next").click(function() {
        if (animating) return false;
        animating = true;
        current_fs = $(this).parent();
        next_fs = $(this).parent().next();
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
        next_fs.show();
        current_fs.animate({
            opacity: 0
        }, {
            step: function(now, mx) {
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
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack"
        });
    });

    $(".previous").click(function() {
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
            step: function(now, mx) {
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
            complete: function() {
                current_fs.hide();
                animating = false;
            },
            easing: "easeInOutBack"
        });
    });

    $(".submit").click(function() {
        return false;
    });

    $('#individu').click(function() {
        let individu = ` <div id="form-individu" style="display: none;">
                    <input type="text" name="nama_anggota[]" value="<?php echo e(Auth::guard('mahasiswa')->user()->nama); ?>"
                        readonly />
                    <input type="text" name="nim_anggota[]" value="<?php echo e(Auth::guard('mahasiswa')->user()->nim); ?>"
                        readonly />
                    <input type="text" name="nohp_anggota[]"
                        value="<?php echo e(Auth::guard('mahasiswa')->user()->no_hp); ?>" readonly />
                    <input type="text" name=""
                        value="<?php echo e(Auth::guard('mahasiswa')->user()->prodi->keterangan); ?>" readonly />
                    <input type="hidden" name="prodi_id_anggota[]"
                        value="<?php echo e(Auth::guard('mahasiswa')->user()->prodi->id); ?>"  />
                </div>`;
        $('#form-kelompok').css({
            display: 'none'
        });

        $('#form-kelompok').remove();
        $('#kolom-dataAnggota').append(individu);
        $('#form-individu').toggle(this.checked)
    });
    $('#kelompok').click(function() {
        let kelompok = `<div id="form-kelompok" style="display: none; overflow-x:auto;">
                    <button type="button" id="tambahAnggota" class="action-button">+</button>
                    <div id="parent-list">
                        <div id="list"
                            style="border-style: solid; border-color: #e1e1e1; padding: 1rem 1rem 1rem 1rem; margin-bottom: 1.5rem;">
                             <input type="text" name="nama_anggota[]" value="<?php echo e(Auth::guard('mahasiswa')->user()->nama); ?>"
                        readonly />
                    <input type="text" name="nim_anggota[]" value="<?php echo e(Auth::guard('mahasiswa')->user()->nim); ?>"
                        readonly />
                    <input type="text" name="nohp_anggota[]"
                        value="<?php echo e(Auth::guard('mahasiswa')->user()->no_hp); ?>" readonly />
                    <input type="text" name=""
                        value="<?php echo e(Auth::guard('mahasiswa')->user()->prodi->keterangan); ?>" readonly />
                    <input type="hidden" name="prodi_id_anggota[]"
                        value="<?php echo e(Auth::guard('mahasiswa')->user()->prodi->id); ?>"  />
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
                                <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"> <?php echo e($value->keterangan); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

    $('#jenis_surat').on('change', function() {
        if (this.value == "MK") {
            $('#koordinator').attr('disabled', true);
            $('#dosen').attr('disabled', false);
        } else {
            $('#koordinator').attr('disabled', false);
            $('#dosen').attr('disabled', true);
        }
        if (this.value != "TA") {
            $('#judul_ta').attr('disabled', true)
        } else {
            $('#judul_ta').attr('disabled', false)

        }
    })

    $('#multistepsform').submit(function() {
        console.log("submited");
    })

    function setPrefix(data) {
        var prefix = '+62';
        if (data.value.substring(0, prefix.length) != prefix) {
            data.value = prefix;
        }
    }

    $('[data-form="no_hp"]').keyup(function() {
        var prefix = '+62';
        if (this.value.substring(0, prefix.length) != prefix) {
            this.value = prefix;
        }
    });
    $('[data-form="no_hp"]').blur(function() {
        var prefix = '+62';
        if (this.value.substring(0, prefix.length) != prefix) {
            this.value = prefix;
        }
        //this.value = prefix;
        //if(!(this.value.match('^+62'))) this.value = prefix;
    })
</script>

</html>
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/pengajuan-surat.blade.php ENDPATH**/ ?>