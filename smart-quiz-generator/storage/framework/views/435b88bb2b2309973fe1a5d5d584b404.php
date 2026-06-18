<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Materi Dosen</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">
<?php
    use Illuminate\Support\Facades\Storage;
?>
<?php
    $materis = \App\Models\Materi::where('dosen', auth()->user()->name)->latest()->get();
?>

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md p-6">
        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 h-auto object-contain">
        </div>

        <nav class="space-y-3">
            <a href="<?php echo e(route('dashboard.dosen')); ?>" class="block px-4 py-3 rounded-xl hover:bg-gray-100">📊 Dashboard</a>
            <a href="<?php echo e(route('dosen.kuis-saya')); ?>" class="block px-4 py-3 rounded-xl hover:bg-gray-100">📝 Kuis Saya</a>
            <a href="<?php echo e(route('dosen.kuis.create')); ?>" class="block px-4 py-3 rounded-xl hover:bg-gray-100">➕ Buat Kuis Baru</a>
            <a href="<?php echo e(route('dosen.materi')); ?>" class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">📄 Materi</a>
<a href="<?php echo e(route('dosen.bank-soal')); ?>"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📚 Bank Soal
<a href="<?php echo e(route('dosen.mahasiswa')); ?>"
   class="block px-4 py-3 rounded-xl hover:bg-gray-100">
   👨‍🎓 Mahasiswa
</a>     </nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Data Materi</h1>
                <p class="text-gray-500 mt-2">Dashboard > Data Materi</p>
                <p class="text-sm mt-4 text-gray-600">
                    Kelola semua materi yang telah diunggah oleh dosen
                </p>
            </div>

            <div class="flex gap-3">

    <a href="<?php echo e(route('dosen.materi.create')); ?>"
    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-xl font-semibold shadow">
    + Upload Materi
</a>

</div>
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            <input type="text" id="searchMateri"
                placeholder="Cari nama materi..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterSemester" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Semester</option>
                <option value="Semester 1">Semester 1</option>
                <option value="Semester 2">Semester 2</option>
                <option value="Semester 3">Semester 3</option>
                <option value="Semester 4">Semester 4</option>
                <option value="Semester 5">Semester 5</option>
                <option value="Semester 6">Semester 6</option>
            </select>

            <button id="resetFilter"
                class="ml-auto border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">
                Reset Filter
            </button>

            <button id="exportPdfBtn"
                class="border px-4 py-2 rounded-xl shadow bg-white hover:bg-gray-100">
                ⬇ EXPORT
            </button>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="p-5">
                <h2 class="font-bold text-lg">Total Materi <?php echo e($materis->count()); ?></h2>
            </div>

            <table class="w-full text-sm" id="materiTable">
                <thead class="bg-gray-100 text-gray-600">
                  <tr>
    <th class="p-4 text-center">No</th>
    <th class="p-4 text-left">Judul Materi</th>
    <th class="p-4 text-left">Dosen</th>
    <th class="p-4 text-left">Prodi</th>
    <th class="p-4 text-left">Semester</th>
    <th class="p-4 text-left">Tanggal Upload</th>
    <th class="p-4 text-left">Ukuran</th>
    <th class="p-4 text-center">Aksi</th>
</tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $materis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $materi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b hover:bg-gray-50 materi-row"
                        data-judul="<?php echo e(strtolower($materi->judul)); ?>"
                        data-semester="<?php echo e(strtolower($materi->semester)); ?>">

                        <td class="p-4 text-center"><?php echo e($index + 1); ?></td>
                        <td class="p-4"><?php echo e($materi->judul); ?></td>
                        <td class="p-4"><?php echo e($materi->dosen); ?></td>
<td class="p-4"><?php echo e($materi->kategori); ?></td>
<td class="p-4"><?php echo e($materi->semester); ?></td>
                        <td class="p-4"><?php echo e($materi->created_at->format('d M Y, H:i')); ?></td>
                        <td class="p-4"><?php echo e($materi->ukuran_file); ?></td>

                       <td class="p-4 text-center">

    <div class="flex justify-center gap-2">

      <a href="<?php echo e(route('dosen.materi.download', $materi->id)); ?>"
    class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded-lg text-sm font-semibold shadow">
    Download
</a>
        <form action="<?php echo e(route('dosen.materi.delete', $materi->id)); ?>"   
            method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>

            <button type="submit"
                onclick="return confirm('Yakin ingin menghapus materi ini?')"
                class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded-lg text-sm font-semibold shadow">

                Hapus

            </button>

        </form>

    </div>

</td>
</td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">
                            Belum ada materi untuk dosen ini.
                        </td>
                    </tr>
                    <?php endif; ?>
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
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let search = searchMateri.value.toLowerCase();
    let semester = filterSemester.value.toLowerCase();

    document.querySelectorAll('.materi-row').forEach(row => {
        let judul = row.dataset.judul;
        let rowSemester = row.dataset.semester;

        let matchSearch = judul.includes(search);
        let matchSemester = semester === '' || rowSemester === semester;

        row.style.display = matchSearch && matchSemester ? '' : 'none';
    });
}

searchMateri.addEventListener('keyup', filterTable);
filterSemester.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchMateri.value = '';
    filterSemester.value = '';
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
                body { font-family: Arial; padding: 20px; }
                h2 { text-align: center; }
                table { width: 100%; border-collapse: collapse; font-size: 12px; }
                th, td { border: 1px solid #ddd; padding: 8px; }
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
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/dosen/materi-dosen.blade.php ENDPATH**/ ?>