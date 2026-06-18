<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kerjakan Kuis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
@php

$kuiss = \App\Models\Kuis::query();

if(request('dosen')){
    $kuiss->where('dosen','like','%'.request('dosen').'%');
}

if(request('kuis')){
    $kuiss->where('judul_kuis','like','%'.request('kuis').'%');
}

$kuiss = $kuiss->latest()->get();

@endphp
<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white shadow-lg p-6">

        <div class="mb-10">
            <img src="https://i.ibb.co.com/1GHNqxjS/svgviewer-png-output-1.png"
                class="w-40 mx-auto">
        </div>

        <nav class="space-y-3">

            <a href="{{ route('dashboard.mahasiswa') }}"
                class="block px-4 py-3 rounded-xl hover:bg-gray-100">
                🏠 Dashboard
            </a>

            <a href="{{ route('mahasiswa.kerjakan-kuis') }}"
                class="block bg-purple-100 text-purple-700 px-4 py-3 rounded-xl font-semibold">
                📝 Kerjakan Kuis
            </a>

            <a href="{{ route('mahasiswa.nilai-saya') }}"  class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📊 Nilai Saya
</a>

           <a href="{{ route('mahasiswa.materi') }}"
    class="block px-4 py-3 rounded-xl hover:bg-gray-100">
    📄 Materi
</a>

        </nav>

    </aside>

    {{-- CONTENT --}}
    {{-- CONTENT --}}
<main class="flex-1 p-8">

    @php
        $kuiss = \App\Models\Kuis::query();

        if(request('dosen')){
            $kuiss->where('dosen', 'like', '%' . request('dosen') . '%');
        }

        if(request('kuis')){
            $kuiss->where('judul_kuis', 'like', '%' . request('kuis') . '%');
        }

        $kuiss = $kuiss->latest()->get();
    @endphp

    <div class="flex justify-between items-center mb-8">

        <div>
            <h1 class="text-3xl font-bold">
                Kerjakan Kuis
            </h1>

            <p class="text-gray-500 mt-2">
                Cari kuis berdasarkan dosen dan nama kuis
            </p>
        </div>

        <div class="bg-white px-5 py-3 rounded-xl shadow">
            <p class="font-bold">
                {{ auth()->user()->name }}
            </p>

            <p class="text-sm text-gray-500">
                Mahasiswa
            </p>
        </div>

    </div>

    {{-- FORM FILTER --}}
    <form method="GET" class="bg-white rounded-2xl shadow p-6 mb-8">

        <h2 class="font-bold text-xl mb-5">
            Pencarian Kuis
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block font-semibold mb-2">
                    Nama Dosen
                </label>

                <input
                    type="text"
                    name="dosen"
                    value="{{ request('dosen') }}"
                    placeholder="Contoh: Budi"
                    class="w-full rounded-xl border-gray-300">
            </div>

            <div>
                <label class="block font-semibold mb-2">
                    Nama Kuis
                </label>

                <input
                    type="text"
                    name="kuis"
                    value="{{ request('kuis') }}"
                    placeholder="Contoh: Pemrograman Dasar"
                    class="w-full rounded-xl border-gray-300">
            </div>

        </div>

        <div class="flex gap-4 mt-6">

            <button
                type="submit"
                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-xl font-semibold">
                Cari Kuis
            </button>

            <a href="{{ route('mahasiswa.kerjakan-kuis') }}"
                class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl font-semibold">
                Reset
            </a>

        </div>

    </form>

    {{-- TABEL KUIS MUNCUL SETELAH INPUT --}}
    @if(request('dosen') && request('kuis'))

        <div class="bg-purple-50 border border-purple-200 rounded-2xl p-5 mb-6">
            <p>
                Dosen:
                <span class="font-bold text-purple-700">
                    {{ request('dosen') }}
                </span>
            </p>

            <p class="mt-2">
                Nama Kuis:
                <span class="font-bold text-purple-700">
                    {{ request('kuis') }}
                </span>
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow overflow-hidden">

            <div class="p-5 border-b">
                <h2 class="font-bold text-xl">
                    Daftar Kuis
                </h2>
            </div>

            <table class="w-full text-sm">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Nama Kuis</th>
                        <th class="p-4 text-left">Dosen</th>
                        <th class="p-4 text-left">Jumlah Soal</th>
                        <th class="p-4 text-left">Tingkat Kesulitan</th>
                        <th class="p-4 text-left">Tanggal Dibuat</th>
                        <th class="p-4 text-center">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($kuiss as $index => $kuis)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="p-4 text-center">
                                {{ $index + 1 }}
                            </td>

                            <td class="p-4">
                                {{ $kuis->judul_kuis }}
                            </td>

                            <td class="p-4">
                                {{ $kuis->dosen }}
                            </td>

                            <td class="p-4">
                                {{ $kuis->jumlah_soal }}
                            </td>

                            <td class="p-4">
                                @if($kuis->tingkat_kesulitan == 'mudah')
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs">
                                        Mudah
                                    </span>
                                @elseif($kuis->tingkat_kesulitan == 'sedang')
                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs">
                                        Sedang
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs">
                                        Sulit
                                    </span>
                                @endif
                            </td>

                            <td class="p-4">
                                {{ $kuis->created_at->format('d M Y') }}
                            </td>

                            <td class="p-4 text-center">
                                <a href="{{ route('mahasiswa.kerjakan-soal', ['kuis_id' => $kuis->id]) }}"
                                    class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg">
                                    Kerjakan
                                </a>
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7"
                                class="p-8 text-center text-gray-500">
                                Kuis tidak ditemukan.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    @endif

</main>

</div>

<script>


function resetFilter()
{
    document.getElementById('namaDosen').value = '';
    document.getElementById('namaKuis').value = '';

    document.getElementById('infoPencarian')
        .classList.add('hidden');

    document.getElementById('tabelKuis')
        .classList.add('hidden');
}

</script>

</body>
</html>