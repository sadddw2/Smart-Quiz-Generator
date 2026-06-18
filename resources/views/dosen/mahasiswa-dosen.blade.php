<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Kuis Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

@php
    $hasilKuis = \App\Models\HasilKuis::latest()->get();
@endphp

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md p-6">
        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 h-auto object-contain">
        </div>

        <nav class="space-y-3">
            <a href="{{ route('dashboard.dosen') }}" class="block px-4 py-3 rounded-xl hover:bg-gray-100">📊 Dashboard</a>
            <a href="{{ route('dosen.kuis-saya') }}" class="block px-4 py-3 rounded-xl hover:bg-gray-100">📝 Kuis Saya</a>
            <a href="{{ route('dosen.kuis.create') }}" class="block px-4 py-3 rounded-xl hover:bg-gray-100">➕ Buat Kuis Baru</a>
            <a href="{{ route('dosen.materi') }}" class="block px-4 py-3 rounded-xl hover:bg-gray-100">📄 Materi</a>
            <a href="{{ route('dosen.bank-soal') }}" class="block px-4 py-3 rounded-xl hover:bg-gray-100">📚 Bank Soal</a>
            <a href="{{ route('dosen.mahasiswa') }}" class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">👨‍🎓 Mahasiswa</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Hasil Kuis Mahasiswa</h1>
                <p class="text-gray-500 mt-2">Pantau nilai mahasiswa dari tabel hasil_kuis</p>
            </div>

            <div class="bg-white shadow px-5 py-3 rounded-xl flex items-center gap-3">
                👤
                <div>
                    <p class="font-bold">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->role) }}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">
            <div class="bg-white rounded-2xl shadow p-5">
                <div class="text-3xl mb-2">📊</div>
                <p class="text-sm text-gray-500">Total Hasil</p>
                <h3 class="text-2xl font-bold">{{ $hasilKuis->count() }}</h3>
            </div>

            <div class="bg-white rounded-2xl shadow p-5">
                <div class="text-3xl mb-2">✅</div>
                <p class="text-sm text-gray-500">Lulus</p>
                <h3 class="text-2xl font-bold">{{ $hasilKuis->where('status', 'lulus')->count() }}</h3>
            </div>

            <div class="bg-white rounded-2xl shadow p-5">
                <div class="text-3xl mb-2">❌</div>
                <p class="text-sm text-gray-500">Tidak Lulus</p>
                <h3 class="text-2xl font-bold">{{ $hasilKuis->where('status', 'tidak_lulus')->count() }}</h3>
            </div>

            <div class="bg-white rounded-2xl shadow p-5">
                <div class="text-3xl mb-2">⭐</div>
                <p class="text-sm text-gray-500">Rata-rata Nilai</p>
                <h3 class="text-2xl font-bold">{{ round($hasilKuis->avg('nilai') ?? 0) }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">
            <input type="text"
                id="searchHasil"
                placeholder="Cari mahasiswa / mata kuliah / status..."
                class="w-80 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterStatus" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Status</option>
                <option value="lulus">Lulus</option>
                <option value="tidak_lulus">Tidak Lulus</option>
            </select>

            <button id="resetFilter"
                class="ml-auto border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">
                Reset Filter
            </button>

            <button id="exportPdfBtn"
                class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-xl shadow">
                Export PDF
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <table class="w-full text-sm" id="hasilKuisTable">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">ID</th>
                        <th class="p-4 text-left">Nama Mahasiswa</th>
                        <th class="p-4 text-left">Kuis ID</th>
                        <th class="p-4 text-left">Mata Kuliah</th>
                        <th class="p-4 text-left">Jumlah Benar</th>
                        <th class="p-4 text-left">Jumlah Salah</th>
                        <th class="p-4 text-left">Nilai</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Created At</th>
                        <th class="p-4 text-left">Updated At</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($hasilKuis as $hasil)
                        <tr class="border-b hover:bg-gray-50 hasil-row"
                            data-search="{{ strtolower(($hasil->nama_mahasiswa ?? '') . ' ' . ($hasil->mata_kuliah ?? '') . ' ' . $hasil->status) }}"
                            data-status="{{ strtolower($hasil->status) }}">

                            <td class="p-4 text-center">{{ $hasil->id }}</td>
                            <td class="p-4">{{ $hasil->nama_mahasiswa ?? '-' }}</td>
                            <td class="p-4">{{ $hasil->kuis_id }}</td>
                            <td class="p-4">{{ $hasil->mata_kuliah ?? '-' }}</td>
                            <td class="p-4">{{ $hasil->jumlah_benar }}</td>
                            <td class="p-4">{{ $hasil->jumlah_salah }}</td>
                            <td class="p-4 font-bold">{{ $hasil->nilai }}</td>

                            <td class="p-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $hasil->status == 'lulus'
                                        ? 'bg-green-100 text-green-700'
                                        : 'bg-red-100 text-red-700' }}">
                                    {{ ucfirst(str_replace('_', ' ', $hasil->status)) }}
                                </span>
                            </td>

                            <td class="p-4">{{ $hasil->created_at }}</td>
                            <td class="p-4">{{ $hasil->updated_at }}</td>

                            <td class="p-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <button type="button"
                                        onclick="lihatHasil(
                                            '{{ $hasil->id }}',
                                            '{{ addslashes($hasil->nama_mahasiswa ?? '-') }}',
                                            '{{ $hasil->kuis_id }}',
                                            '{{ addslashes($hasil->mata_kuliah ?? '-') }}',
                                            '{{ $hasil->jumlah_benar }}',
                                            '{{ $hasil->jumlah_salah }}',
                                            '{{ $hasil->nilai }}',
                                            '{{ $hasil->status }}'
                                        )"
                                        class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg text-xs">
                                        Detail
                                    </button>

                                    <form action="{{ route('hasilkuis.delete', $hasil->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                            onclick="return confirm('Yakin hapus hasil kuis ini?')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="p-6 text-center text-gray-500">
                                Belum ada data hasil kuis.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

        <footer class="text-center text-gray-500 mt-8">
            © 2026 Smart Quiz Generator. All rights reserved.
        </footer>

    </main>
