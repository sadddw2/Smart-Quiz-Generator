<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - Smart Quiz Generator</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex items-center justify-center bg-cover bg-center relative"
    style="background-image: url('https://i.ibb.co.com/bMP1jxh4/Untitled.png');">

    <div class="absolute inset-0 bg-black/90"></div>

    <div class="relative z-10 w-full max-w-4xl px-6">

        <h1 class="text-6xl font-extrabold text-center text-[#512CDF] drop-shadow-lg mb-8">
            REGISTER
        </h1>

        <div class="bg-white/25 backdrop-blur-md rounded-3xl p-10 shadow-2xl">
            <div class="max-w-md mx-auto bg-white rounded-3xl p-10 shadow-xl">

                <h2 class="text-center text-2xl font-bold text-slate-700">
                    Buat Akun Baru
                </h2>

                <h3 class="text-center text-3xl font-extrabold text-[#512CDF] mt-2 mb-8">
                    Smart Quiz Generator
                </h3>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input 
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="Nama Lengkap"
                        class="w-full rounded-xl border-gray-300 mb-4"
                        required autofocus>

                    <input 
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="Email"
                        class="w-full rounded-xl border-gray-300 mb-4"
                        required>

                    <input 
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="w-full rounded-xl border-gray-300 mb-4"
                        required>

                    <input 
                        type="password"
                        name="password_confirmation"
                        placeholder="Konfirmasi Password"
                        class="w-full rounded-xl border-gray-300 mb-6"
                        required>
                    {{-- Role --}}
<div class="mb-4">

   <select name="role" required class="w-full rounded-xl border-gray-300 mb-4">
    <option value="">Pilih Role</option>
    <option value="mahasiswa">Mahasiswa</option>
    <option value="dosen">Dosen</option>
</select>

</div>

{{-- NIP / NIM --}}
<input 
    type="text"
    name="identity_number"
    placeholder="NIP"
    class="w-full rounded-xl border-gray-300 mb-4"
    required>

{{-- Universitas --}}
<input 
    type="text"
    name="university"
    placeholder="Universitas"
    class="w-full rounded-xl border-gray-3 mb-4">
                    <button class="w-full bg-[#512CDF] text-white py-3 rounded-xl font-bold">
                        Register
                    </button>

                    <a href="/" class="block text-center mt-6 text-[#512CDF]">
                        Kembali Ke Halaman Awal
                    </a>
                </form>
            </div>

            <p class="text-center text-white mt-6">
                Sudah Punya Akun?
                <a href="{{ route('login') }}" class="font-bold text-purple-200">
                    Login
                </a>
            </p>
        </div>
    </div>

</body>
</html>