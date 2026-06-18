```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni - Smart Quiz Generator</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body class="bg-gray-50">

    <!-- Navbar -->
    <nav class="w-full bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">

            <div class="flex items-center gap-8">

                <a href="<?php echo e(url('/')); ?>"
                   class="font-semibold text-slate-800 hover:text-indigo-600">
                    Beranda
                </a>

                <a href="<?php echo e(route('testimoni')); ?>"
                   class="font-semibold text-indigo-600 border-b-2 border-indigo-600 pb-1">
                    Testimoni
                </a>

            </div>

            <div class="flex items-center gap-5">
                <a href="<?php echo e(route('login')); ?>"
                   class="font-medium text-slate-700 hover:text-indigo-600">
                    Login
                </a>

                <a href="<?php echo e(route('register')); ?>"
                   class="bg-indigo-600 text-white px-6 py-3 rounded-xl">
                    Register
                </a>
            </div>

        </div>
    </nav>

    <!-- Header -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6 text-center">

            <h1 class="text-4xl font-bold text-slate-800">
                Testimoni Pengguna
            </h1>

            <p class="text-gray-600 mt-3">
                Pendapat pengguna mengenai aplikasi Smart Quiz Generator
            </p>

        </div>
    </section>

    <!-- Testimoni -->
    <section class="pb-20">
        <div class="max-w-6xl mx-auto px-6">

            <div class="grid md:grid-cols-3 gap-6">

                <div class="bg-white rounded-2xl shadow p-6">
                    <div class="text-yellow-400 text-xl">
                        ★★★★★
                    </div>

                    <p class="mt-4 text-gray-600">
                        Aplikasi sangat membantu dalam proses pengerjaan kuis
                        dan tampilan sistem mudah dipahami.
                    </p>

                    <div class="mt-5">
                        <h4 class="font-semibold">Budi Santoso</h4>
                        <p class="text-sm text-gray-500">Mahasiswa</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <div class="text-yellow-400 text-xl">
                        ★★★★★
                    </div>

                    <p class="mt-4 text-gray-600">
                        Pengelolaan materi dan pembuatan kuis menjadi lebih
                        cepat dibandingkan metode manual.
                    </p>

                    <div class="mt-5">
                        <h4 class="font-semibold">Andi Pratama</h4>
                        <p class="text-sm text-gray-500">Dosen</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow p-6">
                    <div class="text-yellow-400 text-xl">
                        ★★★★★
                    </div>

                    <p class="mt-4 text-gray-600">
                        Fitur kuis berjalan dengan baik dan hasil nilai dapat
                        dilihat secara langsung setelah pengerjaan selesai.
                    </p>

                    <div class="mt-5">
                        <h4 class="font-semibold">Siti Aminah</h4>
                        <p class="text-sm text-gray-500">Mahasiswa</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-indigo-600 text-white py-10">
        <div class="max-w-7xl mx-auto px-6 text-center">

            <h3 class="text-2xl font-bold">
                Smart Quiz Generator
            </h3>

            <p class="mt-3 text-indigo-100">
                Sistem pembuatan kuis berbasis web untuk membantu proses
                evaluasi pembelajaran secara efektif dan efisien.
            </p>

            <div class="border-t border-indigo-500 mt-6 pt-6">
                <p class="text-sm text-indigo-100">
                    © <?php echo e(date('Y')); ?> Smart Quiz Generator. All Rights Reserved.
                </p>
            </div>

        </div>
    </footer>

</body>
</html>
```
<?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/testimoni/index.blade.php ENDPATH**/ ?>