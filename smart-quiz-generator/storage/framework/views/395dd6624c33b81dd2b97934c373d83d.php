<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<?php
    $totalKuis = \App\Models\Kuis::count();

    $hasilSaya = \App\Models\HasilKuis::where(
        'nama_mahasiswa',
        auth()->user()->name
    )->get();

    $totalDikerjakan = $hasilSaya->count();

    $rataNilai = round(
        $hasilSaya->avg('nilai') ?? 0
    );

    $totalLulus = $hasilSaya
        ->where('status','lulus')
        ->count();

    $riwayat = $hasilSaya
        ->sortByDesc('created_at');
?>

<div class="flex min-h-screen">

    
    <aside class="w-64 bg-white shadow-lg p-6">

        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 mx-auto">
        </div>

        <nav class="space-y-3">

            <a href="<?php echo e(route('dashboard.mahasiswa')); ?>"
                class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
                🏠 Dashboard
            </a>

            <a href="<?php echo e(route('mahasiswa.kerjakan-kuis')); ?>" class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📝 Kerjakan Kuis
</a>

            <a href="<?php echo e(route('mahasiswa.nilai-saya')); ?>"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Nilai Saya
            </a>

            <a href="<?php echo e(route('mahasiswa.materi')); ?>"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📄 Materi
</a>

        </nav>

    </aside>

    
    <main class="flex-1 p-8">

        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold">
                    Dashboard Mahasiswa
                </h1>

                <p class="text-gray-500 mt-2">
                    Selamat datang,
                    <?php echo e(auth()->user()->name); ?>

                </p>
            </div>

            <div class="relative">
    
    <button onclick="toggleDropdown()"
        class="bg-white px-5 py-3 rounded-xl shadow flex items-center gap-3">

        <div>
            <p class="font-bold">
                <?php echo e(auth()->user()->name); ?>

            </p>

            <p class="text-sm text-gray-500">
                <?php echo e(ucfirst(auth()->user()->role)); ?>

            </p>
        </div>

        <span>▼</span>

    </button>

    <div id="userDropdown"
        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg overflow-hidden">

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>

            <button type="submit"
                class="w-full text-left px-4 py-3 hover:bg-red-50 text-red-600">
                🚪 Logout
            </button>

        </form>

    </div>

</div>

        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-8">

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-4xl mb-3">📚</div>
                <p class="text-gray-500 text-sm">
                    Total Kuis
                </p>
                <h2 class="text-3xl font-bold">
                    <?php echo e($totalKuis); ?>

                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-4xl mb-3">📝</div>
                <p class="text-gray-500 text-sm">
                    Kuis Dikerjakan
                </p>
                <h2 class="text-3xl font-bold">
                    <?php echo e($totalDikerjakan); ?>

                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-4xl mb-3">⭐</div>
                <p class="text-gray-500 text-sm">
                    Rata-rata Nilai
                </p>
                <h2 class="text-3xl font-bold">
                    <?php echo e($rataNilai); ?>

                </h2>
            </div>

            <div class="bg-white rounded-2xl shadow p-6">
                <div class="text-4xl mb-3">🏆</div>
                <p class="text-gray-500 text-sm">
                    Lulus
                </p>
                <h2 class="text-3xl font-bold">
                    <?php echo e($totalLulus); ?>

                </h2>
            </div>

        </div>

        
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="p-5 border-b">
                <h2 class="font-bold text-xl">
                    Riwayat Hasil Kuis
                </h2>
            </div>

            <table class="w-full text-sm">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="p-4 text-left">
                            Mata Kuliah
                        </th>

                        <th class="p-4 text-left">
                            Benar
                        </th>

                        <th class="p-4 text-left">
                            Salah
                        </th>

                        <th class="p-4 text-left">
                            Nilai
                        </th>

                        <th class="p-4 text-left">
                            Status
                        </th>

                        <th class="p-4 text-left">
                            Tanggal
                        </th>
                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hasil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="p-4">
                            <?php echo e($hasil->mata_kuliah); ?>

                        </td>

                        <td class="p-4 text-green-600 font-bold">
                            <?php echo e($hasil->jumlah_benar); ?>

                        </td>

                        <td class="p-4 text-red-600 font-bold">
                            <?php echo e($hasil->jumlah_salah); ?>

                        </td>

                        <td class="p-4 font-bold">
                            <?php echo e($hasil->nilai); ?>

                        </td>

                        <td class="p-4">

                            <?php if($hasil->status == 'lulus'): ?>

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                    Lulus
                                </span>

                            <?php else: ?>

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                    Tidak Lulus
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($hasil->created_at->format('d M Y')); ?>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="6"
                            class="p-6 text-center text-gray-500">
                            Belum ada hasil kuis.
                        </td>
                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</div>
<script>
function toggleDropdown() {
    document.getElementById('userDropdown')
        .classList.toggle('hidden');
}

window.onclick = function(event) {

    if (!event.target.closest('.relative')) {

        let dropdown = document.getElementById('userDropdown');

        if (!dropdown.classList.contains('hidden')) {
            dropdown.classList.add('hidden');
        }

    }

}
</script>
</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/dashboard/mahasiswa.blade.php ENDPATH**/ ?>