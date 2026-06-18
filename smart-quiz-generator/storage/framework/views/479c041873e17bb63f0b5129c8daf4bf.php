<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kuis Saya</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<?php
    $kuiss = \App\Models\Kuis::where('dosen', auth()->user()->name)->latest()->get();
?>

<div class="flex min-h-screen">

    <aside class="w-64 bg-white shadow-md p-6">
        <div class="mb-10">
        <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
            class="w-40 h-auto object-contain">
    </div>
        

        <nav class="space-y-3">

    <a href="<?php echo e(route('dashboard.dosen')); ?>"
        class="block px-4 py-3 rounded-xl hover:bg-gray-100">
        📊 Dashboard
    </a>

    <a href="<?php echo e(route('dosen.kuis-saya')); ?>"
                class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
        📝 Kuis Saya
    </a>

    <a href="<?php echo e(route('dosen.kuis.create')); ?>"
        class="block px-4 py-3 rounded-xl hover:bg-gray-100">
        ➕ Buat Kuis Baru
    </a>

    <a href="<?php echo e(route('dosen.materi')); ?>"
        class="block px-4 py-3 rounded-xl hover:bg-gray-100">
        📄 Materi
    </a>

    <a href="<?php echo e(route('dosen.bank-soal')); ?>"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📚 Bank Soal
</a>

    <a href="<?php echo e(route('dosen.mahasiswa')); ?>"
   class="block px-4 py-3 rounded-xl hover:bg-gray-100">
   👨‍🎓 Mahasiswa
</a>

</nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold">Kuis Saya</h1>
                <p class="text-gray-500 mt-2">
                    Kelola semua kuis yang dibuat oleh <?php echo e(auth()->user()->name); ?>

                </p>
            </div>

            
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            <input type="text"
                id="searchKuis"
                placeholder="Cari kuis..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterKesulitan"
                class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Tingkat</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
            </select>

            <button id="resetFilter"
                class="ml-auto border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">
                Reset Filter
            </button>

            <button id="exportPdfBtn"
                class="border px-4 py-2 rounded-xl shadow bg-white hover:bg-gray-100">
                ⬇ Export PDF
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="flex justify-between items-center p-5">
                <h2 class="font-bold text-lg">
                    Total Kuis Saya <?php echo e($kuiss->count()); ?>

                </h2>
            </div>

            <table class="w-full text-sm" id="kuisTable">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Judul Kuis</th>
                        <th class="p-4 text-left">Dosen</th>
                        <th class="p-4 text-left">Jumlah Soal</th>
                        <th class="p-4 text-left">Tingkat</th>
                        <th class="p-4 text-left">Tanggal Dibuat</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $kuiss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $kuis): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b hover:bg-gray-50 kuis-row"
                        data-judul="<?php echo e(strtolower($kuis->judul_kuis)); ?>"
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

                               
                                <form action="<?php echo e(route('dosen.kuis.delete', $kuis->id)); ?>"
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

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="7" class="p-6 text-center text-gray-500">
                            Belum ada kuis untuk dosen ini.
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
const searchKuis = document.getElementById('searchKuis');
const filterKesulitan = document.getElementById('filterKesulitan');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let search = searchKuis.value.toLowerCase();
    let kesulitan = filterKesulitan.value.toLowerCase();

    document.querySelectorAll('.kuis-row').forEach(row => {
        let judul = row.dataset.judul;
        let tingkat = row.dataset.kesulitan;

        let matchSearch = judul.includes(search);
        let matchKesulitan = kesulitan === '' || tingkat === kesulitan;

        row.style.display = matchSearch && matchKesulitan ? '' : 'none';
    });
}

searchKuis.addEventListener('keyup', filterTable);
filterKesulitan.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchKuis.value = '';
    filterKesulitan.value = '';
    filterTable();
});

document.getElementById('exportPdfBtn').addEventListener('click', function () {
    let table = document.getElementById('kuisTable').outerHTML;

    let printWindow = window.open('', '', 'width=1200,height=700');

    printWindow.document.write(`
        <html>
        <head>
            <title>Kuis Saya</title>
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
            <h2>Kuis Saya - <?php echo e(auth()->user()->name); ?></h2>
            ${table}
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.print();
});
</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/dosen/kuis-saya.blade.php ENDPATH**/ ?>