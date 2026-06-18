<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Dosen</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

@php
    $dosens = \App\Models\User::where('role', 'dosen')->latest()->get();
@endphp

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md p-6">

        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 h-auto object-contain">
        </div>

        <nav class="space-y-3">
            <a href="/dashboard" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📊 Dashboard</a>
            <a href="{{ route('users.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👤 Data User</a>
            <a href="{{ route('dosen.index') }}" class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">🎓 Data Dosen</a>
            <a href="{{ route('mahasiswa.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👨‍🎓 Data Mahasiswa</a>
            <a href="{{ route('materi.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📄 Data Materi</a>
            <a href="{{ route('kuis.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📝 Data Kuis</a>
            <a href="{{ route('hasilkuis.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📊 Data Bank Soal</a>
        </nav>

    </aside>

    <main class="flex-1 p-8">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold">Data Dosen</h1>
                <p class="text-gray-500 mt-2">Dashboard > Data Dosen</p>
                <p class="text-sm mt-4 text-gray-600">
                    Kelola semua akun dosen pada sistem Smart Quiz Generator
                </p>
            </div>

           
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

      

            <button id="exportPdfBtn"
                class="ml-auto border px-4 py-2 rounded-xl shadow bg-white hover:bg-gray-100">
                ⬇ EXPORT PDF
            </button>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="flex justify-between items-center p-5">
                <h2 class="font-bold text-lg">
                    Total Dosen {{ $dosens->count() }}
                </h2>
            </div>

            <table class="w-full text-sm" id="dosenTable">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Nama</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Tanggal Daftar</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($dosens as $index => $dosen)

                    <tr class="border-b hover:bg-gray-50 dosen-row"
                        data-name="{{ strtolower($dosen->name) }}"
                        data-email="{{ strtolower($dosen->email) }}"
                        data-status="{{ trim(strtolower($dosen->status ?? 'aktif')) }}">

                        <td class="p-4 text-center">{{ $index + 1 }}</td>

                        <td class="p-4">{{ $dosen->name }}</td>

                        <td class="p-4">{{ $dosen->email }}</td>

                        <td class="p-4">
    @php
        $status = strtolower($dosen->status ?? 'nonaktif');
    @endphp

    <span class="px-3 py-1 rounded-full text-xs font-semibold
        {{ $status == 'aktif'
            ? 'bg-green-100 text-green-700'
            : 'bg-red-100 text-red-700' }}">

        {{ ucfirst($status) }}

    </span>
</td>

                        <td class="p-4">
                            {{ $dosen->created_at->format('d M Y, H:i') }}
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-3">
                                <a href="{{ route('users.edit', $dosen->id) }}" class="text-black text-lg">✏️</a>

                                <form action="{{ route('users.delete', $dosen->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button onclick="return confirm('Yakin hapus dosen ini?')"
                                        class="text-red-600 text-lg">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>

                    @endforeach
                </tbody>

            </table>

        </div>

        <footer class="text-center text-gray-500 mt-8">
            © 2026 Smart Quiz Generator. All rights reserved.
        </footer>

    </main>

</div>

<script>
const searchDosen = document.getElementById('searchDosen');
const filterStatus = document.getElementById('filterStatus');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let searchValue = searchDosen.value.toLowerCase();
    let statusValue = filterStatus.value.toLowerCase();

    let rows = document.querySelectorAll('.dosen-row');

    rows.forEach(row => {
        let name = row.dataset.name;
        let email = row.dataset.email;
        let status = row.dataset.status;

        let matchSearch =
            name.includes(searchValue) ||
            email.includes(searchValue);

        let matchStatus =
            statusValue === '' || status === statusValue;

        if (matchSearch && matchStatus) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }
    });
}

searchDosen.addEventListener('keyup', filterTable);
filterStatus.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchDosen.value = '';
    filterStatus.value = '';
    filterTable();
});

document.getElementById('exportPdfBtn').addEventListener('click', function () {
    let table = document.getElementById('dosenTable').outerHTML;

    let printWindow = window.open('', '', 'width=1000,height=700');

    printWindow.document.write(`
        <html>
        <head>
            <title>Data Dosen</title>
            <style>
                body { font-family: Arial, sans-serif; padding: 20px; }
                h2 { text-align: center; margin-bottom: 20px; }
                table { width: 100%; border-collapse: collapse; font-size: 12px; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background: #f3f4f6; }
                a, button, form { display: none; }
            </style>
        </head>
        <body>
            <h2>Data Dosen</h2>
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