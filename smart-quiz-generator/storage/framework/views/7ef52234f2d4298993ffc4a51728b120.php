<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-lg p-10">

    
    <div class="flex items-center justify-between mb-10">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Edit User
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola data user Smart Quiz Generator
            </p>

        </div>

        <a href="<?php echo e(route('users.index')); ?>"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl font-semibold">

            ← Kembali

        </a>

    </div>

    
    <form method="POST"
        action="<?php echo e(route('users.update', $user->id)); ?>">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Nama
                </label>

                <input type="text"
                    name="name"
                    value="<?php echo e($user->name); ?>"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

            </div>

            
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Email
                </label>

                <input type="email"
                    name="email"
                    value="<?php echo e($user->email); ?>"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">
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

                <label class="block mb-2 font-semibold text-gray-700">
                    Role
                </label>

                <select name="role"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

                    <option value="admin"
                        <?php echo e($user->role == 'admin' ? 'selected' : ''); ?>>

                        Admin

                    </option>

                    <option value="dosen"
                        <?php echo e($user->role == 'dosen' ? 'selected' : ''); ?>>

                        Dosen

                    </option>

                    <option value="mahasiswa"
                        <?php echo e($user->role == 'mahasiswa' ? 'selected' : ''); ?>>

                        Mahasiswa

                    </option>

                </select>

            </div>

            
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Status
                </label>

                <select name="status"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

                    <option value="aktif"
                        <?php echo e($user->status == 'aktif' ? 'selected' : ''); ?>>

                        Aktif

                    </option>

                    <option value="nonaktif"
                        <?php echo e($user->status == 'nonaktif' ? 'selected' : ''); ?>>

                        Nonaktif

                    </option>

                </select>

            </div>

            
          

            
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Tanggal Daftar
                </label>

                <input type="text"
                    value="<?php echo e($user->created_at->format('d M Y')); ?>"
                    disabled
                    class="w-full rounded-xl border-gray-300 bg-gray-100">

            </div>

        </div>

        
        <div class="flex gap-4 mt-10">

            
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700
                text-white px-6 py-3 rounded-xl font-semibold shadow">

                Simpan Perubahan

            </button>

            
            <button type="reset"
                class="bg-gray-200 hover:bg-gray-300
                px-6 py-3 rounded-xl font-semibold shadow">

                Reset

            </button>

        </div>

    </form>

    
    <form action="<?php echo e(route('users.delete', $user->id)); ?>"
        method="POST"
        class="mt-6">

        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>

        <button
            type="submit"
            onclick="return confirm('Yakin hapus user ini?')"
            class="px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold shadow-lg">

            Hapus User

        </button>

    </form>

</div>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/users/edit.blade.php ENDPATH**/ ?>