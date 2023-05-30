<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> <?php echo e(env('APP_NAME')); ?> - Mahasiswa Register </title>
    <link rel="stylesheet" href="<?php echo e(asset('css/auth/mahasiswa_register.css')); ?>">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/favicon/logo.svg')); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <div class="container">
        <header>Registration</header>
        <div class="content">
            <form action="<?php echo e(route('mahasiswa.register_process')); ?>" id="formAuthentication" method="POST">
                <?php echo e(csrf_field()); ?>

                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Nama Mahasiswa</span>
                        <input type="text" class="input" id="name" name="nama" value="<?php echo e(old('nama')); ?>" placeholder="Enter your name"
                            required>
                        
                    </div>
                    <div class="input-box">
                        <span class="details">NIM</span>
                        <input type="text" class="input" value="<?php echo e(old('nim')); ?>" id="nim" name="nim" placeholder="E412xxxxx"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" class="input" id="email" value="<?php echo e(old('email')); ?>" name="email" placeholder="xxxxx@gmail.com"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Tanggal Lahir</span>
                        <input type="date" class="input" id="tanggal_lahir" value="<?php echo e(old('date')); ?>" name="tanggal_lahir" placeholder="xxxxx@gmail.com"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" class="input" id="no_hp" value="<?php echo e(old('no_hp')); ?>" name="no_hp" placeholder="+62 8xxxxxxxxxx"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Alamat</span>
                        <input type="text" class="input" id="alamat" value="<?php echo e(old('alamat')); ?>" name="alamat" placeholder="ex. Jl.xx ,no.xx"
                            required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" class="input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your password" required>
                        <i class="uil uil-eye-slash" aria-hidden="true" id="eye"
                            onclick="toggle()"></i>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span id="password-error" class="text-error" style=""><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                  
                </div>
                <div class="prodi-details">
                    <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <input type="radio" name="prodi_id" value="<?php echo e($value->id); ?>" id="dot-<?php echo e($key + 1); ?>">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <span class="prodi-title">Pilih Prodi</span>

                    <div class="category">
                        <?php $__currentLoopData = $prodi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label for="dot-<?php echo e($key + 1); ?>">
                                <span class="dot active-<?php echo e($key + 1); ?>"></span>
                                <span class="gender"><?php echo e($value->keterangan); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       <?php if($errors->any()): ?>
                        <?php echo implode('',$errors->all('<p>:message</p>')); ?>

                       <?php endif; ?>

                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Register">
                </div>
                <div class="bottom">
                    <div class="left">
                        <p><a href="<?php echo e(route('mahasiswa.login')); ?>"> Kembali ke halaman login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="<?php echo e(asset('vendor/libs/jquery/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/libs/jquery/validate/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('js/mahasiswa.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/libs/jquery/validate/additional-methods.js')); ?>"></script>
    <script src="<?php echo e(asset('vendor/libs/jquery/validate/localization/messages_id.js')); ?>"></script>
    <script>
        $(function() {
            setTimeout(function() {
                $('#nim').removeClass("error");
                $('#error-field').remove();
            }, 1500);
            $.validator.addMethod("nimCheck", function(value, element) {
                return (new RegExp(/^E\d{8}$/).test(value))
            }, "Nim tidak valid");
            $.validator.addMethod("checkAlphaSym", function(value, element) {
                return (new RegExp("^[a-zA-Z .,]*$").test(value))
            }, "Kolom harus diisi dengan huruf");
            $('#formAuthentication').validate({
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
                errorElement: "span",
                errorClass: "text-error",
                errorPlacement: function(error, element) {
                    $('#formAuthentication').addClass("was-validated")
                    // error.insertAfter("#form-input");
                    // Add the `help-block` class to the error element
                    if (!$(element)) {
                        error.removeClass("error")
                        error.addClass("text-error");
                        error.appendTo("#form-input");
                        if ($(element).next("span")[0]) {
                            // error.addClass("help-block");
                            error.insertAfter("#eye")
                            // error.addClass("invalid-feedback");
                        }
                    }


                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $('#formAuthentication').removeClass("was-validated").addClass(" needs-validation")
                    $(element).addClass("error").removeClass("success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    // $('#formAuthentication').removeClass("was-validated")

                    $('#formAuthentication').addClass("was-validated").removeClass(" needs-validation")
                    $(element).addClass("success").removeClass("error");
                }
            })
        })
        $('#no_hp').keyup(function() {
            var prefix = '+62';
            if (this.value.substring(0, prefix.length) != prefix) {
                this.value = prefix;
            }
        });
        $('#no_hp').blur(function() {
            var prefix = '+62';
            if (this.value.substring(0, prefix.length) != prefix) {
                this.value = prefix;
            }
            //this.value = prefix;
            //if(!(this.value.match('^+62'))) this.value = prefix;
        })
    </script>

</body>

</html>
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/register.blade.php ENDPATH**/ ?>