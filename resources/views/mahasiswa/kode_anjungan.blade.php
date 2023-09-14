<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kode</title>
   <link rel="stylesheet" href="{{ asset('css/mahasiswa/style.css') }}">
</head>
<body class="dark:bg-gray-900" id="main">
    <div class="flex items-center justify-center h-screen flex-col">
        <h2 class="text-5xl text-gray-800 dark:text-gray-100 font-bold mb-3">
            {{ $kode }}
        </h2>
        <p class="text-gray-800 dark:text-gray-100">*Kode diatas adalah kode unik pada setiap pengajuan surat.</p>
    </div>
</body>
</html>