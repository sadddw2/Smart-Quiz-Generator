<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen p-10">

<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-lg p-10">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-10">

        <div>

            <h1 class="text-4xl font-bold text-gray-800">
                Edit User
            </h1>

            <p class="text-gray-500 mt-2">
                Kelola data user Smart Quiz Generator
            </p>

        </div>

        <a href="{{ route('users.index') }}"
            class="bg-gray-200 hover:bg-gray-300 px-5 py-3 rounded-xl font-semibold">

            ← Kembali

        </a>

    </div>

    {{-- FORM UPDATE --}}
    <form method="POST"
        action="{{ route('users.update', $user->id) }}">

        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Nama --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Nama
                </label>

                <input type="text"
                    name="name"
                    value="{{ $user->name }}"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

            </div>

            {{-- Email --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Email
                </label>

                <input type="email"
                    name="email"
                    value="{{ $user->email }}"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">
                   @error('email')
        <p class="text-red-500 text-sm mt-1">
            {{ $message }}
        </p>
    @enderror
            </div>

            {{-- Role --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Role
                </label>

                <select name="role"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

                    <option value="admin"
                        {{ $user->role == 'admin' ? 'selected' : '' }}>

                        Admin

                    </option>

                    <option value="dosen"
                        {{ $user->role == 'dosen' ? 'selected' : '' }}>

                        Dosen

                    </option>

                    <option value="mahasiswa"
                        {{ $user->role == 'mahasiswa' ? 'selected' : '' }}>

                        Mahasiswa

                    </option>

                </select>

            </div>

            {{-- Status --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Status
                </label>

                <select name="status"
                    class="w-full rounded-xl border-gray-300 focus:ring-purple-500 focus:border-purple-500">

                    <option value="aktif"
                        {{ $user->status == 'aktif' ? 'selected' : '' }}>

                        Aktif

                    </option>

                    <option value="nonaktif"
                        {{ $user->status == 'nonaktif' ? 'selected' : '' }}>

                        Nonaktif

                    </option>

                </select>

            </div>

            {{-- Program Studi --}}
          

            {{-- Tanggal Daftar --}}
            <div>

                <label class="block mb-2 font-semibold text-gray-700">
                    Tanggal Daftar
                </label>

                <input type="text"
                    value="{{ $user->created_at->format('d M Y') }}"
                    disabled
                    class="w-full rounded-xl border-gray-300 bg-gray-100">

            </div>

        </div>

        {{-- BUTTON --}}
        <div class="flex gap-4 mt-10">

            {{-- SIMPAN --}}
            <button type="submit"
                class="bg-purple-600 hover:bg-purple-700
                text-white px-6 py-3 rounded-xl font-semibold shadow">

                Simpan Perubahan

            </button>

            {{-- RESET --}}
            <button type="reset"
                class="bg-gray-200 hover:bg-gray-300
                px-6 py-3 rounded-xl font-semibold shadow">

                Reset

            </button>

        </div>

    </form>

    {{-- FORM DELETE --}}
    <form action="{{ route('users.delete', $user->id) }}"
        method="POST"
        class="mt-6">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            onclick="return confirm('Yakin hapus user ini?')"
            class="px-6 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold shadow-lg">

            Hapus User

        </button>

    </form>

</div>

</body>
</html>