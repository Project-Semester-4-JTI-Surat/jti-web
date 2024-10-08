<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(env('APP_NAME')); ?> - Mahasiswa Login</title>
    <?php echo $__env->make('layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <section class="vh-100" style="background-color: hsl(0, 0%, 96%)">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">
                            <div class="col-md-6 col-lg-5 d-none d-md-block">
                                
                                <img src="<?php echo e(asset('img/illustrations/login.png')); ?>" alt="login form" class="img-fluid"
                                    style="border-radius: 1rem 0 0 1rem;" />
                            </div>
                            <div class="col-md-6 col-lg-7 d-flex align-items-center" id="form">
                                <div class="card-body p-4 p-lg-5 text-black">

                                    <form id="formAuthentication" action="<?php echo e(route('mahasiswa.login_process')); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <h5 class="fw-bold mb-3 pb-3" style="letter-spacing: 1px; font-size: large">
                                            LOGIN</h5>
                                        <div class="form-outline mb-3">
                                            <label class="form-label" for="nim">NIM</label>
                                            <input type="text" name="nim" id="nim"
                                                class="form-control form-control" />
                                        </div>

                                        <div class="form-group mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="input-group flex-wrap">
                                                <span class="input-group-text" id="basic-addon1"><i id="toogle"
                                                        class="fa-solid fa-eye-slash"></i></span>
                                                <input type="password" id="password" name="password"
                                                    class="form-control">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <button class="btn btn-primary" type="submit">Login</button>
                                        </div>

                                        
                                        <p class="mb-5 pb-lg-2">Belum mendaftar? <a
                                                href="<?php echo e(route('mahasiswa.register')); ?>" style="color: #393f81;">Daftar
                                                disini</a> atau <a style="color: #393f81;" href="<?php echo e(route('mahasiswa.forgot_password')); ?>">lupa password</a></p>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="<?php echo e(asset('js/scrollreveal.js')); ?>"></script>
<?php if(Session::has('error')): ?>
    <script>
        swal("Error", "Cek kembali nim dan password anda", "error");
    </script>
<?php endif; ?>
<script>
    $(function() {
        const sr2 = ScrollReveal({
            origin: 'right',
            distance: '30px',
            duration: 2000,
            reset: true
        });

        sr2.reveal(`#form`, {
            interval: 200
        })
        // setTimeout(function(){
        //     $('#nim').removeClass("error");
        //     $('#password').removeClass("error");
        //     $('#error-field').remove();
        // },1500);
        $.validator.addMethod("nimCheck", function(value, element) {
            return (new RegExp(/^E\d{8}$/).test(value))
        }, "Nim tidak valid, (JTI menggunakan prefix 'E' diawal nim)");
        $('#formAuthentication').validate({
            // wrapper: "#form-input",
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                },
                nim: {
                    required: true,
                    maxlength: 9,
                    nimCheck: true,
                }
            },
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
        })
    })
    $('#toogle').click(function() {
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
</script>

</html>
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/uiv2/login.blade.php ENDPATH**/ ?>