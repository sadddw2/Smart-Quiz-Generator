<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="bg-white rounded-2xl shadow p-8">

    
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold">
                Tambah User
            </h1>

            <p class="text-gray-500 mt-2">
                Tambahkan akun baru ke sistem Smart Quiz Generator
            </p>

        </div>

        <a href="<?php echo e(route('users.index')); ?>"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">

            Kembali

        </a>

    </div>

    
    <form action="<?php echo e(route('users.add.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            
            <div>

                <label class="block mb-2 font-semibold">
                    Nama Lengkap
                </label>

                <input type="text"
                    name="name"
                    required
                    class="w-full rounded-xl border-gray-300">

            </div>

            
           <div>

    <label class="block mb-2 font-semibold">
        Email
    </label>

    <input type="email"
        name="email"
        value="<?php echo e(old('email')); ?>"
        required
        class="w-full rounded-xl border-gray-300">

    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="text-red-500 text-sm mt-1">
            <?php echo e($message); ?>

        </p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div>

            
            <div>

                <label class="block mb-2 font-semibold">
                    Password
                </label>

                <input type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border-gray-300">

            </div>

            
            <div>
    <label class="block mb-2 font-semibold">Role</label>

    <?php if(auth()->user()->role == 'admin'): ?>
        <select name="role" required
            class="w-full rounded-xl border-gray-300">
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>
    <?php else: ?>
        <input type="hidden" name="role" value="mahasiswa">

        <input type="text"
            value="Mahasiswa"
            readonly
            class="w-full rounded-xl border-gray-300 bg-gray-100">
    <?php endif; ?>
</div>

            
            <div>

                <label class="block mb-2 font-semibold">
                    Status
                </label>

                <select name="status"
                    class="w-full rounded-xl border-gray-300">

                    <option value="aktif">
                        Aktif
                    </option>

                    <option value="nonaktif">
                        Nonaktif
                    </option>

                </select>

            </div>

        </div>

        
        <div class="mt-8">

            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700
                text-white px-6 py-3 rounded-xl">

                Tambah User

            </button>

        </div>

    </form>

</div>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/data/tambah/add-user.blade.php ENDPATH**/ ?>