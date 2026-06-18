<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kuis</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<?php
    $kuiss = \App\Models\Kuis::latest()->get();
    $dosens = \App\Models\Kuis::select('dosen')->distinct()->get();
?>

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md p-6">
        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 h-auto object-contain">
        </div>

        <nav class="space-y-3">
            <a href="/dashboard" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📊 Dashboard</a>
            <a href="<?php echo e(route('users.index')); ?>" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👤 Data User</a>
            <a href="<?php echo e(route('dosen.index')); ?>" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">🎓 Data Dosen</a>
            <a href="<?php echo e(route('mahasiswa.index')); ?>" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">👨‍🎓 Data Mahasiswa</a>
            <a href="<?php echo e(route('materi.index')); ?>" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📄 Data Materi</a>
            <a href="<?php echo e(route('kuis.index')); ?>" class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">📝 Data Kuis</a>
            <a href="<?php echo e(route('hasilkuis.index')); ?>" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📊 Data Bank Soal</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold">Data Kuis</h1>
                <p class="text-gray-500 mt-2">Dashboard > Data Kuis</p>
                <p class="text-sm mt-4 text-gray-600">
                    Kelola semua kuis pada sistem Smart Quiz Generator
                </p>
            </div>

           <a href="<?php echo e(route('kuis.add')); ?>"
    class="bg-purple-600 text-white px-4 py-2 rounded-xl">
    + Tambah Kuis
</a>
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            <input type="text"
                id="searchKuis"
                placeholder="Cari kuis atau dosen..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterKesulitan" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Tingkat</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
            </select>

            <select id="filterDosen" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Dosen</option>
                <?php $__currentLoopData = $dosens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($d->dosen); ?>"><?php echo e($d->dosen); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>

            <button id="resetFilter"
                class="ml-auto border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">
                Reset Filter
            </button>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="flex justify-between items-center p-5">
                <h2 class="font-bold text-lg">
                    Total Kuis <?php echo e($kuiss->count()); ?>

                </h2>

                <button id="exportPdfBtn"
                    class="border px-4 py-2 rounded-xl shadow bg-white hover:bg-gray-100">
                    ⬇ EXPORT PDF
                </button>
            </div>

            <table class="w-full text-sm" id="kuisTable">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Judul Kuis</th>
                        <th class="p-4 text-left">Dosen</th>
                        <th class="p-4 text-left">Jumlah Soal</th>
                        <th class="p-4 text-left">Tingkat Kesulitan</th>
                        <th class="p-4 text-left">Tanggal Dibuat</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $kuiss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $kuis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b hover:bg-gray-50 kuis-row"
                        data-judul="<?php echo e(strtolower($kuis->judul_kuis)); ?>"
                        data-dosen="<?php echo e(strtolower($kuis->dosen)); ?>"
                        data-kesulitan="<?php echo e(strtolower($kuis->tingkat_kesulitan)); ?>">

                        <td class="p-4 text-center"><?php echo e($index + 1); ?></td>

                        <td class="p-4"><?php echo e($kuis->judul_kuis); ?></td>

                        <td class="p-4"><?php echo e($kuis->dosen); ?></td>

                        <td class="p-4"><?php echo e($kuis->jumlah_soal); ?></td>

                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                <?php echo e(strtolower($kuis->tingkat_kesulitan) == 'mudah'
                                    ? 'bg-green-100 text-green-700'
                                    : (strtolower($kuis->tingkat_kesulitan) == 'sedang'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-red-100 text-red-700')); ?>">
                                <?php echo e(ucfirst($kuis->tingkat_kesulitan)); ?>

                            </span>
                        </td>

                        <td class="p-4"><?php echo e($kuis->created_at->format('d M Y, H:i')); ?></td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-3 items-center">

                                <a href="<?php echo e(route('kuis.generate', $kuis->id)); ?>"
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-1 rounded-lg text-xs font-semibold">
                                    Generate
                                </a>

                               

                                <form action="<?php echo e(route('kuis.delete', $kuis->id)); ?>"
                                    method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus kuis ini?')"
                                        class="text-red-600 text-lg">
                                        🗑️
                                    </button>
                                </form>

                            </div>
                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>

        <footer class="text-center text-gray-500 mt-8">
            © 2026 Smart Quiz Generator. All rights reserved.
        </footer>

    </main>
</div>

<script>
const searchKuis = document.getElementById('searchKuis');
const filterKesulitan = document.getElementById('filterKesulitan');
const filterDosen = document.getElementById('filterDosen');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let search = searchKuis.value.toLowerCase();
    let kesulitan = filterKesulitan.value.toLowerCase();
    let dosen = filterDosen.value.toLowerCase();

    document.querySelectorAll('.kuis-row').forEach(row => {
        let judulRow = row.dataset.judul;
        let dosenRow = row.dataset.dosen;
        let kesulitanRow = row.dataset.kesulitan;

        let matchSearch =
            judulRow.includes(search) ||
            dosenRow.includes(search);

        let matchKesulitan =
            kesulitan === '' || kesulitanRow === kesulitan;

        let matchDosen =
            dosen === '' || dosenRow === dosen;

        row.style.display =
            matchSearch && matchKesulitan && matchDosen
                ? ''
                : 'none';
    });
}

searchKuis.addEventListener('keyup', filterTable);
filterKesulitan.addEventListener('change', filterTable);
filterDosen.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchKuis.value = '';
    filterKesulitan.value = '';
    filterDosen.value = '';
    filterTable();
});

document.getElementById('exportPdfBtn').addEventListener('click', function () {
    let table = document.getElementById('kuisTable').outerHTML;

    let printWindow = window.open('', '', 'width=1200,height=700');

    printWindow.document.write(`
        <html>
        <head>
            <title>Data Kuis</title>
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
            <h2>Data Kuis</h2>
            ${table}
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.print();
});
</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/data/kuis.blade.php ENDPATH**/ ?>