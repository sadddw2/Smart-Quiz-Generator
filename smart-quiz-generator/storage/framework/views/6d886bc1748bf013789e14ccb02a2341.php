<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kerjakan Kuis</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">
<?php

$kuiss = \App\Models\Kuis::query();

if(request('dosen')){
    $kuiss->where('dosen','like','%'.request('dosen').'%');
}

if(request('kuis')){
    $kuiss->where('judul_kuis','like','%'.request('kuis').'%');
}

$kuiss = $kuiss->latest()->get();

?>
<div class="flex min-h-screen">

    
    <aside class="w-64 bg-white shadow-lg p-6">

        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 mx-auto">
        </div>

        <nav class="space-y-3">

            <a href="<?php echo e(route('dashboard.mahasiswa')); ?>"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                🏠 Dashboard
            </a>

            <a href="<?php echo e(route('mahasiswa.kerjakan-kuis')); ?>"
               class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📝 Kerjakan Kuis
            </a>

            <a href="<?php echo e(route('mahasiswa.nilai-saya')); ?>"                 
             class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">

    📊 Nilai Saya
</a>

            <a href="<?php echo e(route('mahasiswa.materi')); ?>"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📄 Materi
</a>

        </nav>

    </aside>

    
    
<main class="flex-1 p-8">

    <?php
    $hasilKuis = \App\Models\HasilKuis::where(
        'nama_mahasiswa',
        auth()->user()->name
    )->latest()->get();

    if(request('mata_kuliah')){
        $hasilKuis = $hasilKuis->where(
            'mata_kuliah',
            request('mata_kuliah')
        );
    }
?>
    <div class="flex justify-between items-start mb-8">
        <div>
            <h1 class="text-3xl font-bold">Hasil Kuis</h1>
            <p class="text-gray-500 mt-2">
                Kelola data mahasiswa, lihat aktivitas, dan pantau progres mereka
            </p>
        </div>

        <button onclick="exportPDF()"
            class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-xl font-semibold shadow">
            ⬇ Export PDF
        </button>
    </div>

    
    <form method="GET"
        class="bg-white border rounded-xl p-4 mb-8 max-w-3xl mx-auto flex gap-5 items-end">

        <div class="w-full">
            <label class="text-sm text-gray-500">
                Pilih Mata Kuliah
            </label>

            <select name="mata_kuliah"
                class="w-full rounded-xl border-gray-300">

                <option value="">
                    Semua Mata Kuliah
                </option>

                <?php $__currentLoopData = \App\Models\HasilKuis::select('mata_kuliah')->distinct()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <option value="<?php echo e($mk->mata_kuliah); ?>"
                        <?php echo e(request('mata_kuliah') == $mk->mata_kuliah ? 'selected' : ''); ?>>

                        <?php echo e($mk->mata_kuliah); ?>


                    </option>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </select>
        </div>

        <button type="submit"
            class="bg-purple-600 text-white px-5 py-2 rounded-xl">
            Filter
        </button>

    </form>

    
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full text-sm" id="nilaiTable">

            <thead class="bg-gray-100 text-gray-600">

                <tr>
                    <th class="p-4 text-center">No</th>
                    <th class="p-4 text-left">Nama Mahasiswa</th>
                    <th class="p-4 text-left">Mata Kuliah</th>
                    <th class="p-4 text-left">Nilai</th>
                    <th class="p-4 text-left">Persentase</th>
                    <th class="p-4 text-left">Benar</th>
                    <th class="p-4 text-left">Salah</th>
                    <th class="p-4 text-left">Waktu Submit</th>
                    <th class="p-4 text-left">Status</th>
                    
                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $hasilKuis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="p-4 text-center">
                            <?php echo e($index + 1); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($hasil->nama_mahasiswa); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($hasil->mata_kuliah); ?>

                        </td>

                        <td class="p-4 font-semibold">
                            <?php echo e($hasil->nilai); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($hasil->nilai); ?>%
                        </td>

                        <td class="p-4 text-green-600 font-semibold">
                            <?php echo e($hasil->jumlah_benar); ?>

                        </td>

                        <td class="p-4 text-red-600 font-semibold">
                            <?php echo e($hasil->jumlah_salah); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($hasil->created_at->format('d M Y, H:i')); ?>

                        </td>

                        <td class="p-4">

                            <?php if($hasil->status == 'lulus'): ?>

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Lulus
                                </span>

                            <?php else: ?>

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Tidak Lulus
                                </span>

                            <?php endif; ?>

                        </td>

                       
                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="10"
                            class="p-6 text-center text-gray-500">

                            Belum ada data hasil kuis.

                        </td>
                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

</main>

</div>

<script>
function exportPDF() {
    window.print();
}
</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/mahasiswa/nilai-saya.blade.php ENDPATH**/ ?>