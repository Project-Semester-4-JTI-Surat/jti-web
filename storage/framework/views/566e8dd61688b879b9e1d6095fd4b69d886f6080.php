<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title><?php echo e(config('app.name')); ?> - Login</title>
    <link rel="stylesheet" href="<?php echo e(asset('vendor/css/pages/page-auth.css')); ?>" />
    <?php echo $__env->make('layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <!-- Content -->
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oopss</strong> Mohon cek kembali username dan password anda
                            </div>
                        <?php endif; ?>
                        <p class="mb-4">Masukkan email dan password anda</p>

                        <form id="formAuthentication" class="mb-3" action="<?php echo e(route('auth.login_process')); ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                            <div class="mb-3" id="form-input">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" required id="username" name="username" placeholder="Username" autofocus />

                            </div>
                            <!-- <div class="input-group mb-3">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon1">Button</button>
                                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            </div> -->
                            <div class="mb-3 form-password-toggle " id="form-input">
                                <label class="form-label" for="password">Password</label>
                                <!-- <input type="password" id="password" required class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                    <span class="input-group-text cursor-pointer" id="eye"><i class="bx bx-hide"></i></span>
                                 -->
                                <div class="input-group">
                                    <span class="input-group-text cursor-pointer" id="eye password"><i class="bx bx-hide"></i></span>
                                    <input type="password" id="password" required class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />

                                </div>
                            </div>


                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" id="btn-login" type="submit">Login</button>
                            </div>
                        </form>


                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->
    <?php echo $__env->make('layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(function() {
            $('#formAuthentication').validate({
                // wrapper: "#form-input",
                rules: {
                    password: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    },
                },
                errorElement: "span",
                errorPlacement: function(error, element) {

                    $('#formAuthentication').addClass("was-validated")
                    // error.insertAfter("#form-input");
                    error.addClass("invalid-feedback");
                    error.appendTo("#form-input");
                    // Add the `help-block` class to the error element
                    if ($(element).next("span")[0]) {
                        console.log(true);
                        // error.addClass("help-block");
                        error.insertAfter("#eye")
                        // error.addClass("invalid-feedback");
                    }

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $('#formAuthentication').removeClass("was-validated").addClass(" needs-validation")
                    $(element).parents("#form-input").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    // $('#formAuthentication').removeClass("was-validated")
                    $('#formAuthentication').addClass("was-validated").removeClass(" needs-validation")
                    $(element).parents("#form-input").addClass("has-success").removeClass("has-error");
                }
            })
        })

        // $('#password').change(function(){
        //     if ($('#password').val == '' && $('#email').val == '') {
        //         $('#btn-login').attr('disabled',true);
        //     }else{
        //         $('#btn-login').attr('disabled',false);
        //     }
        // });
        // $('#email').change(function(){
        //     if ($('#password').val == '' && $('#email').val == '') {
        //         $('#btn-login').attr('disabled',true);
        //     }else{
        //         $('#btn-login').attr('disabled',false);
        //     }
        // });
    </script>
</body>


</html><?php /**PATH C:\laragon\www\jti-surat\resources\views/login.blade.php ENDPATH**/ ?>