</div>

<div id="modalHasil" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow p-6 w-[500px] max-w-full">
        <h2 class="text-xl font-bold mb-4">Detail Hasil Kuis</h2>

        <div id="isiModal" class="space-y-2 text-sm"></div>

        <button onclick="tutupModal()"
            class="mt-6 bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-xl">
            Tutup
        </button>
    </div>
</div>

<script>
const searchHasil = document.getElementById('searchHasil');
const filterStatus = document.getElementById('filterStatus');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let search = searchHasil.value.toLowerCase();
    let status = filterStatus.value.toLowerCase();

    document.querySelectorAll('.hasil-row').forEach(row => {
        let rowSearch = row.dataset.search;
        let rowStatus = row.dataset.status;

        let matchSearch = rowSearch.includes(search);
        let matchStatus = status === '' || rowStatus === status;

        row.style.display = matchSearch && matchStatus ? '' : 'none';
    });
}

searchHasil.addEventListener('keyup', filterTable);
filterStatus.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchHasil.value = '';
    filterStatus.value = '';
    filterTable();
});

function lihatHasil(id, mahasiswa, kuisId, mataKuliah, benar, salah, nilai, status) {
    document.getElementById('isiModal').innerHTML = `
        <p><b>ID:</b> ${id}</p>
        <p><b>Mahasiswa:</b> ${mahasiswa}</p>
        <p><b>Kuis ID:</b> ${kuisId}</p>
        <p><b>Mata Kuliah:</b> ${mataKuliah}</p>
        <p><b>Jumlah Benar:</b> ${benar}</p>
        <p><b>Jumlah Salah:</b> ${salah}</p>
        <p><b>Nilai:</b> ${nilai}</p>
        <p><b>Status:</b> ${status}</p>
    `;

    document.getElementById('modalHasil').classList.remove('hidden');
}

function tutupModal() {
    document.getElementById('modalHasil').classList.add('hidden');
}

document.getElementById('exportPdfBtn').addEventListener('click', function () {
    let table = document.getElementById('hasilKuisTable').outerHTML;
    let printWindow = window.open('', '', 'width=1400,height=800');

    printWindow.document.write(`
        <html>
        <head>
            <title>Data Hasil Kuis</title>
            <style>
                body { font-family: Arial; padding: 20px; }
                h2 { text-align: center; }
                table { width: 100%; border-collapse: collapse; font-size: 11px; }
                th, td { border: 1px solid #ddd; padding: 6px; }
                th { background: #f3f4f6; }
                button, form { display: none; }
            </style>
        </head>
        <body>
            <h2>Data Hasil Kuis</h2>
            ${table}
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.print();
});
</script>

</body>
</html>