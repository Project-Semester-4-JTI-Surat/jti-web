<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('img/favicon/logo.svg')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('css/mahasiswa/style.css')); ?>">
    <link rel="shortcut icon" href="../assets/img/logo.svg" type="image/x-icon">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>JTI-Surat</title>
</head>

<body class="dark:bg-gray-900" id="main">
    <!--========== HEADER ==========-->

    <nav class="w-full absolute h-[5rem] z-50 bg-white border-gray-200 dark:bg-black/25 md:px-12 transition-all ease-out duration-500 px-9"
        id="navbar">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto pt-6">
            <a href="https://flowbite.com/" class="flex items-center">
                <!-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" /> -->
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">JTI-Surat</span>
            </a>
            <button data-collapse-toggle="navbar-default" id="toogle" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto transition-all ease-out duration-500 " id="navbar-default">
                <ul id="navbar-list"
                    class="transform duration-300 ease-out sm:transition-none font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:border-0 bg-white md:dark:bg-opacity-0 dark:bg-gray-800 dark:border-gray-700">
                    <!-- <li>
            <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
          </li> -->
                    <li class="py-1 md:py-0">
                        <a id="nav-link"
                            class=" bg-transparent py-1 pl-3 pr-4 hover:text-red-500 dark:hover:text-red-500 rounded  hover:transform md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:bg-transparent group transition-all duration-300 ease-in-out"
                            href="#home">
                            Home
                            <!-- <span id="nav-text"
                                class="bg-left-bottom bg-gradient-to-r  from-red-500 to-red-500 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">
                                Home
                            </span> -->
                        </a>
                        <!-- <a href="#"
                            class=" group block py-1 pl-3 pr-4 text-gray-900 rounded  hover:transform md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:text-gray-300 md:dark:hover:bg-transparent">
                            Home
                            <span id="nav-text"
                                class="absolute -bottom-1 left-0 w-0 h-2 bg-blue-400 transition-all group-hover:w-full"></span>

                        </a> -->
                    </li>
                    <li class="py-1 md:py-0">
                        <a id="nav-link"
                            class="bg-transparent pl-3 pr-4 hover:text-red-500 dark:hover:text-red-500 text-gray-900 rounded  hover:transform md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white  md:dark:hover:bg-transparent group transition-all duration-300 ease-in-out"
                            href="#about">
                            About
                            <!-- <span id="nav-text"
                                class="bg-left-bottom bg-gradient-to-r from-red-500 to-red-500 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">
                                About
                            </span> -->
                        </a>
                    </li>
                    <li class="py-1 md:py-0">
                        <a id="nav-link"
                            class="bg-transparent pl-3 pr-4 hover:text-red-500 dark:hover:text-red-500 text-gray-900 rounded  hover:transform md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white  md:dark:hover:bg-transparent group transition-all duration-300 ease-in-out"
                            href="#faq">
                            FAQ
                            <span id="nav-text"
                                class="bg-left-bottom bg-gradient-to-r from-red-500 to-red-500 bg-[length:0%_2px] bg-no-repeat group-hover:bg-[length:100%_2px] transition-all duration-500 ease-out">
                                <!-- FAQ -->
                            </span>
                        </a>
                    </li>
                    <li class="pt-4 md:pt-0">
                        <a href="<?php echo e(route('mahasiswa.login')); ?>"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-md">Login
                            <!-- <span class="bx bx-chevron-right"></span> -->
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- <header class="w-full pt-5 h-20 fixed left-0 z-0 bg-bodyColor " id="header">
        <nav class="max-w-5xl flex justify-between items-center lg:ml-auto lg:mr-auto sm:px-10">
            <a href="#" class="nav__logo">JTI-Surat</a>

                <ul class="lg:hidden flex">
                    <li class="md:ml-10 "><a href="#home" class="nav__link active-link">Home</a></li>
                    <li class="md:ml-10 "><a href="#about" class="nav__link">About</a></li>
                    <li class="md:ml-10 "><a href="#services" class="nav__link">FAQ</a></li>

                    <li class="md:ml-10 "><i class='bx bx-moon change-theme' id="theme-button"></i></li>
                </ul>
            <div class="md:hidden" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header> -->

    <!-- Section Home -->
    <section style="background-image: url('../.../../assets/img/backgrounds/atas.jpg');"
        class="md:flex md:justify-between text-center md:text-start bg-fixed bg-cover bg-no-repeat bg-center pt-36 md:pr-7 pl-14 dark:text-white pb-36 h-full"
        id="home">
        <!-- <img src="assets/img/home.png" alt="" class="w-[300px] min-[960px]:w-[500px]"> -->
        <div class="w-full md:w-[45%]  pr-8">
            <h1 class="text-6xl font-bold">JTI-Surat</h1>
            <h2 class="py-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa labore soluta excepturi
                itaque dolor sit nam ipsam tempore repellat praesentium asperiores accusamus culpa ex aperiam, quos in
                nihil sint deserunt.
                Nihil rem laudantium officia accusantium repellendus atque, ducimus totam sint impedit libero
                consectetur quo eaque enim veritatis aperiam aspernatur omnis expedita ullam deserunt corporis odio iure
                itaque magnam. Eligendi, asperiores.
                Dignissimos temporibus quidem saepe qui? Nam, dignissimos eius consectetur pariatur inventore in
                eligendi consequatur dolorem, temporibus amet rerum debitis optio harum, ut beatae eveniet nostrum
                aliquid laudantium soluta id nesciunt!</h2>
            <div class="pt-8">
                <a href="#" class="bg-red-500 hover:bg-red-700 text-white font-bold py-3 px-4 rounded-md">Get
                    Started
                    <!-- <span class="bx bx-chevron-right"></span> -->
                </a>
            </div>
        </div>
        <lottie-player class="md:w-[40%] md:h-[40%] z-0"
            src="https://assets4.lottiefiles.com/packages/lf20_nvzik8vy.json" background="transparent" speed="1"
            loop autoplay></lottie-player>
    </section>

    <!-- Section About -->
    <section class=" pt-20 h-auto md:pr-7 md:h-full dark:text-white" id="about">
        <h1 class="font-bold text-center text-5xl">About Us</h1>
        <!-- <hr class="my-12 h-2 border-t-0 bg-gray-400/10 w-1/5 pt-2 m-auto"> -->

        <div class="grid grid-flow-row md:grid-flow-col gap-2 w-full items-center justify-center py-12 px-10">
            <div>
                <div
                    class="max-w-xs h-[20rem] flex flex-col justify-between bg-white dark:bg-gray-800 rounded-lg  dark:border-0 border mb-6 py-5 px-4">
                    <div>
                        <h4 tabindex="0"
                            class="focus:outline-none text-2xl text-gray-800 dark:text-gray-100 font-bold mb-3">
                            About US 1</h4>
                        <p tabindex="0" class="focus:outline-none text-gray-800 dark:text-gray-100 text-sm">Probabo,
                            inquit, sic agam, ut labore et voluptatem sequi nesciunt, neque porro quisquam est, quid
                            malum, sensu iudicari, sed ut alterum.</p>
                    </div>
                </div>
            </div>


        </div>

    </section>

    <!-- Section FAQ -->
    <section class="dark:text-white w-full h-full pt-30 pb-20" id="faq">
        <!-- <img src="assets/img/home.png" alt="" class="w-[300px] min-[960px]:w-[500px]"> -->
        <h1 class="text-5xl font-bold mb-3 text-center m-auto">FAQ</h1>
        <p class="text-neutral-500 text-xl mt-3  text-center m-auto">
            Frequently asked questions
        </p>
        <div>
            <div class="grid max-w-3xl mx-auto mt-8">

                <div class="py-5 px-7 dark:border-0 border dark:bg-gray-800 rounded-lg mb-6">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span> Lorem ipsum dolor sit amet consectetur?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolore debitis fugit at
                            praesentium quia iste. Expedita voluptates esse, quo fuga deleniti rerum. Cupiditate cum
                            quia maxime debitis eveniet necessitatibus?
                        </p>
                    </details>
                </div>
                <div class="py-5 px-7 dark:border-0 border dark:bg-gray-800 rounded-lg mb-6">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span> Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolore debitis fugit at
                                praesentium quia iste?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolore debitis fugit at
                            praesentium quia iste. Expedita voluptates esse, quo fuga deleniti rerum. Cupiditate cum
                            quia maxime debitis eveniet necessitatibus?
                        </p>
                    </details>
                </div>
                <div class="py-5 px-7 dark:border-0 border dark:bg-gray-800 rounded-lg mb-6">
                    <details class="group">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none">
                            <span> Lorem ipsum dolor sit amet consectetur?</span>
                            <span class="transition group-open:rotate-180">
                                <svg fill="none" height="24" shape-rendering="geometricPrecision"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5" viewBox="0 0 24 24" width="24">
                                    <path d="M6 9l6 6 6-6"></path>
                                </svg>
                            </span>
                        </summary>
                        <p class="text-neutral-600 mt-3 group-open:animate-fadeIn">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, dolore debitis fugit at
                            praesentium quia iste. Expedita voluptates esse, quo fuga deleniti rerum. Cupiditate cum
                            quia maxime debitis eveniet necessitatibus?
                        </p>
                    </details>
                </div>
            </div>
        </div>

    </section>
    <footer class="">
        <div class=" bg-gray-900 dark:bg-gray-800">
            <div class="max-w-2xl mx-auto text-white py-10">
                <div class="text-center">
                    <h3 class="text-3xl mb-3"> Download Aplikasi Android </h3>
                    <a class="flex justify-center my-10" href="#">
                        <div class="flex items-center border w-auto rounded-lg px-4 py-2 w-52 mx-2 bg-black">
                            <img src="https://cdn-icons-png.flaticon.com/512/888/888857.png" class="w-7 md:w-8">
                            <div class="text-left ml-3">
                                <p class='text-xs text-gray-200'>Download on </p>
                                <p class="text-sm md:text-base"> Google Play Store </p>
                            </div>
                        </div>

                    </a>
                </div>
                <div class="mt-28 flex flex-col md:flex-row md:justify-between items-center text-sm text-gray-400">
                    <p class="order-2 md:order-1 mt-8 md:mt-0"> &copy; JTI-Surat, 2023 </p>
                    <div class="order-1 md:order-2">
                        <a href="" class="px-2">JTI</a>
                        <a href="" class="px-2 border-l">Contact</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>










