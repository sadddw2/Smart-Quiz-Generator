<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Upload Materi</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow p-8">

    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold">Upload Materi</h1>
            <p class="text-gray-500 mt-2">Upload file materi PDF untuk Smart Quiz Generator</p>
        </div>

        <a href="<?php echo e(route('dosen.materi')); ?>"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">
            Kembali
        </a>
    </div>

<form method="POST" action="<?php echo e(route('dosen.materi.store')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block mb-2 font-semibold">Judul Materi</label>
                <input type="text" name="judul" required
                    class="w-full rounded-xl border-gray-300"
                    placeholder="Contoh: Algoritma Dasar">
            </div>

          

          <div>
    <label class="block mb-2 font-semibold">Dosen</label>

    <input type="text"
        value="<?php echo e(auth()->user()->name); ?>"
        readonly
        class="w-full rounded-xl border-gray-300 bg-gray-100 cursor-not-allowed">

    <input type="hidden"
        name="dosen"
        value="<?php echo e(auth()->user()->name); ?>">
      
</div>

            <div>
                <label class="block mb-2 font-semibold">Semester</label>
                <select name="semester" required
                    class="w-full rounded-xl border-gray-300">
                    <option value="">Pilih Semester</option>
                    <option value="Semester 1">Semester 1</option>
                    <option value="Semester 2">Semester 2</option>
                    <option value="Semester 3">Semester 3</option>
                    <option value="Semester 4">Semester 4</option>
                    <option value="Semester 5">Semester 5</option>
                    <option value="Semester 6">Semester 6</option>
                    <option value="Semester 7">Semester 7</option>
                    <option value="Semester 8">Semester 8</option>
                </select>
            </div>

        </div>
 <label class="block mb-2 mt-5 font-semibold">Kategori</label>
    <input type="text"
        name="kategori"
        required
        class="w-full rounded-xl border-gray-300"
        placeholder="Contoh: Informatika">
        <div class="mt-6">
            <label class="block mb-2 font-semibold">File Materi PDF</label>

            <div class="border-2 border-dashed border-purple-300 rounded-2xl p-10 text-center bg-purple-50">
                <input type="file" name="file_pdf" accept="application/pdf" required
                    class="w-full bg-white rounded-xl border-gray-300 p-3">

                <p class="text-sm text-gray-500 mt-3">
                    Format file harus PDF. Maksimal ukuran bisa diatur di validasi route/controller.
                </p>
            </div>
        </div>

        <div class="flex gap-4 mt-8">
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-semibold">
                Upload Materi
            </button>

            <button type="reset"
                class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl font-semibold">
                Hapus Form
            </button>
        </div>
    </form>

</div>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/dosen/tambah/add-materi-dosen.blade.php ENDPATH**/ ?>