<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/mahasiswa/style.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> - Profil</title>
</head>

<body class="h-full w-full dark:bg-gradient-to-t dark:from-blue-950 dark:to-gray-900 dark:bg-no-repeat">
    <main class="px-20 mt-14 py-28">
        <h1 class="text-center font-bold dark:text-white text-2xl pb-10">Update Profile</h1>
        <div
            class="pl-6 h-full w-full flex flex-col flex-shrink-1 bg-white dark:bg-gray-800 rounded-lg  dark:border-0 border-2 mb-6">

            <form class="px-5 py-5">
                <div class="mb-6">
                    <label for="nama"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                    <input type="text" readonly value="<?php echo e($auth->nama); ?>" id="nama"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="nim"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM</label>
                    <input type="text" readonly id="nim" value="<?php echo e($auth->nim); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="prodi"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi</label>
                    <input type="text" readonly id="prodi" value="<?php echo e($auth->prodi->keterangan); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" readonly id="email" value="<?php echo e($auth->email); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" id="password-switch" class="sr-only peer">
                    <div
                        class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    
                </label>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" id="password" disabled
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <button type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
                <button type="button"
                    class="text-white bg-gray-700 hover:bg-gray-600 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 ">Batal</button>

            </form>

        </div>
    </main>
    <footer class="">
        <div class="">
            <p class="text-center dark:text-white"> &copy; JTI-Surat, 2023 </p>
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
            $('#password').attr('disabled', false);
        } else {
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