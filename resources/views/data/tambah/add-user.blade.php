<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="bg-white rounded-2xl shadow p-8">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-3xl font-bold">
                Tambah User
            </h1>

            <p class="text-gray-500 mt-2">
                Tambahkan akun baru ke sistem Smart Quiz Generator
            </p>

        </div>

        <a href="{{ route('users.index') }}"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl">

            Kembali

        </a>

    </div>

    {{-- Form --}}
    <form action="{{ route('users.add.store') }}" method="POST">
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

            {{-- Email --}}
           <div>

    <label class="block mb-2 font-semibold">
        Email
    </label>

    <input type="email"
        name="email"
        value="{{ old('email') }}"
        required
        class="w-full rounded-xl border-gray-300">

    @error('email')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror

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

            {{-- Role --}}
            <div>
    <label class="block mb-2 font-semibold">Role</label>

    @if(auth()->user()->role == 'admin')
        <select name="role" required
            class="w-full rounded-xl border-gray-300">
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="dosen">Dosen</option>
            <option value="mahasiswa">Mahasiswa</option>
        </select>
    @else
        <input type="hidden" name="role" value="mahasiswa">

        <input type="text"
            value="Mahasiswa"
            readonly
            class="w-full rounded-xl border-gray-300 bg-gray-100">
    @endif
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
</html>