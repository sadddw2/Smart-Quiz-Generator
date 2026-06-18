<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Bank Soal</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<?php
    $soals = \App\Models\Soal::latest()->get();
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
            <a href="<?php echo e(route('kuis.index')); ?>" class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">📝 Data Kuis</a>
            <a href="<?php echo e(route('hasilkuis.index')); ?>" class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">📊 Data Bank Soal</a>
        </nav>
    </aside>

    <main class="flex-1 p-8">

        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold">Data Bank Soal</h1>
                <p class="text-gray-500 mt-2">Dashboard > Data Bank Soal</p>
                <p class="text-sm mt-4 text-gray-600">Kelola semua soal hasil generate dari materi PDF</p>
            </div>

            <button id="exportPdfBtn"
                class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-xl font-semibold shadow">
                ⬇ Export PDF
            </button>
        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            <input type="text"
                id="searchSoal"
                placeholder="Cari pertanyaan..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterKesulitan" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Kesulitan</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>
            </select>

            <select id="filterJawaban" class="rounded-xl border-gray-300 px-4 py-2">
                <option value="">Semua Jawaban</option>
                <option value="A">Jawaban A</option>
                <option value="B">Jawaban B</option>
                <option value="C">Jawaban C</option>
                <option value="D">Jawaban D</option>
            </select>

            <button id="resetFilter"
                class="ml-auto border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">
                Reset Filter
            </button>

        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="flex justify-between items-center p-5">
                <h2 class="font-bold text-lg">
                    Total Soal <?php echo e($soals->count()); ?>

                </h2>
            </div>

            <table class="w-full text-sm" id="soalTable">
                <thead class="bg-gray-100 text-gray-600">
                    <tr>
                        <th class="p-4 text-center">No</th>
                        
                        <th class="p-4 text-left">Pertanyaan</th>
                        <th class="p-4 text-left">Pilihan A</th>
                        <th class="p-4 text-left">Pilihan B</th>
                        <th class="p-4 text-left">Pilihan C</th>
                        <th class="p-4 text-left">Pilihan D</th>
                        <th class="p-4 text-left">Jawaban Benar</th>
                        <th class="p-4 text-left">Kesulitan</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b hover:bg-gray-50 soal-row"
                        data-pertanyaan="<?php echo e(strtolower($soal->pertanyaan)); ?>"
                        data-jawaban="<?php echo e(strtoupper($soal->jawaban_benar)); ?>"
                        data-kesulitan="<?php echo e(strtolower($soal->kesulitan)); ?>">

                        <td class="p-4 text-center"><?php echo e($index + 1); ?></td>

                        

                        <td class="p-4 max-w-xs">
                            <?php echo e(Str::limit($soal->pertanyaan, 80)); ?>

                        </td>

                        <td class="p-4"><?php echo e(Str::limit($soal->pilihan_a, 40)); ?></td>
                        <td class="p-4"><?php echo e(Str::limit($soal->pilihan_b, 40)); ?></td>
                        <td class="p-4"><?php echo e(Str::limit($soal->pilihan_c, 40)); ?></td>
                        <td class="p-4"><?php echo e(Str::limit($soal->pilihan_d, 40)); ?></td>

                        <td class="p-4 font-bold text-purple-700">
                            <?php echo e($soal->jawaban_benar); ?>

                        </td>

                        <td class="p-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold
                                <?php echo e(strtolower($soal->kesulitan) == 'mudah'
                                    ? 'bg-green-100 text-green-700'
                                    : (strtolower($soal->kesulitan) == 'sedang'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-red-100 text-red-700')); ?>">
                                <?php echo e(ucfirst($soal->kesulitan)); ?>

                            </span>
                        </td>

                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-3">

                                <button type="button"
                                    onclick="lihatSoal(
                                        `<?php echo e(addslashes($soal->pertanyaan)); ?>`,
                                        `<?php echo e(addslashes($soal->pilihan_a)); ?>`,
                                        `<?php echo e(addslashes($soal->pilihan_b)); ?>`,
                                        `<?php echo e(addslashes($soal->pilihan_c)); ?>`,
                                        `<?php echo e(addslashes($soal->pilihan_d)); ?>`,
                                        `<?php echo e($soal->jawaban_benar); ?>`,
                                        `<?php echo e($soal->kesulitan); ?>`
                                    )"
                                    class="text-black text-lg">
                                    👁️
                                </button>

                                <form action="<?php echo e(route('soal.delete', $soal->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button type="submit"
                                        onclick="return confirm('Yakin hapus soal ini?')"
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

<div id="modalSoal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow p-6 w-[700px] max-w-full">
        <h2 class="text-xl font-bold mb-4">Detail Soal</h2>

        <div id="isiModal" class="space-y-3 text-sm"></div>

        <button onclick="tutupModal()"
            class="mt-6 bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-xl">
            Tutup
        </button>
    </div>
</div>

<script>
const searchSoal = document.getElementById('searchSoal');
const filterKesulitan = document.getElementById('filterKesulitan');
const filterJawaban = document.getElementById('filterJawaban');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {
    let search = searchSoal.value.toLowerCase();
    let kesulitan = filterKesulitan.value.toLowerCase();
    let jawaban = filterJawaban.value.toUpperCase();

    document.querySelectorAll('.soal-row').forEach(row => {
        let pertanyaanRow = row.dataset.pertanyaan;
        let kesulitanRow = row.dataset.kesulitan;
        let jawabanRow = row.dataset.jawaban;

        let matchSearch = pertanyaanRow.includes(search);
        let matchKesulitan = kesulitan === '' || kesulitanRow === kesulitan;
        let matchJawaban = jawaban === '' || jawabanRow === jawaban;

        row.style.display = matchSearch && matchKesulitan && matchJawaban ? '' : 'none';
    });
}

searchSoal.addEventListener('keyup', filterTable);
filterKesulitan.addEventListener('change', filterTable);
filterJawaban.addEventListener('change', filterTable);

resetFilter.addEventListener('click', function () {
    searchSoal.value = '';
    filterKesulitan.value = '';
    filterJawaban.value = '';
    filterTable();
});

function lihatSoal(pertanyaan, a, b, c, d, jawaban, kesulitan) {
    document.getElementById('isiModal').innerHTML = `
        <p><b>Pertanyaan:</b><br>${pertanyaan}</p>
        <p><b>A.</b> ${a}</p>
        <p><b>B.</b> ${b}</p>
        <p><b>C.</b> ${c}</p>
        <p><b>D.</b> ${d}</p>
        <p><b>Jawaban Benar:</b> ${jawaban}</p>
        <p><b>Kesulitan:</b> ${kesulitan}</p>
    `;

    document.getElementById('modalSoal').classList.remove('hidden');
}

function tutupModal() {
    document.getElementById('modalSoal').classList.add('hidden');
}

document.getElementById('exportPdfBtn').addEventListener('click', function () {
    let table = document.getElementById('soalTable').outerHTML;

    let printWindow = window.open('', '', 'width=1400,height=800');

    printWindow.document.write(`
        <html>
        <head>
            <title>Data Bank Soal</title>
            <style>
                body { font-family: Arial, sans-serif; padding: 20px; }
                h2 { text-align: center; margin-bottom: 20px; }
                table { width: 100%; border-collapse: collapse; font-size: 10px; }
                th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
                th { background: #f3f4f6; }
                a, button, form { display: none; }
            </style>
        </head>
        <body>
            <h2>Data Bank Soal</h2>
            ${table}
        </body>
        </html>
    `);

    printWindow.document.close();
    printWindow.print();
});
</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/data/hasilkuis.blade.php ENDPATH**/ ?>