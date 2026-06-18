<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="bg-white rounded-2xl shadow p-8">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold">
                Tambah Mahasiswa
            </h1>

            <p class="text-gray-500 mt-2">
                Tambahkan akun mahasiswa baru ke sistem Smart Quiz Generator
            </p>

        </div>

        <a href="{{ route('mahasiswa.index') }}"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">

            Kembali

        </a>

    </div>

    {{-- Form --}}
    <form method="POST"
        action="{{ route('mahasiswa.store') }}">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Nama Lengkap
                </label>

                <input type="text"
                    name="name"
                    required
                    class="w-full rounded-xl border-gray-300">

            </div>

            {{-- NRP --}}
            <div>

                <label class="block mb-2 font-semibold">
                    NRP
                </label>

                <input type="text"
                    name="nrp"
                    required
                    class="w-full rounded-xl border-gray-300">

            </div>

            {{-- Email --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Email
                </label>

                <input type="email"
                    name="email"
                    required
                    class="w-full rounded-xl border-gray-300">

            </div>

            {{-- Password --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Password
                </label>

                <input type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border-gray-300">

            </div>

            {{-- Program Studi --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Program Studi
                </label>

                <select name="prodi"
                    class="w-full rounded-xl border-gray-300">

                    <option value="Teknik Informatika">
                        Teknik Informatika
                    </option>

                    <option value="Sistem Informasi">
                        Sistem Informasi
                    </option>

                </select>

            </div>

            {{-- Angkatan --}}
            <div>

                <label class="block mb-2 font-semibold">
                    Angkatan
                </label>

                <input type="number"
                    name="angkatan"
                    placeholder="2026"
                    class="w-full rounded-xl border-gray-300">

            </div>

            {{-- Status --}}
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

        {{-- Button --}}
        <div class="flex gap-4 mt-8">

            {{-- Simpan --}}
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700
                text-white px-6 py-3 rounded-xl">

                Simpan Mahasiswa

            </button>

            {{-- Reset --}}
            
        </div>

        {{-- Hidden Role --}}
        <input type="hidden"
            name="role"
            value="mahasiswa">

    </form>

</div>

</body>
</html>