<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(env('app_name')); ?> - Mahasiswa Register</title>
    <?php echo $__env->make('layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

</head>
<body>
<section class="" style="padding-top: 2rem">
    <!-- Jumbotron -->
    <div class="px-4 py-3 px-md-5 text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-lg-0" id="typography">
                    <h1 class="my-3 display-3 fw-bold ls-tight">
                        JTI - Surat <br />
                        <span class="text-primary">Mengajukan surat dengan penuh kemudahan</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Dengan aplikasi ini diharapkan mahasiswa tidak perlu berlama lama hanya
                        untuk mengajukan surat kepada kepala jurusan. Mahasiswa diharapkan
                        terbantu dengan fitur yang tersedia pada aplikasi.
                        Anda harus mendaftar sebagai mahasiswa dan pastikan nim yang anda masukkan valid.
                        Sudah terdaftar? <a href="<?php echo e(route('mahasiswa.login')); ?>">Login disini</a>
                    </p>
                </div>

                <div class="col-lg-6 mb-lg-0" id="form">
                    <div class="card">
                        <div class="card-body ">
                            <form id="form-register" action="<?php echo e(route('mahasiswa.register_process')); ?>" method="post">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" required value="<?php echo e(old('nama')); ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="nim">NIM</label>
                                            <input type="text" id="nim" name="nim" value="<?php echo e(old('nim')); ?>" class="form-control" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="no_hp">Nomor HP</label>
                                            <input type="text" id="no_hp"  name="no_hp" value="<?php echo e(old('no_hp')); ?>" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-group">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required class="form-control" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Password input -->
                                <div class="form-group mb-4">
                                    <label class="form-label" for="alamat">Alamat</label>
                                    <input type="text" id="alamat" name="alamat" class="form-control" />
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>

                                    <input autocomplete="off" required placeholder="Masukkan tanggal lahir" class="datepicker-here form-control"
                                           value="<?php echo e(old('tanggal_lahir')); ?>"
                                           name="tanggal_lahir" type="text" id="tanggal_lahir" data-date-format="yyyy-mm-dd" data-language="en"  type="text" id="tanggal_lahir"/>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label class="form-label" for="prodi_id">Prodi</label>
                                   <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-check">
                                        <label class="form-check-label" for="prodi_<?php echo e($value->id); ?>">
                                            <?php echo e($value->keterangan); ?>

                                        </label>
                                        <input class="form-check-input" type="radio" name="prodi_id" required id="prodi_<?php echo e($value->id); ?>" value="<?php echo e($value->id); ?>">
                                    </div>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="input-group flex-wrap">
                                            <span class="input-group-text" id="basic-addon1"><i id="toogle" class="fa-solid fa-eye-slash"></i></span>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                </div>


                                <!-- Submit button -->
                                <div class="text-center">
                                <button type="submit" style="height: 3rem; width: 7rem; font-size: medium; font-weight: bold" class="btn m-auto btn-primary">
                                    Daftar
                                </button>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
</body>
<?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/scrollreveal.js')); ?>"></script>
<script>
    (function($) {
        $.fn.inputFilter = function(callback, errMsg) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop focusout", function(e) {
                if (callback(this.value)) {
                    // Accepted value
                    if (["keydown","mousedown","focusout"].indexOf(e.type) >= 0){
                        $(this).removeClass("input-error");
                        this.setCustomValidity("");
                    }
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    // Rejected value - restore the previous one
                    $(this).addClass("input-error");
                    // this.setCustomValidity(errMsg);
                    this.reportValidity();
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    // Rejected value - nothing to restore
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $(function () {
        $('input, select').on('focus', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
        });
        $('input, select').on('blur', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
        });
        $.validator.addMethod("checkAlpha", function(value, element) {
            return (new RegExp("^[a-zA-Z ]*$").test(value))
        }, "Kolom harus diisi dengan huruf");

        $.validator.addMethod("nimCheck", function(value, element) {
            return (new RegExp(/^E\d{8}$/).test(value))
        }, "Nim tidak valid");

        $.validator.addMethod("checkAlphaSym", function(value, element) {
            return (new RegExp("^[a-zA-Z .,]*$").test(value))
        }, "Kolom harus diisi dengan huruf");
        $('#form-register').validate({
            // wrapper: "#form-input",
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                },
                no_hp: {
                    required: true,
                    numeric: true,
                    minlength: 13,
                },
                email: {
                    required: true,
                    email: true,
                },
                alamat: {
                    required: true,
                },
                nim: {
                    required: true,
                    maxlength: 9,
                    nimCheck: true,
                },
                nama: {
                    required: true,
                    checkAlphaSym: true,
                },
                tanggal_lahir:{
                    required: true,
                }
            },
            // hightlight: function(element) {
            //    $(element).addClass('is-invalid')
            // },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid').removeClass('valid');
                $(element.form).find("label[for=" + element.id + "]")
                    .addClass(errorClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid').addClass('valid');
                $(element.form).find("label[for=" + element.id + "]")
                    .removeClass(errorClass);
            },
            errorElement: "span",
            errorPlacement: function(error, element) {
                $(element).addClass('is-invalid')
                error.addClass("invalid-feedback");
                // error.appendTo("#form-input");
                error.insertAfter(element);
                // Add the `help-block` class to the error element

                // if (element.prop("type") === "checkbox") {
                //     error.insertAfter(element.parent("label"));
                // } else {
                //     error.insertAfter(element);
                // }
            },
            success: function(label, element) {
                $(element).removeClass('is-invalid');
            }
        });
    });
    $("#no_hp").inputFilter(function(value) {
        return /^[+62]-?\d*$/.test(value); }, "Input hanya menerima angka");
    $('#no_hp').keyup(function() {
        var prefix = '+62';
        if (this.value.substring(0, prefix.length) != prefix) {
                this.value = prefix;
        }
    });
    $('#no_hp').blur(function() {
        var prefix = '+62';
        console.log(Number.isNaN(this.value.substring(0,prefix.length)));
        if (this.value.substring(0, prefix.length) != prefix) {
                this.value = prefix;
        }
        //this.value = prefix;
        //if(!(this.value.match('^+62'))) this.value = prefix;
    })
    $('#toogle').click(function (){
        var type = $('#password').attr("type");
        var eye = $('#toogle');
        if (type === 'password') {
            eye.removeClass('fa-eye-slash')
            eye.addClass('fa-eye')
            $('#password').attr("type", "text");
        } else {
            eye.addClass('fa-eye-slash')
            eye.removeClass('fa-eye')
            $('#password').attr("type", "password");
        }
    });
    const sr = ScrollReveal({
        origin: 'left',
        distance: '30px',
        duration: 2000,
        reset: true
    });

    sr.reveal(`#typography`, {
        interval: 200
    })
    const sr2 = ScrollReveal({
        origin: 'right',
        distance: '30px',
        duration: 2000,
        reset: true
    });

    sr2.reveal(`#form`, {
        interval: 200
    })
</script>
</html>
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/uiv2/register.blade.php ENDPATH**/ ?>