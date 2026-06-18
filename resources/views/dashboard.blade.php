<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white shadow-md p-6">
        <div class="flex items-center gap-3 mb-2">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"  class="w-40 h-auto object-contain">
            
        </div>

        <nav class="space-y-3">
            <a class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">▦ Dashboard</a>
            <a class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👤 Data User</a>
            <a class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">🎓 Data Dosen</a>
            <a class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👥 Data Mahasiswa</a>
            <a class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📄 Data Materi</a>
            <a class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📝 Data Kuis</a>
            <a class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📊 Data Hasil Kuis</a>
        </nav>
    </aside>

    {{-- MAIN --}}
    <main class="flex-1 p-8">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">Selamat Datang, Admin</h2>
                <p class="text-gray-600 mt-2">Kelola dan pantau sistem Smart Quiz Generator.</p>
            </div>

            <div class="relative group">

    {{-- Profile Button --}}
    <button class="bg-white px-5 py-3 rounded-xl shadow flex items-center gap-3">

        <div class="text-purple-700 text-xl">
            👤
        </div>

        <div class="text-left">
            <p class="font-bold">ardha</p>
            <p class="text-xs text-gray-500">Admin</p>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 text-gray-500"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>

    </button>

    {{-- Dropdown --}}
    <div class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg opacity-0 invisible
        group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="w-full text-left px-5 py-3 hover:bg-red-50 rounded-xl text-red-600 font-medium">

                Logout

            </button>
        </form>

    </div>

</div>
        </div>

        {{-- STAT CARD --}}
        <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-8">
            @foreach([
                ['Total Pengguna','1.245','👥'],
                ['Total Dosen','89','👨‍🏫'],
                ['Total Mahasiswa','1.545','👨‍🎓'],
                ['Total Materi (PDF)','3.245','📄'],
                ['Total Kuis','1.245','📝'],
                ['Total Hasil Kuis','10.245','📊'],
            ] as $item)
            <div class="bg-white rounded-xl shadow p-4">
                <div class="text-3xl mb-2">{{ $item[2] }}</div>
                <p class="text-sm text-gray-600">{{ $item[0] }}</p>
                <h3 class="text-xl font-bold">{{ $item[1] }}</h3>
                <p class="text-green-600 text-xs mt-2">↑ 12% dari minggu lalu</p>
            </div>
            @endforeach
        </div>

        {{-- CONTENT --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            {{-- DATA TERBARU --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-bold text-xl mb-4">Data Terbaru</h3>

                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="py-2">Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for($i = 1; $i <= 5; $i++)
                        <tr class="border-b">
                            <td class="py-3">Dodi</td>
                            <td>example@gmail.com</td>
                            <td>Mahasiswa</td>
                            <td>26 Mei 2026</td>
                            <td>
                                <button class="bg-purple-600 text-white px-3 py-1 rounded-lg text-xs">Kelola</button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>

                <p class="text-center text-purple-600 mt-4 text-sm">Lihat Semua Pengguna Baru</p>
            </div>

            {{-- AKTIVITAS --}}
            <div class="bg-white rounded-2xl shadow p-6">
                <h3 class="font-bold text-xl mb-4">Aktivitas Sistem Terbaru</h3>

                <div class="space-y-4 text-sm">
                    <div class="flex justify-between border-b pb-2">👨‍🏫 Admin Konfirmasi Dosen Baru <span>10:25</span></div>
                    <div class="flex justify-between border-b pb-2">📄 Materi Baru Diupload <span>10:25</span></div>
                    <div class="flex justify-between border-b pb-2">📝 Kuis Baru Dibuat <span>10:25</span></div>
                    <div class="flex justify-between border-b pb-2">👤 Mahasiswa Baru Terdaftar <span>10:25</span></div>
                    <div class="flex justify-between border-b pb-2">📊 Hasil Kuis Diperbarui <span>10:25</span></div>
                </div>

                <p class="text-center text-purple-600 mt-4 text-sm">Lihat Semua Aktivitas</p>
            </div>
        </div>

        {{-- KELOLA DATA --}}
        <div class="bg-white rounded-2xl shadow p-6">
            <h3 class="font-bold text-xl text-center mb-6">Kelola Data</h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @foreach([
                    ['Data User','Kelola Semua Akun Pengguna','👤'],
                    ['Data Dosen','Kelola Data Dosen','👨‍🏫'],
                    ['Data Mahasiswa','Kelola Data Mahasiswa','🎓'],
                    ['Data Kuis','Kelola Semua Kuis','📝'],
                    ['Data Hasil User','Kelola Hasil Kuis Mahasiswa','📊'],
                    ['Data Materi','Kelola Materi PDF','📄'],
                ] as $item)
                <div class="border rounded-xl p-5 hover:bg-purple-50 cursor-pointer">
                    <div class="text-3xl mb-2">{{ $item[2] }}</div>
                    <h4 class="font-bold">{{ $item[0] }}</h4>
                    <p class="text-sm text-gray-500">{{ $item[1] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        <footer class="text-center text-gray-500 mt-8">
            © 2026 Smart Quiz Generator. All rights reserved.
        </footer>

    </main>
</div>

</body>
</html>