<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Manajemen Perpustakaan</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(to right, #f3f4f6, #e0f7fa);
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="text-[#1b1b18] flex items-center justify-center min-h-screen p-6 flex-col font-sans">

<header class="w-full max-w-5xl text-sm mb-8">
    @if (Route::has('filament.admin.auth.login'))
        <nav class="flex justify-end gap-4">
            @auth
                <a href="{{ route('filament.admin.pages.dashboard') }}" class="px-4 py-2 rounded border border-gray-400 hover:border-black dark:border-gray-600 dark:hover:border-white bg-white shadow">
                    Dashboard
                </a>
            @else
                <a href="{{ route('filament.admin.auth.login') }}" class="px-4 py-2 rounded border border-transparent hover:border-gray-400 dark:hover:border-gray-600 bg-white shadow">
                    Login
                </a>
            @endauth
        </nav>
    @endif
</header>

<main class="w-full max-w-5xl bg-white dark:bg-[#161615] shadow-xl rounded-lg p-10">
    <div class="flex flex-col md:flex-row items-center gap-6 mb-8">
        <img src="https://cdn-icons-png.flaticon.com/512/29/29302.png" alt="Buku" class="w-24 h-24">
        <div>
            <h1 class="text-3xl font-semibold mb-2">📚 Sistem Manajemen Perpustakaan Digital</h1>
            <p class="text-gray-600 dark:text-gray-300">
                Pengelolaan Data Buku, Peminjaman Buku, dan Pengembalian Buku.
            </p>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-[#fff4e6] dark:bg-[#2c2c1e] p-6 rounded shadow hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/1828/1828925.png" alt="Manajemen Buku" class="w-12 h-12 mb-3">
            <h2 class="font-semibold text-xl mb-2">Manajemen Buku</h2>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Tambah, edit, atau hapus informasi buku seperti judul, penulis, dan jumlah stok.
            </p>
        </div>
        <div class="bg-[#e6fff2] dark:bg-[#1e2c2c] p-6 rounded shadow hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/3050/3050525.png" alt="Peminjaman" class="w-12 h-12 mb-3">
            <h2 class="font-semibold text-xl mb-2">Peminjaman</h2>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Catat aktivitas peminjaman, nama peminjam, tanggal pinjam, dan estimasi kembali.
            </p>
        </div>
        <div class="bg-[#ffe6ef] dark:bg-[#2c1e26] p-6 rounded shadow hover:shadow-lg transition">
            <img src="https://cdn-icons-png.flaticon.com/512/3585/3585150.png" alt="Pengembalian" class="w-12 h-12 mb-3">
            <h2 class="font-semibold text-xl mb-2">Pengembalian</h2>
            <p class="text-sm text-gray-700 dark:text-gray-300">
                Kelola pengembalian buku dan periksa keterlambatan pengembalian.
            </p>
        </div>
    </div>

    <div class="mt-10 text-center">
        <a href="{{ route('filament.admin.pages.dashboard') }}"
           class="inline-block px-8 py-3 bg-[#1b1b18] text-white rounded-lg hover:bg-black dark:bg-white dark:text-black dark:hover:bg-gray-200 transition">
            Buka Admin Panel
        </a>
    </div>
</main>

