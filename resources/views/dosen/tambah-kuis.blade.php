<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buat Kuis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white shadow-md p-6">

        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 h-auto object-contain">
        </div>

        <nav class="space-y-3">

            <a href="{{ route('dashboard.dosen') }}"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📊 Dashboard
            </a>

            <a href="{{ route('dosen.kuis-saya') }}"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📝 Kuis Saya
            </a>

            <a href="{{ route('dosen.kuis.create') }}"
                class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
                ➕ Buat Kuis Baru
            </a>

            <a href="{{ route('dosen.materi') }}"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                📄 Materi
            </a>

            <a href="{{ route('dosen.bank-soal') }}"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📚 Bank Soal
</a>

            <a href="{{ route('dosen.mahasiswa') }}"
   class="block px-4 py-3 rounded-xl hover:bg-gray-100">
   👨‍🎓 Mahasiswa
</a>
        </nav>

    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 p-8">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-8">

            <div>
                <h1 class="text-3xl font-bold">Buat Kuis</h1>

                <p class="text-sm text-gray-500 mt-2">
                    Dashboard > Kuis Saya > <span class="text-purple-600">Buat Kuis Saya</span>
                </p>
            </div>

            <div class="bg-white shadow px-5 py-3 rounded-xl flex items-center gap-3">
                👤
                <div>
                    <p class="font-bold">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">{{ ucfirst(auth()->user()->role) }}</p>
                </div>
            </div>

        </div>

        <form method="POST" action="{{ route('dosen.kuis.store') }}" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="dosen" value="{{ auth()->user()->name }}">

            {{-- 1 INFORMASI KUIS --}}
            <div class="bg-white rounded-2xl shadow p-6 mb-6">

                <h2 class="font-bold text-lg mb-5">
                    1. Informasi Kuis
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block mb-2 font-semibold">
                            Judul Kuis <span class="text-red-500">*</span>
                        </label>

                        <input type="text"
                            name="judul_kuis"
                            required
                            placeholder="Masukkan Judul Kuis"
                            class="w-full rounded-xl border-gray-300">
                    </div>

                    <div>
                        <label class="block mb-2 font-semibold">
                            Nama Dosen
                        </label>

                        <input type="text"
                            value="{{ auth()->user()->name }}"
                            readonly
                            class="w-full rounded-xl border-gray-300 bg-gray-100 cursor-not-allowed">
                    </div>

                </div>

            </div>

            {{-- 2 PENGATURAN KUIS --}}
            <div class="bg-white rounded-2xl shadow p-6 mb-6 border-2 border-blue-400">

                <h2 class="font-bold text-lg mb-5">
                    2. Pengaturan Kuis
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                   <div>
    <label class="block mb-2 font-semibold">
        Jumlah Soal
    </label>

    <input type="text"
        value="10 Soal"
        readonly
        class="w-full rounded-xl border-gray-300 bg-gray-100 cursor-not-allowed">

    <input type="hidden"
        name="jumlah_soal"
        value="10">
</div>

                    <div>
                        <label class="block mb-2 font-semibold">
                            Upload Materi <span class="text-red-500">*</span>
                        </label>

                        <input type="file"
                            name="file_pdf"
                            accept="application/pdf"
                            required
                            class="w-full bg-white rounded-xl border-gray-300 p-2">
                    </div>

                    

                </div>


            </div>

            {{-- 3 SUMBER SOAL --}}
           

            {{-- BUTTON --}}
            <div class="flex justify-between items-center">

                <a href="{{ route('dosen.kuis-saya') }}"
                    class="bg-white border px-8 py-3 rounded-xl font-semibold shadow">
                    Batal
                </a>

                <div class="flex gap-4">

                    <button type="reset"
                        class="border border-purple-500 text-purple-600 px-8 py-3 rounded-xl font-semibold">
                        Reset
                    </button>

                    <button type="submit"
                        class="bg-purple-600 hover:bg-purple-700 text-white px-10 py-3 rounded-xl font-bold">
                        Simpan
                    </button>

                </div>

            </div>

        </form>

    </main>

</div>

</body>
</html>