</body>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script src="<?php echo e(asset('vendor/libs/jquery/jquery.js')); ?>"></script>
<script src="<?php echo e(asset('js/scrollreveal.js')); ?>"></script>
<!-- <script src="assets/js/scroll-active.js"></script> -->
<script>
    $(document).scroll(function() {
        var scrollVal = $(this).scrollTop();
        // console.log(scrollVal);
        var navbar = $('#navbar');
        if (scrollVal >= 112) {
            navbar.addClass('fixed dark:bg-gray-900');
            navbar.removeClass('absolute dark:bg-black/25');
        } else {
            navbar.removeClass('fixed dark:bg-gray-900');
            navbar.addClass('absolute dark:bg-black/25');
        }

        // if (refElement.position().top <= scrollVal && refElement.position().top + refElement.height() > scrollVal) {
        //     $('#main-navigation ul li').removeClass("active");
        //     currLink.addClass("active");
        // }
        // else {
        //     currLink.removeClass("active");
        // }


    })
    // $('#navbar-list').onePageNav({
    //     currentClass: 'text-red-500 dark:text-red-500',
    //     changeHash: false,
    //     scrollSpeed: 750,
    //     scrollThreshold: 0.5,
    //     filter: '',
    //     easing: 'swing',
    // });
    $("#navbar ul li a").click(function() {
        // remove classes from all
        $("#navbar ul li a").removeClass("text-red-500 dark:text-red-500");
        // add class to the one we clicked
        $(this).addClass("text-red-500 dark:text-red-500");
    });
    var toogle = $('#toogle');
    // toogle.click(function () {
    //     $('#navbar-default').removeClass('hidden');
    //     toogle.attr('aria-expanded', 'true');
    //     if (!$('#navbar-default').hasClass('hidden')) {
    //         $('#navbar-default').addClass('hidden');
    //         // toogle.attr('aria-expanded', 'false');
    //         console.log('false');

    //     }
    // });
    // $("#toggle").click(function (e) {
    //     e.stopPropagation();
    //     return false;
    // });
    const sr = ScrollReveal({
        origin: 'top',
        distance: '30px',
        duration: 2000,
        reset: true
    });

    sr.reveal(`#home, #about, #faq`, {
        interval: 200
    })
    toogle.click(function(e) {
        var hide = $("#navbar-default").toggleClass("hidden");
        // console.log(hide);
    })
</script>
<!-- <script>
    const sections = document.querySelectorAll("section");
    const navLi = document.querySelectorAll("#navbar ul li ");
    window.onscroll = () => {
        var current = "";

        sections.forEach((section) => {
            const sectionTop = section.offsetTop;
            if (pageYOffset >= sectionTop - 60) {
                current = section.getAttribute("id");
            }
        });
        console.log(current);
        const classlink = ["text-red-500", "dark:text-red-500"];
        navLi.forEach((li) => {
            console.log(li.id);
            if (li.id == current) {
                $($("a[href$='#" + current + "']")).addClass("text-red-500 dark:text-red-500")
            } else {
                $($("a[href='#" + current + "']")).removeClass("text-red-500 dark:text-red-500")
            }
            // li.classList.remove(classlink);
            // if (li.classList.contains(current)) {
            //     li.classList.add(classlink);
            // }
        });
    };
</script> -->

</html>
<?php /**PATH C:\laragon\www\jti-surat\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>