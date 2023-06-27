<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/favicon/logo.svg')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/mahasiswa/style.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> - Profil</title>
</head>

<body class="h-full w-full ">
    <main class="px-20 mt-14 py-28">
        <h1 class="text-center font-bold  text-2xl pb-10">Update Profile</h1>
        <div
            class="pl-6 h-full w-full flex flex-col flex-shrink-1 bg-white rounded-lg border-2 mb-6">
            <div
                class="px-6 py-6 h-full w-full flex flex-col flex-shrink-1 bg-white mb-6">
                <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50"
                    role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Peringatan..</span> Dengan anda mengubah password anda. anda diarahkan
                        ke halaman login untuk mengulangi proses login
                    </div>
                </div>
                <form class="px-5 py-5" method="POST" action="<?php echo e(route('mahasiswa.update_profile')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="mb-6">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <input type="text" readonly value="<?php echo e($auth->nama); ?>" id="nama"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <div class="mb-6">
                        <label for="nim"
                            class="block mb-2 text-sm font-medium text-gray-900 ">NIM</label>
                        <input type="text" readonly id="nim" value="<?php echo e($auth->nim); ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <div class="mb-6">
                        <label for="prodi"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Prodi</label>
                        <input type="text" readonly id="prodi" value="<?php echo e($auth->prodi->keterangan); ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <div class="mb-6">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" readonly id="email" value="<?php echo e($auth->email); ?>"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" value="" id="password-switch" class="sr-only peer">
                        <div
                            class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">switch on untuk mengubah
                            password</span>
                    </label>
                    <div class="mb-6">
                        <label for="password"
                            class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                        <input type="password" id="password" disabled name="password"
                            class="<?php if($errors->has('password')): ?>  border border-red-500 text-red-900 placeholder-red-700 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 dark:border-red-400
                            <?php else: ?>  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  <?php endif; ?>
                            ">

                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" id="btn-submit" disabled
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                    <a href="<?php echo e(route('mahasiswa.dashboard')); ?>"
                        class="text-white bg-gray-700 hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Batal</a>

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
<script src="<?php echo e(asset('vendor/libs/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/libs/jquery/validate/jquery.validate.js')); ?>"></script>
<script src="<?php echo e(asset('js/mahasiswa.js')); ?>"></script>
<script>
    $('#password-switch').on('change', function() {
        if (this.checked) {
            $('#btn-submit').attr('disabled', false)
            $('#password').attr('disabled', false);
        } else {
            $('#btn-submit').attr('disabled', true)
            $('#password').attr('disabled', true);

        }
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
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/profile.blade.php ENDPATH**/ ?>