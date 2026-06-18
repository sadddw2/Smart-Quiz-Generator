<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100 font-sans">

<div class="flex min-h-screen">

    
   <aside class="w-64 bg-white shadow-md p-6">

    
    <div class="mb-10">
        <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
            class="w-40 h-auto object-contain">
    </div>
          <nav class="space-y-3">

            <a href="/dashboard"
               class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
                📊 Dashboard
            </a>

            <a href="<?php echo e(route('users.index')); ?>"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                👤 Data User
            </a>

            <a href="<?php echo e(route('dosen.index')); ?>"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                🎓 Data Dosen
            </a>

            <a href="<?php echo e(route('mahasiswa.index')); ?>"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                👨‍🎓 Data Mahasiswa
            </a>

            <a href="<?php echo e(route('materi.index')); ?>"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                📄 Data Materi
            </a>

            <a href="<?php echo e(route('kuis.index')); ?>"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                📝 Data Kuis
            </a>

            <a href="<?php echo e(route('hasilkuis.index')); ?>"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Data Bank Soal
            </a>

        </nav> 
    </aside>

    
    <main class="flex-1 p-8">

        
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-3xl font-bold">Selamat Datang, Admin</h2>
                <p class="text-gray-600 mt-2">Kelola dan pantau sistem Smart Quiz Generator.</p>
            </div>

            <div class="relative group">

    
    <button class="bg-white px-5 py-3 rounded-xl shadow flex items-center gap-3">

        <div class="text-purple-700 text-xl">
            👤
        </div>

        <div class="text-left">
            <p class="font-bold">ardha</p>
            <p class="text-xs text-gray-500">Admin</p>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg"
            class="w-4 h-4 text-gray-500"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">

            <path stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M19 9l-7 7-7-7" />
        </svg>

    </button>

    
    <div class="absolute right-0 mt-2 w-44 bg-white rounded-xl shadow-lg opacity-0 invisible
        group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">

        <form method="POST" action="<?php echo e(route('logout')); ?>">
            <?php echo csrf_field(); ?>

            <button type="submit"
                class="w-full text-left px-5 py-3 hover:bg-red-50 rounded-xl text-red-600 font-medium">

                Logout

            </button>
        </form>

    </div>

</div>
        </div>

        
        <?php
    $totalPengguna = \App\Models\User::count();
    $totalDosen = \App\Models\User::where('role', 'dosen')->count();
    $totalMahasiswa = \App\Models\User::where('role', 'mahasiswa')->count();
    $totalMateri = \App\Models\Materi::count();
    
?>


        <div class="grid grid-cols-1 md:grid-cols-6 gap-4 mb-8">

    <?php $__currentLoopData = [
    ['Total Pengguna', $totalPengguna ?? 0, '👥'],
    ['Total Dosen', $totalDosen ?? 0, '👨‍🏫'],
    ['Total Mahasiswa', $totalMahasiswa ?? 0, '👨‍🎓'],
    ['Total Materi (PDF)', $totalMateri ?? 0, '📄'],
    ['Total Kuis', $totalKuis ?? 0, '📝'],
  
]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <div class="bg-white rounded-xl shadow p-4">

        <div class="text-3xl mb-2">
            <?php echo e($item[2]); ?>

        </div>

        <p class="text-sm text-gray-600">
            <?php echo e($item[0]); ?>

        </p>

        <h3 class="text-3xl font-bold mt-2">
            <?php echo e($item[1]); ?>

        </h3>

        

    </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

        
       <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 items-stretch">

            
            <div class="bg-white rounded-2xl shadow p-6 h-full">
                <h3 class="font-bold text-xl mb-4">Data Users Terbaru</h3>
                <?php
    $users = \App\Models\User::latest()->take(5)->get();
?>
                <table class="w-full text-sm">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="py-2">Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                            <th>Tanggal Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class="border-b">
            <td class="py-3"><?php echo e($user->name); ?></td>
            <td><?php echo e($user->email); ?></td>
            <td><?php echo e(ucfirst($user->role)); ?></td>
            <td><?php echo e($user->created_at->format('d M Y')); ?></td>
            <td>
                <a href="<?php echo e(route('users.edit', $user->id)); ?>"
   class="bg-purple-600 text-white px-3 py-1 rounded-lg text-xs">
    Kelola
</a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
                </table>

                
            </div>

            
            <div class="bg-white rounded-2xl shadow p-6 h-full">

    <h2 class="text-xl font-bold mb-4">
        Aktivitas Terbaru
    </h2>

    <div class="space-y-4">

       <?php $__empty_1 = true; $__currentLoopData = $aktivitas ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <div class="flex items-center justify-between border-b pb-3">
        <div>
            <h3 class="font-semibold text-gray-800">
                <?php echo e($item->icon); ?> <?php echo e($item->aktivitas); ?>

            </h3>
            <p class="text-sm text-gray-500">
                <?php echo e($item->created_at->diffForHumans()); ?>

            </p>
        </div>

        <span class="text-sm text-gray-400">
            <?php echo e($item->waktu); ?>

        </span>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <p class="text-gray-500">Belum ada aktivitas</p>
<?php endif; ?>

    </div>

</div>

       <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

    <?php $__currentLoopData = [
        ['Data User','Kelola Semua Akun Pengguna','👤', route('users.index')],
        ['Data Dosen','Kelola Data Dosen','👨‍🏫', route('dosen.index')],
        ['Data Mahasiswa','Kelola Data Mahasiswa','🎓', route('mahasiswa.index')],
        ['Data Kuis','Kelola Semua Kuis','📝', route('kuis.index')],
        ['Data Bank Soal','Kelola Bank Soal','📊', route('hasilkuis.index')],
        ['Data Materi','Kelola Materi PDF','📄', route('materi.index')],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <a href="<?php echo e($item[3]); ?>">
        <div class="border rounded-xl p-5 hover:bg-purple-50 hover:shadow-lg transition cursor-pointer">

            <div class="text-3xl mb-2">
                <?php echo e($item[2]); ?>

            </div>

            <h4 class="font-bold">
                <?php echo e($item[0]); ?>

            </h4>

            <p class="text-sm text-gray-500">
                <?php echo e($item[1]); ?>

            </p>

        </div>
    </a>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

        <footer class="text-center text-gray-500 mt-8">
            © 2026 Smart Quiz Generator. All rights reserved.
        </footer>

    </main>
</div>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/dashboard/admin.blade.php ENDPATH**/ ?>