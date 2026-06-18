<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Kuis</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold">Tambah Kuis</h1>
            <p class="text-gray-500 mt-2">Upload PDF materi untuk membuat kuis</p>
        </div>

        <a href="<?php echo e(route('kuis.index')); ?>"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">
            Kembali
        </a>
    </div>
<?php if($errors->any()): ?>
    <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p><?php echo e($error); ?></p>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
    <form action="<?php echo e(route('kuis.add.store')); ?>"
      method="POST"
      enctype="multipart/form-data">
    <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold">Judul Kuis</label>
                <input type="text" name="judul_kuis" required
                    class="w-full rounded-xl border-gray-300"
                    placeholder="Contoh: Kuis Algoritma Dasar">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Dosen</label>
                <input type="text" name="dosen" required
                    class="w-full rounded-xl border-gray-300"
                    placeholder="Nama dosen">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Jumlah Soal</label>
                <input type="number" name="jumlah_soal" value="10" required
                    class="w-full rounded-xl border-gray-300">
            </div>

            <div>
                <label class="block mb-2 font-semibold">Tingkat Kesulitan</label>
                <select name="tingkat_kesulitan" required
                    class="w-full rounded-xl border-gray-300">
                    <option value="mudah">Mudah</option>
                    <option value="sedang" selected>Sedang</option>
                    <option value="sulit">Sulit</option>
                </select>
            </div>

        </div>

        <div class="mt-6">
            <label class="block mb-2 font-semibold">File PDF Materi</label>

            <div class="border-2 border-dashed border-purple-300 rounded-2xl p-10 text-center bg-purple-50">
                <input type="file" name="file_pdf" accept="application/pdf" required
                    class="w-full bg-white rounded-xl border-gray-300 p-3">

                <p class="text-sm text-gray-500 mt-3">
                    Upload file PDF materi. Setelah tersimpan, klik tombol Generate di Data Kuis.
                </p>
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-semibold">
                Simpan Kuis
            </button>

            <button type="reset"
                class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl font-semibold">
                Hapus Form
            </button>
        </div>
    </form>

</div>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/data/tambah/add-kuis.blade.php ENDPATH**/ ?>