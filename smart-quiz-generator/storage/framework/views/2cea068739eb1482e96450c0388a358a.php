<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bank Soal Dosen</title>
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

            <a href="<?php echo e(route('dashboard.dosen')); ?>"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Dashboard
            </a>

            <a href="<?php echo e(route('dosen.kuis-saya')); ?>"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
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
                class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
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
                <h1 class="text-3xl font-bold">Bank Soal</h1>
                <p class="text-gray-500 mt-2">
                    Kelola semua soal yang Anda miliki.
                </p>
            </div>

            <div class="flex items-center gap-4">

                <div class="bg-white shadow px-5 py-3 rounded-xl flex items-center gap-3">
                    👤
                    <div>
                        <p class="font-bold"><?php echo e(auth()->user()->name); ?></p>
                        <p class="text-xs text-gray-500"><?php echo e(ucfirst(auth()->user()->role)); ?></p>
                    </div>
                </div>

                <a href="<?php echo e(route('dosen.kuis.create')); ?>"
                    class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-xl font-semibold shadow">
                    + Buat Soal Baru
                </a>

            </div>

        </div>

        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            <input type="text"
                id="searchSoal"
                placeholder="Cari Kuis / Soal..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            <select id="filterKesulitan"
                class="rounded-xl border-gray-300 px-4 py-2">

                <option value="">Semua Tingkat Kesulitan</option>
                <option value="mudah">Mudah</option>
                <option value="sedang">Sedang</option>
                <option value="sulit">Sulit</option>

            </select>

            <select id="filterJawaban"
                class="rounded-xl border-gray-300 px-4 py-2">

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

            <div class="p-5">
                <h2 class="font-bold text-lg">
                    Total Soal <?php echo e($soals->count()); ?>

                </h2>
            </div>

            <table class="w-full text-sm" id="soalTable">

                <thead class="bg-gray-100 text-gray-600">

                    <tr>
                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Soal</th>

<th class="p-4 text-left">Mata Kuliah</th>

<th class="p-4 text-left">Tipe Soal</th>
                        <th class="p-4 text-left">Tingkat Kesulitan</th>
                        <th class="p-4 text-left">Tanggal Daftar</th>
                        
                        <th class="p-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b hover:bg-gray-50 soal-row"
                        data-soal="<?php echo e(strtolower($soal->pertanyaan)); ?>"
                        data-kesulitan="<?php echo e(strtolower($soal->kesulitan)); ?>"
                        data-jawaban="<?php echo e(strtoupper($soal->jawaban_benar)); ?>">

                        <td class="p-4 text-center">
                            <?php echo e($index + 1); ?>

                        </td>

                        <td class="p-4 max-w-md">
    <?php echo e(Str::limit($soal->pertanyaan, 80)); ?>

</td>

<td class="p-4">
    <?php echo e($soal->matkul); ?>

</td>

<td class="p-4">
    Pilihan Ganda
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

                        <td class="p-4">
                            <?php echo e($soal->created_at->format('d M Y, H:i')); ?>

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

                                <form action="<?php echo e(route('dosen.soal.delete', $soal->id)); ?>"
                                    method="POST">

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

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
<td colspan="9" class="p-6 text-center text-gray-500">
                                Belum ada soal.
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

<div id="modalSoal"
    class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">

    <div class="bg-white rounded-2xl shadow p-6 w-[700px] max-w-full">

        <h2 class="text-xl font-bold mb-4">
            Detail Soal
        </h2>

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

        let soal = row.dataset.soal;
        let rowKesulitan = row.dataset.kesulitan;
        let rowJawaban = row.dataset.jawaban;

        let matchSearch = soal.includes(search);
        let matchKesulitan = kesulitan === '' || rowKesulitan === kesulitan;
        let matchJawaban = jawaban === '' || rowJawaban === jawaban;

        row.style.display =
            matchSearch && matchKesulitan && matchJawaban
                ? ''
                : 'none';

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
</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/dosen/bank-soal-dosen.blade.php ENDPATH**/ ?>