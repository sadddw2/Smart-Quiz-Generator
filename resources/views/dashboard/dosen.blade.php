<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md p-6">
        <div class="mb-10">
        <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
            class="w-40 h-auto object-contain">
    </div>

        <nav class="space-y-3">

    <a href="{{ route('dashboard.dosen') }}"
        class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
        📊 Dashboard
    </a>

    <a href="{{ route('dosen.kuis-saya') }}"
        class="block px-4 py-3 rounded-xl hover:bg-gray-100">
        📝 Kuis Saya
    </a>

     <a href="{{ route('dosen.kuis.create') }}"
               class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                ➕ Buat Kuis Baru
            </a>

    <a href="{{ route('dosen.materi') }}"
        class="block px-4 py-3 rounded-xl hover:bg-gray-100">
        📄 Materi
    </a>

    <a href="{{ route('dosen.bank-soal') }}"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📚 Bank Soal
</a>

    <a href="{{ route('dosen.mahasiswa') }}"
   class="block px-4 py-3 rounded-xl hover:bg-gray-100">
   👨‍🎓 Mahasiswa
</a>

</nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Dashboard Dosen</h1>
                <p class="text-gray-500 mt-2">Selamat datang kembali, {{ auth()->user()->name }}</p>
            </div>
<div class="relative">
    
    <button onclick="toggleDropdown()"
        class="bg-white shadow px-5 py-3 rounded-xl flex items-center gap-3 hover:bg-gray-50">

        <span>👤</span>

        <div class="text-left">
            <div class="font-semibold">
                {{ auth()->user()->name }}
            </div>

            <div class="text-xs text-gray-500">
                {{ ucfirst(auth()->user()->role) }}
            </div>
        </div>

        <span>▼</span>

    </button>

    <div id="userDropdown"
        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border z-50">

       <form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit"
        class="w-full text-left px-4 py-3 hover:bg-red-50 text-red-600 rounded-xl">
        🚪 Logout
    </button>
</form>

    </div>

</div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-5 gap-6 mb-8">

            <a href="{{ route('kuis.index') }}" class="bg-white p-5 rounded-2xl shadow hover:shadow-lg">
                <div class="text-3xl mb-2">📝</div>
                <h3 class="font-bold">Total Kuis</h3>
                <p class="text-2xl font-bold">{{ $totalKuis }}</p>
                <p class="text-xs text-purple-600">Lihat Semua →</p>
            </a>

            <a href="{{ route('hasilkuis.index') }}" class="bg-white p-5 rounded-2xl shadow hover:shadow-lg">
                <div class="text-3xl mb-2">📄</div>
                <h3 class="font-bold">Total Soal</h3>
                <p class="text-2xl font-bold">{{ $totalSoal }}</p>
                <p class="text-xs text-purple-600">Lihat Semua →</p>
            </a>

            <a href="{{ route('mahasiswa.index') }}" class="bg-white p-5 rounded-2xl shadow hover:shadow-lg">
                <div class="text-3xl mb-2">👨‍🎓</div>
                <h3 class="font-bold">Total Mahasiswa</h3>
                <p class="text-2xl font-bold">{{ $totalMahasiswa }}</p>
                <p class="text-xs text-purple-600">Lihat Semua →</p>
            </a>

            <div class="bg-white p-5 rounded-2xl shadow">
                <div class="text-3xl mb-2">✅</div>
                <h3 class="font-bold">Total Pengerjaan</h3>
                <p class="text-2xl font-bold">{{ $totalPengerjaan }}</p>
                <p class="text-xs text-purple-600">Belum ada data</p>
            </div>

            

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-xl">Kuis Terbaru</h3>
                </div>

                <table class="w-full text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left">Judul Kuis</th>
                            <th class="p-3 text-left">Dosen</th>
                            <th class="p-3 text-left">Soal</th>
                            <th class="p-3 text-left">Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($kuiss as $kuis)
                        <tr class="border-b">
                            <td class="p-3">{{ $kuis->judul_kuis }}</td>
                            <td class="p-3">{{ $kuis->dosen }}</td>
                            <td class="p-3">{{ $kuis->jumlah_soal }}</td>
                            <td class="p-3">
                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Aktif
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-4 text-center text-gray-500">
                                Belum ada kuis
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="font-bold text-xl">Aktivitas Sistem Terbaru</h3>
                </div>

                <div class="space-y-4">
                    @forelse($aktivitas as $item)
                        <div class="flex justify-between border-b pb-3">
                            <div>
                                <p class="font-semibold">{{ $item->icon }} {{ $item->aktivitas }}</p>
                                <p class="text-sm text-gray-500">{{ $item->created_at->diffForHumans() }}</p>
                            </div>
                            <span class="text-sm text-gray-400">{{ $item->waktu }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500">Belum ada aktivitas</p>
                    @endforelse
                </div>
            </div>

        </div>

        

        <footer class="text-center text-gray-500 mt-8">
            © 2026 Smart Quiz Generator. All rights reserved.
        </footer>

    </main>

</div>
<script>
function toggleDropdown() {
    document.getElementById('userDropdown').classList.toggle('hidden');
}

document.addEventListener('click', function(e) {

    let dropdown = document.getElementById('userDropdown');

    if (!e.target.closest('.relative')) {
        dropdown.classList.add('hidden');
    }

});
</script>
</body>
</html>