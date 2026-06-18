<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Materi</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

@php
    $materis = \App\Models\Materi::latest()->get();
    $dosens = \App\Models\Materi::select('dosen')->distinct()->get();
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
            <a href="{{ route('dosen.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">🎓 Data Dosen</a>
            <a href="{{ route('mahasiswa.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👨‍🎓 Data Mahasiswa</a>
            <a href="{{ route('materi.index') }}" class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">📄 Data Materi</a>
            <a href="{{ route('kuis.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📝 Data Kuis</a>
            <a href="{{ route('hasilkuis.index') }}" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📊 Data Bank Soal</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold">Data Materi</h1>
                <p class="text-gray-500 mt-2">Dashboard > Data Materi</p>
                <p class="text-sm mt-4 text-gray-600">
                    Kelola semua file materi PDF pada sistem Smart Quiz Generator
                </p>
            </div>

            <a href="{{ route('materi.create') }}"
                class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-xl font-semibold shadow">
                + Upload Materi
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            <input type="text"
                id="searchMateri"
                placeholder="Cari judul materi atau dosen..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterSemester" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Semester</option>
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
                <option value="Semester 5">Semester 5</option>
                <option value="Semester 6">Semester 6</option>
                <option value="Semester 7">Semester 7</option>
                <option value="Semester 8">Semester 8</option>
            </select>

            <select id="filterDosen" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Dosen</option>
                @foreach($dosens as $d)
                    <option value="{{ $d->dosen }}">{{ $d->dosen }}</option>
                @endforeach
            </select>

            <button id="resetFilter"
                class="ml-auto border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">
                Reset Filter
            </button>

            <button id="exportPdfBtn"
                class="border px-4 py-2 rounded-xl shadow bg-white hover:bg-gray-100">
                ⬇ EXPORT PDF
            </button>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="flex justify-between items-center p-5">
                <h2 class="font-bold text-lg">
                    Total Materi {{ $materis->count() }}
                </h2>
            </div>

            <table class="w-full text-sm" id="materiTable">

                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Judul Materi</th>
                        <th class="p-4 text-left">Dosen</th>
                        <th class="p-4 text-left">Semester</th>
                        <th class="p-4 text-left">Ukuran File</th>
                        <th class="p-4 text-left">Tanggal Upload</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($materis as $index => $materi)

                    <tr class="border-b hover:bg-gray-50 materi-row"
                        data-judul="{{ strtolower($materi->judul) }}"
                        data-dosen="{{ strtolower($materi->dosen) }}"
                        data-semester="{{ strtolower($materi->semester) }}">

                        <td class="p-4 text-center">{{ $index + 1 }}</td>

                        <td class="p-4">{{ $materi->judul }}</td>

                        <td class="p-4">{{ $materi->dosen }}</td>

                        <td class="p-4">{{ $materi->semester }}</td>

                        <td class="p-4">{{ $materi->ukuran_file }}</td>

                        <td class="p-4">{{ $materi->created_at->format('d M Y, H:i') }}</td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-3 items-center">

                                

                                
                                <form action="{{ route('materi.delete', $materi->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus materi ini?')"
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
const searchMateri = document.getElementById('searchMateri');
const filterSemester = document.getElementById('filterSemester');
const filterDosen = document.getElementById('filterDosen');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let search = searchMateri.value.toLowerCase();
    let semester = filterSemester.value.toLowerCase();
    let dosen = filterDosen.value.toLowerCase();

    let rows = document.querySelectorAll('.materi-row');

    rows.forEach(row => {
        let judulRow = row.dataset.judul;
        let dosenRow = row.dataset.dosen;
        let semesterRow = row.dataset.semester;

        let matchSearch =
            judulRow.includes(search) ||
            dosenRow.includes(search);

        let matchSemester =
            semester === '' || semesterRow === semester;

        let matchDosen =
            dosen === '' || dosenRow === dosen;

        row.style.display =
            matchSearch && matchSemester && matchDosen
                ? ''
                : 'none';
    });
}

searchMateri.addEventListener('keyup', filterTable);
filterSemester.addEventListener('change', filterTable);
filterDosen.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchMateri.value = '';
    filterSemester.value = '';
    filterDosen.value = '';
    filterTable();
});

document.getElementById('exportPdfBtn').addEventListener('click', function () {
    let table = document.getElementById('materiTable').outerHTML;

    let printWindow = window.open('', '', 'width=1200,height=700');

    printWindow.document.write(`
        <html>
        <head>
            <title>Data Materi</title>
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
            <h2>Data Materi</h2>
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