<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kerjakan Soal</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<?php
    $kuisId = request('kuis_id') ?? 1;

    $kuis = \App\Models\Kuis::find($kuisId);

    $soals = \App\Models\Soal::where('kuis_id', $kuisId)->get();

    $jumlahSoal = $soals->count();
?>

<div class="min-h-screen p-8">

    <div class="flex justify-between items-center mb-8">
        <p class="text-sm">
            Kuis Saya > <?php echo e($kuis->judul_kuis ?? 'Kuis'); ?> > <b>Kerjakan Kuis</b>
        </p>

        <div class="bg-white px-5 py-3 rounded-xl shadow flex gap-3 items-center">
            👤
            <div>
                <p class="font-bold"><?php echo e(auth()->user()->name); ?></p>
                <p class="text-xs text-gray-500"><?php echo e(ucfirst(auth()->user()->role)); ?></p>
            </div>
        </div>
    </div>

    <form method="POST" action="<?php echo e(route('mahasiswa.submit-kuis')); ?>">
    <?php echo csrf_field(); ?>

    <input type="hidden" name="kuis_id" value="<?php echo e($kuis->id); ?>">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="md:col-span-3 bg-white rounded-2xl shadow p-6">

                <div class="bg-white rounded-xl shadow p-4 w-72 mb-6 flex gap-4 items-center">
                    <div class="text-4xl">📄</div>
                    <div>
                        <h2 class="font-bold"><?php echo e($kuis->judul_kuis ?? 'Kuis'); ?></h2>
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                            <?php echo e(ucfirst($kuis->tingkat_kesulitan ?? 'Mudah')); ?>

                        </span>
                        <p class="text-xs text-gray-500 mt-1">
                            Jumlah Soal <?php echo e($jumlahSoal); ?>

                        </p>
                    </div>
                </div>

                <?php $__empty_1 = true; $__currentLoopData = $soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="soal-box <?php echo e($index != 0 ? 'hidden' : ''); ?>" id="soal-<?php echo e($index); ?>">

                        <p class="text-purple-600 text-sm mb-4">
                            Soal <?php echo e($index + 1); ?> dari <?php echo e($jumlahSoal); ?>

                        </p>

                        <h3 class="font-bold text-lg mb-6">
                            <?php echo e($soal->pertanyaan); ?>

                        </h3>

                        <div class="space-y-4">

                            <label class="block border-2 rounded-xl p-4 cursor-pointer hover:border-purple-500">
                                <input type="radio"
                                    name="jawaban[<?php echo e($soal->id); ?>]"
                                    value="A"
                                    class="mr-3">
                                <b>A.</b> <?php echo e($soal->pilihan_a); ?>

                            </label>

                            <label class="block border-2 rounded-xl p-4 cursor-pointer hover:border-purple-500">
                                <input type="radio"
                                    name="jawaban[<?php echo e($soal->id); ?>]"
                                    value="B"
                                    class="mr-3">
                                <b>B.</b> <?php echo e($soal->pilihan_b); ?>

                            </label>

                            <label class="block border-2 rounded-xl p-4 cursor-pointer hover:border-purple-500">
                                <input type="radio"
                                    name="jawaban[<?php echo e($soal->id); ?>]"
                                    value="C"
                                    class="mr-3">
                                <b>C.</b> <?php echo e($soal->pilihan_c); ?>

                            </label>

                            <label class="block border-2 rounded-xl p-4 cursor-pointer hover:border-purple-500">
                                <input type="radio"
                                    name="jawaban[<?php echo e($soal->id); ?>]"
                                    value="D"
                                    class="mr-3">
                                <b>D.</b> <?php echo e($soal->pilihan_d); ?>

                            </label>

                        </div>

                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-center text-gray-500 p-10">
                        Belum ada soal untuk kuis ini.
                    </p>
                <?php endif; ?>

                <?php if($jumlahSoal > 0): ?>
                <div class="flex justify-between mt-8">

                    <button type="button"
                        onclick="prevSoal()"
                        class="border border-purple-600 text-purple-600 px-6 py-3 rounded-xl">
                        ← Soal Sebelumnya
                    </button>

                    <button type="button"
                        id="nextBtn"
                        onclick="nextSoal()"
                        class="bg-purple-600 text-white px-6 py-3 rounded-xl">
                        Soal Berikutnya →
                    </button>

                    <button type="submit"
                        id="submitBtn"
                        class="hidden bg-green-600 text-white px-6 py-3 rounded-xl">
                        Submit Jawaban
                    </button>

                </div>
                <?php endif; ?>

            </div>

            <div class="bg-white rounded-2xl shadow p-5 h-fit">

                <h3 class="font-bold mb-4">Navigasi Soal</h3>

                <div class="grid grid-cols-4 gap-3">
                    <?php $__currentLoopData = $soals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $soal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button"
                            onclick="goToSoal(<?php echo e($index); ?>)"
                            class="nav-btn border rounded-lg py-3 <?php echo e($index == 0 ? 'bg-purple-600 text-white' : ''); ?>">
                            <?php echo e($index + 1); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

        </div>

    </form>

</div>

<footer class="text-center text-gray-500 pb-6">
    © 2026 Smart Quiz Generator. All rights reserved.
</footer>

<script>
let currentSoal = 0;
let totalSoal = <?php echo e($jumlahSoal); ?>;

function showSoal(index) {
    document.querySelectorAll('.soal-box').forEach((box, i) => {
        box.classList.toggle('hidden', i !== index);
    });

    document.querySelectorAll('.nav-btn').forEach((btn, i) => {
        btn.classList.toggle('bg-purple-600', i === index);
        btn.classList.toggle('text-white', i === index);
    });

    currentSoal = index;

    document.getElementById('nextBtn')?.classList.toggle('hidden', currentSoal === totalSoal - 1);
    document.getElementById('submitBtn')?.classList.toggle('hidden', currentSoal !== totalSoal - 1);
}

function nextSoal() {
    if (currentSoal < totalSoal - 1) {
        showSoal(currentSoal + 1);
    }
}

function prevSoal() {
    if (currentSoal > 0) {
        showSoal(currentSoal - 1);
    }
}

function goToSoal(index) {
    showSoal(index);
}
</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/mahasiswa/kerjakan-soal.blade.php ENDPATH**/ ?>