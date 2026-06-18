<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Dosen</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="max-w-5xl mx-auto bg-white rounded-3xl shadow-lg p-10">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-10">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Tambah Dosen
            </h1>

            <p class="text-gray-500 mt-2">
                Tambahkan akun dosen baru ke sistem Smart Quiz Generator
            </p>

        </div>

        <a href="{{ route('dosen.index') }}"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl font-semibold transition">

            ← Kembali

        </a>

    </div>

    {{-- Error Validation --}}
    @if ($errors->any())

        <div class="bg-red-100 text-red-700 p-4 rounded-xl mb-6">

            <ul class="list-disc ml-5">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- Form --}}
    <form method="POST"
        action="{{ route('dosen.store') }}">

        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Nama Lengkap
                </label>

                <input type="text"
                    name="name"
                    required
                    placeholder="Masukkan nama dosen"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

            </div>

            {{-- NIP --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    NIP
                </label>

                <input type="text"
                    name="nip"
                    required
                    placeholder="Masukkan NIP"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

            </div>

            {{-- Email --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Email
                </label>

                <input type="email"
                    name="email"
                    required
                    placeholder="Masukkan email"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

            </div>

            {{-- Password --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Password
                </label>

                <input type="password"
                    name="password"
                    required
                    placeholder="Masukkan password"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

            </div>

            {{-- Program Studi --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Program Studi
                </label>

                <select name="prodi"
                    required
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

                    <option value="">
                        -- Pilih Program Studi --
                    </option>

                    <option value="Teknik Informatika">
                        Teknik Informatika
                    </option>

                    <option value="Sistem Informasi">
                        Sistem Informasi
                    </option>

                </select>

            </div>

            {{-- Status --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Status
                </label>

                <select name="status"
                    required
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

                    <option value="aktif">
                        Aktif
                    </option>

                    <option value="nonaktif">
                        Nonaktif
                    </option>

                </select>

            </div>

        </div>

        {{-- Buttons --}}
        <div class="flex gap-4 mt-10">

            {{-- Submit --}}
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-8 py-3 rounded-xl font-semibold shadow transition">

                + Tambah Dosen

            </button>

            {{-- Reset --}}
            <button type="reset"
                class="bg-red-500 hover:bg-red-600 text-white px-8 py-3 rounded-xl font-semibold shadow transition">

                Reset Form

            </button>

        </div>

        {{-- Hidden Role --}}
        <input type="hidden"
            name="role"
            value="dosen">

    </form>

</div>

</body>
</html>