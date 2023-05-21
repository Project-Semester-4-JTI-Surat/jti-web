<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/mahasiswa/style.css')); ?>">
    <title><?php echo e(env('APP_NAME')); ?> - Detail Surat</title>
</head>

<body class="dark:bg-gray-900" id="main">
    <nav class="w-full h-[5rem] z-0 items-end dark:text-white bg-bodyColor border-gray-200 dark:bg-gray-900 md:px-12 transition-all ease-out duration-500 px-9"
        id="navbar">
        <div class="max-w-screen-xl flex  items-center justify-between mx-auto pt-6">
            <a href="" class="flex items-center">
                <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> -->
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">JTI-Surat</span>
            </a>
            <div class="cursor-pointer md:hidden items-center p-2 ml-3" onclick="dropdown()">
                <img class="w-10 h-10 rounded-full mx-auto" src="../assets/img/1.png" alt="">
            </div>
            <!-- <button data-collapse-toggle="navbar-default" id="toogle" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button> -->
            <div class="hidden w-full md:block md:w-auto transition-all ease-out duration-500 pl-20"
                id="navbar-default">
                <ul id="navbar-list"
                    class="transform duration-300 ease-out sm:transition-none font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-white md:dark:bg-opacity-0 dark:bg-gray-800 dark:border-gray-700">

                    <li class="py-1 md:py-0 cursor-pointer" onclick="dropdown()">
                        <!-- <a id="nav-link"
                            class="bg-transparent pl-3 pr-4 hover:text-red-500 dark:hover:text-red-500 text-gray-900 rounded  hover:transform md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white  md:dark:hover:bg-transparent group transition-all duration-300 ease-in-out"
                            href="#faq"> -->
                        <div class="flex">
                            <img class="w-10 h-10 rounded-full mx-auto" src="../assets/img/1.png" alt="">
                            <p class="py-2 pl-5"><?php echo e(Auth::guard('mahasiswa')->user()->nama); ?></p>
                        </div>

                        <!-- </a> -->
                    </li>
                    <li class="group cursor-pointer pt-3" onclick="dropdown()">
                        <span>
                            <svg id="icon" class="transition" fill="none" height="24"
                                shape-rendering="geometricPrecision" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                <path d="M6 9l6 6 6-6"></path>
                            </svg>
                        </span>
                        </svg>
                    </li>

                </ul>

            </div>


        </div>

        <div class="  pt-3 flex justify-end">
            <div class="z-10 hidden relative  bg-white divide-y divide-gray-100 rounded-lg shadow-md max-w-lg w-44 dark:bg-gray-700"
                id="dropdown">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="<?php echo e(route('mahasiswa.profile')); ?>"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                    </li>
                    <li>
                        <a href="<?php echo e(route('mahasiswa.logout')); ?>"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                            out</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="px-20 mt-14">
        <h1 class="text-center font-bold dark:text-white text-2xl pb-10">Surat <?php echo e($surat->jenis_surat->keterangan); ?></h1>
        <div
            class="pl-6 h-full w-full flex flex-col flex-shrink-1 bg-white dark:bg-gray-800 rounded-lg  dark:border-0 border-2 mb-6">

            <form class="px-5 py-5">
                <div class="mb-6">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Dosen</label>
                    <input type="email" value="<?php echo e($surat->dosen->nama); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="john.doe@company.com" required>
                </div>
                <div class="mb-6">
                    <label for="password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Koordinator</label>
                    <input type="text" value="<?php echo e($surat->koordinator->nama); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul TA</label>
                    <input type="text" value="<?php echo e($surat->judul_ta); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Dibuat</label>
                    <input type="text" value="<?php echo e($surat->tanggal_dibuat); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                        Pelaksanaan</label>
                    <input type="text" value="<?php echo e($surat->tanggal_pelaksanaan); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Selesai</label>
                    <input type="text" value="<?php echo e($surat->tanggal_selesai); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Mitra</label>
                    <input type="text" value="<?php echo e($surat->nama_mitra); ?>"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Mitra</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo e($surat->alamat_mitra); ?></textarea>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kebutuhan</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo e($surat->kebutuhan); ?></textarea>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo e($surat->keterangan); ?></textarea>
                </div>
                <div class="mb-6">
                    <label for="confirm_password"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                    <textarea
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo e($surat->status->keterangan); ?></textarea>
                </div>
                <?php if(!$surat->filescan == ''): ?>
                    <div class="mb-6">
                        <label for="confirm_password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Scan</label>

                        <a href="#"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">Download Scan
                            <span class="bx bx-chevron-right"></span>
                        </a>
                    </div>
                <?php endif; ?>
                <h1 class="dark:text-white py-2 text-xl font-bold">Daftar Anggota</h1>
                <?php
                    $anggota = App\Models\Anggota::where('surat_id', '=', $surat->uuid)->get();
                ?>
                <div>
                    <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h1 class="dark:text-white py-2 text-lg font-bold">Anggota <?php echo e($key + 1); ?></h1>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="phone"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIM
                                    Anggota</label>
                                <input type="tel" value="<?php echo e($value->nim); ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="123-45-678" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required>
                            </div>
                            <div>
                                <label for="first_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Anggota</label>
                                <input type="text" value="<?php echo e($value->nama); ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="John" required>
                            </div>
                            <div>
                                <label for="last_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prodi
                                    Anggota</label>
                                <input type="text" value="<?php echo e($value->prodi->keterangan); ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Doe" required>
                            </div>
                            <div>
                                <label for="company"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP
                                    Anggota</label>
                                <input type="text" value="<?php echo e($value->no_hp); ?>"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Flowbite" required>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                </div>
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
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/detail-surat.blade.php ENDPATH**/ ?>