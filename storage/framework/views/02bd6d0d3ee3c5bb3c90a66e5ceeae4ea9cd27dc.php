<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo e(env('app_name')); ?> - Login Mahasiswa</title>
    <?php echo $__env->make('layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
















































</head>
<body>
<section class="" style="padding-top: 4rem">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">
            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        JTI - Surat <br />
                        <span class="text-primary">Mengajukan surat dengan penuh kemudahan</span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Dengan aplikasi ini diharapkan mahasiswa tidak perlu berlama lama hanya
                        untuk mengajukan surat kepada kepala jurusan. Mahasiswa diharapkan
                        terbantu dengan fitur yang tersedia pada aplikasi.
                        Anda harus mendaftar sebagai mahasiswa dan pastikan nim yang anda masukkan valid.

                        Sudah terdaftar? <a href="">Login disini</a>
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <form>
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1">Nama</label>
                                            <input type="text" id="form3Example1" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example2">Email</label>
                                            <input type="email" id="form3Example2" class="form-control" />
                                        </div>
                                    </div>
                                </div> <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example1">Nomor HP</label>
                                            <input type="text" id="form3Example1" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="form3Example2">NIM</label>
                                            <input type="email" id="form3Example2" class="form-control" />
                                        </div>
                                    </div>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Email</label>
                                    <input type="email" id="form3Example3" class="form-control" />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Password</label>
                                    <input type="password" id="form3Example4" class="form-control" />
                                </div>


                                <!-- Submit button -->
                                <div class="text-center">
                                <button type="submit" class="btn m-auto btn-primary mb-4">
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
<script>
    $(function () {
        $('input, select').on('focus', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
        });
        $('input, select').on('blur', function () {
            $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
        });
    });

</script>
</html>
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/uiv2/register.blade.php ENDPATH**/ ?>
