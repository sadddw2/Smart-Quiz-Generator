<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    
    <aside class="w-64 bg-white shadow-md p-6">

        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 h-auto object-contain">
        </div>

        <nav class="space-y-3">

            <a href="/dashboard"
                class="flex gap-3 items-center px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Dashboard
            </a>

            <a href="<?php echo e(route('users.index')); ?>"
                class="flex gap-3 items-center bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
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
                📚 Data Bank Soal
            </a>

        </nav>

    </aside>

    
    <main class="flex-1 p-8">

        
        <div class="flex items-center justify-between mb-8">

            <div>

                <h1 class="text-3xl font-bold">
                    Data User
                </h1>

                <p class="text-gray-500 mt-2">
                    Dashboard > Data User
                </p>

                <p class="text-sm mt-4 text-gray-600">
                    Kelola semua akun pengguna pada sistem Smart Quiz Generator
                </p>

            </div>

            <a href="<?php echo e(route('users.add')); ?>"
                class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-3 rounded-xl font-semibold shadow">

                + Tambah User

            </a>

        </div>

        
        <div class="bg-white rounded-2xl shadow p-4 mb-6 flex gap-4 items-center flex-wrap">

            
            <input type="text"
                id="searchUser"
                placeholder="Cari nama atau email..."
                class="w-72 rounded-xl border-gray-300 px-4 py-2">

            
            <select id="filterRole"
                class="border rounded-xl px-4 py-2 text-sm">

                <option value="">Semua Role</option>
                <option value="admin">Admin</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>

            </select>

            
            <select id="filterStatus"
                class="border rounded-xl px-4 py-2 text-sm">

                <option value="">Semua Status</option>
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>

            </select>

            
            <button id="resetFilter"
                class="border bg-white px-5 py-2 rounded-xl shadow hover:bg-gray-100">

                Reset Filter

            </button>

            
            <button id="exportPdfBtn"
                class="ml-auto border px-4 py-2 rounded-xl shadow bg-white hover:bg-gray-100">

                ⬇ EXPORT PDF

            </button>

        </div>

        
        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="flex justify-between items-center p-5">

                <h2 class="font-bold text-lg">
                    Total User <?php echo e($users->count()); ?>

                </h2>

            </div>

            <table class="w-full text-sm" id="userTable">

                <thead class="bg-gray-100 text-gray-600">

                    <tr>

                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Nama</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Peran</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Tanggal Daftar</th>
                        <th class="p-4 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b hover:bg-gray-50 user-row"
                        data-role="<?php echo e(strtolower($user->role)); ?>"
                        data-status="<?php echo e(trim(strtolower($user->status))); ?>"
                        data-name="<?php echo e(strtolower($user->name)); ?>"
                        data-email="<?php echo e(strtolower($user->email)); ?>">

                        <td class="p-4 text-center">
                            <?php echo e($index + 1); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($user->name); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($user->email); ?>

                        </td>

                        <td class="p-4">
                            <?php echo e(ucfirst($user->role)); ?>

                        </td>

                        <td class="p-4">

                            <?php if(trim(strtolower($user->status)) == 'aktif'): ?>

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Aktif
                                </span>

                            <?php else: ?>

                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                    Nonaktif
                                </span>

                            <?php endif; ?>

                        </td>

                        <td class="p-4">
                            <?php echo e($user->created_at->format('d M Y, H:i')); ?>

                        </td>

                        <td class="p-4 text-center">

                            <div class="flex justify-center gap-3">

                                
                                <a href="<?php echo e(route('users.edit', $user->id)); ?>"
                                    class="text-black text-lg">

                                    ✏️

                                </a>

                                
                                <form action="<?php echo e(route('users.delete', $user->id)); ?>"
                                    method="POST">

                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>

                                    <button
                                        onclick="return confirm('Yakin hapus user ini?')"
                                        class="text-red-600 text-lg">

                                        🗑️

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

        
        <footer class="text-center text-gray-500 mt-8">

            © 2026 Smart Quiz Generator. All rights reserved.

        </footer>

    </main>

</div>

<script>

const filterRole = document.getElementById('filterRole');
const filterStatus = document.getElementById('filterStatus');
const searchUser = document.getElementById('searchUser');
const resetFilter = document.getElementById('resetFilter');

function filterTable() {

    let roleValue = filterRole.value.toLowerCase();
    let statusValue = filterStatus.value.toLowerCase();
    let searchValue = searchUser.value.toLowerCase();

    let rows = document.querySelectorAll('.user-row');

    rows.forEach(row => {

        let role = row.dataset.role;
        let status = row.dataset.status;
        let name = row.dataset.name;
        let email = row.dataset.email;

        let matchRole =
            roleValue === '' || role === roleValue;

        let matchStatus =
            statusValue === '' || status === statusValue;

        let matchSearch =
            name.includes(searchValue) ||
            email.includes(searchValue);

        if (matchRole && matchStatus && matchSearch) {
            row.style.display = '';
        } else {
            row.style.display = 'none';
        }

    });

}

/* FILTER */
filterRole.addEventListener('change', filterTable);

filterStatus.addEventListener('change', filterTable);

searchUser.addEventListener('keyup', filterTable);

/* RESET FILTER */
resetFilter.addEventListener('click', function () {

    filterRole.value = '';
    filterStatus.value = '';
    searchUser.value = '';

    filterTable();

});

/* EXPORT PDF */
document.getElementById('exportPdfBtn').addEventListener('click', function () {

    let table = document.getElementById('userTable').outerHTML;

    let printWindow = window.open('', '', 'width=1000,height=700');

    printWindow.document.write(`
        <html>
        <head>
            <title>Data User</title>

            <style>

                body {
                    font-family: Arial, sans-serif;
                    padding: 20px;
                }

                h2 {
                    text-align: center;
                    margin-bottom: 20px;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    font-size: 12px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                    text-align: left;
                }

                th {
                    background: #f3f4f6;
                }

                .text-center {
                    text-align: center;
                }

                a, button, form {
                    display: none;
                }

            </style>

        </head>

        <body>

            <h2>Data User</h2>

            ${table}

        </body>

        </html>
    `);

    printWindow.document.close();

    printWindow.print();

});

</script>

</body>
</html><?php /**PATH C:\Users\ACER\smart-quiz-generator\resources\views/data/user.blade.php ENDPATH**/ ?>