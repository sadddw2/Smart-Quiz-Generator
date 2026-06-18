<?php
use App\Models\HasilKuis;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Materi;
use App\Models\Kuis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Soal;
use App\Models\Aktivitas;
Route::get('/tentang', function () {
    return view('tentang.index');
})->name('tentang');
Route::post('/kuis/add', function (Request $request) {

    $request->validate([
        'judul_kuis' => 'required',
        'jumlah_soal' => 'required|integer|min:1',
        'file_pdf' => 'required|mimes:pdf|max:10240',
    ]);

    $file = $request->file('file_pdf');
    $path = $file->store('kuis', 'public');

    \App\Models\Kuis::create([
        'judul_kuis' => $request->judul_kuis,
        'dosen' => $request->dosen,
        'jumlah_soal' => $request->jumlah_soal,
        'tingkat_kesulitan' => 'sedang',
        'file_pdf' => $path,
    ]);

    return redirect()->route('kuis.index')
        ->with('success', 'Kuis berhasil ditambahkan');

})->middleware(['auth'])->name('kuis.add.store');
Route::get('/kuis/add', function () {
    return view('data.tambah.add-kuis');
})->middleware(['auth'])->name('kuis.add');

Route::post('/materi/add', function (Request $request) {

    $file = $request->file('file_pdf');
    $path = $file->store('materi', 'public');

    \App\Models\Materi::create([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'dosen' => $request->dosen,
        'semester' => $request->semester,
        'ukuran_file' => round($file->getSize() / 1024, 2) . ' KB',
        'file_pdf' => $path,
    ]);

    return redirect()->route('materi.index');

})->middleware(['auth'])->name('materi.add.store');

Route::get('/users/add', function () {
    return view('data.tambah.add-user');
})->middleware(['auth'])->name('users.add');

Route::post('/users/add', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'role' => 'required',
        'status' => 'required',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'status' => $request->status,
    ]);

    return redirect()->route('users.index')
        ->with('success', 'User berhasil ditambahkan');

})->middleware(['auth'])->name('users.add.store');
Route::get('/mahasiswa/materi', function () {

    $materis = \App\Models\Materi::latest()->get();

    return view('mahasiswa.materi-mahasiswa', compact('materis'));

})->middleware(['auth'])->name('mahasiswa.materi');
Route::get('/mahasiswa/materi', function () {
    return view('mahasiswa.materi-mahasiswa');
})->middleware(['auth'])->name('mahasiswa.materi');
Route::get('/mahasiswa/nilai-saya', function () {
    return view('mahasiswa.nilai-saya');
})->middleware(['auth'])->name('mahasiswa.nilai-saya');
    Route::get('/mahasiswa/nilai-saya', function () {
    return view('mahasiswa.nilai-saya');
})->middleware(['auth'])->name('mahasiswa.nilai-saya');
Route::post('/mahasiswa/kerjakan-soal/submit', function (Request $request) {

    $kuis = \App\Models\Kuis::findOrFail($request->kuis_id);

    $soals = \App\Models\Soal::where('kuis_id', $kuis->id)->get();

    $benar = 0;
    $salah = 0;

    foreach ($soals as $soal) {
        $jawabanUser = $request->jawaban[$soal->id] ?? null;

        if ($jawabanUser == $soal->jawaban_benar) {
            $benar++;
        } else {
            $salah++;
        }
    }

    $nilai = $benar * 10;

    \App\Models\HasilKuis::create([
        'user_id' => auth()->id(),
        'nama_mahasiswa' => auth()->user()->name,
        'kuis_id' => $kuis->id,
        'mata_kuliah' => $soals->first()->matkul ?? $kuis->judul_kuis,
        'jumlah_benar' => $benar,
        'jumlah_salah' => $salah,
        'nilai' => $nilai,
        'status' => $nilai >= 70 ? 'lulus' : 'tidak_lulus',
    ]);

    return redirect()->route('dashboard.mahasiswa')
        ->with('success', 'Jawaban berhasil dikirim. Nilai kamu: ' . $nilai);

})->middleware(['auth'])->name('mahasiswa.submit-kuis');
Route::post('/mahasiswa/kerjakan-soal', function (Request $request) {

    // proses cek jawaban disini

    return redirect()->route('dashboard.mahasiswa');

})->middleware(['auth'])->name('mahasiswa.submit-kuis');
Route::delete('/dosen/soal/{id}', function ($id) {

    $soal = \App\Models\Soal::findOrFail($id);

    $soal->delete();

    return redirect()->route('dosen.bank-soal')
        ->with('success', 'Soal berhasil dihapus');

})->middleware(['auth'])->name('dosen.soal.delete');
Route::get('/dosen/materi/download/{id}', function ($id) {
    $materi = \App\Models\Materi::findOrFail($id);

    $path = storage_path('app/public/' . $materi->file_pdf);

    if (!file_exists($path)) {
        abort(404, 'File tidak ditemukan');
    }

    return response()->download($path);
})->middleware(['auth'])->name('dosen.materi.download');
Route::delete('/dosen/materi/{id}', function ($id) {

    $materi = \App\Models\Materi::findOrFail($id);

    $materi->delete();

    return redirect()->route('dosen.materi')
        ->with('success', 'Materi berhasil dihapus');

})->middleware(['auth'])->name('dosen.materi.delete');

Route::get('/mahasiswa/kerjakan-soal', function () {
    return view('mahasiswa.kerjakan-soal');
})->middleware(['auth'])->name('mahasiswa.kerjakan-soal');
Route::get('/mahasiswa/kerjakan-kuis', function () {
    return view('mahasiswa.kerjakan-kuis');
})->middleware(['auth'])->name('mahasiswa.kerjakan-kuis');

Route::get('/mahasiswa/mulai-kuis', function () {
    return view('mahasiswa.mulai-kuis');
})->middleware(['auth'])->name('mahasiswa.mulai-kuis');

Route::delete('/hasilkuis/{id}', function ($id) {

    $hasil = \App\Models\HasilKuis::findOrFail($id);

    $hasil->delete();

    return back()->with('success', 'Data hasil kuis berhasil dihapus');

})->middleware(['auth'])->name('hasilkuis.delete');
Route::get('/dosen/bank-soal', function () {

    $soals = \App\Models\Soal::latest()->get();

    return view('dosen.bank-soal-dosen', compact('soals'));

})->middleware(['auth'])->name('dosen.bank-soal');


Route::get('/dosen/mahasiswa', function () {

    $mahasiswas = \App\Models\User::where('role', 'mahasiswa')
        ->latest()
        ->get();

    return view('dosen.mahasiswa-dosen', compact('mahasiswas'));

})->middleware(['auth'])->name('dosen.mahasiswa');
Route::get('/dosen/materi/create', function () {
    return view('dosen.tambah.add-materi-dosen');
})->middleware(['auth'])->name('dosen.materi.create');
Route::post('/dosen/materi', function (Request $request) {

    $request->validate([
        'judul' => 'required',
        'kategori' => 'required',
        'semester' => 'required',
        'file_pdf' => 'required|mimes:pdf|max:2048',
    ]);

    $file = $request->file('file_pdf');
    $path = $file->store('materi', 'public');

    \App\Models\Materi::create([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'dosen' => auth()->user()->name,
        'semester' => $request->semester,
        'ukuran_file' => round($file->getSize() / 1024, 2) . ' KB',
        'file_pdf' => $path,
    ]);

    return redirect()->route('dosen.materi')
        ->with('success', 'Materi berhasil diupload');

})->middleware(['auth'])->name('dosen.materi.store');
Route::get('/dosen/materi', function () {

    $materis = \App\Models\Materi::where(
        'dosen',
        auth()->user()->name
    )->latest()->get();

    return view('dosen.materi-dosen', compact('materis'));

})->middleware(['auth'])->name('dosen.materi');
Route::get('/tambah-kuis', function () {
    return view('data.tambah.tambah-kuis');
})->middleware(['auth'])->name('tambah.kuis');
Route::get('/dashboard/dosen', function () {

    $totalKuis = \App\Models\Kuis::count();
    $totalSoal = \App\Models\Soal::count();
    $totalMahasiswa = \App\Models\User::where('role', 'mahasiswa')->count();

    $totalPengerjaan = 0;
    $rataSkor = 0;

    $kuiss = \App\Models\Kuis::latest()->take(5)->get();
    $aktivitas = \App\Models\Aktivitas::latest()->take(5)->get();

    return view('dashboard.dosen', compact(
        'totalKuis',
        'totalSoal',
        'totalMahasiswa',
        'totalPengerjaan',
        'rataSkor',
        'kuiss',
        'aktivitas'
    ));

})->middleware(['auth'])->name('dashboard.dosen');
Route::delete('/soal/{id}', function ($id) {
    $soal = \App\Models\Soal::findOrFail($id);
    $soal->delete();

    return redirect()->route('hasilkuis.index')
        ->with('success', 'Soal berhasil dihapus');
})->middleware(['auth'])->name('soal.delete');
Route::delete('/kuis/{id}', function ($id) {

    $kuis = \App\Models\Kuis::findOrFail($id);

    $kuis->delete();

    return redirect()->route('kuis.index')
        ->with('success', 'Kuis berhasil dihapus');

})->middleware(['auth'])->name('kuis.delete');
Route::get('/kuis/{id}/edit', function ($id) {

    $kuis = \App\Models\Kuis::findOrFail($id);

    return view('kuis.edit', compact('kuis'));

})->middleware(['auth'])->name('kuis.edit');
Route::get('/materi/{id}/edit', function ($id) {
    $materi = \App\Models\Materi::findOrFail($id);

    return view('materi.edit', compact('materi'));
})->middleware(['auth'])->name('materi.edit');

Route::delete('/materi/{id}', function ($id) {
    $materi = \App\Models\Materi::findOrFail($id);
    $materi->delete();

    return redirect()->route('materi.index');
})->middleware(['auth'])->name('materi.delete');
Route::get('/dashboard', function () {
    return view('dashboard.admin', [
        'totalPengguna' => \App\Models\User::count(),
        'totalDosen' => \App\Models\User::where('role', 'dosen')->count(),
        'totalMahasiswa' => \App\Models\User::where('role', 'mahasiswa')->count(),
        'totalMateri' => \App\Models\Materi::count(),
        'totalKuis' => \App\Models\Kuis::count(),
        'aktivitas' => \App\Models\Aktivitas::latest()->take(5)->get(),
        'users' => \App\Models\User::latest()->take(5)->get(),
    ]);
})->middleware(['auth'])->name('dashboard');

Route::get('/dosen/kuis-saya', function () {

    $kuiss = \App\Models\Kuis::where(
        'dosen',
        auth()->user()->name
    )->latest()->get();

    return view('dosen.kuis-saya', compact('kuiss'));

})->middleware(['auth'])->name('dosen.kuis-saya');
Route::get('/dashboard/mahasiswa', function () {
    return view('dashboard.mahasiswa');
})->middleware(['auth'])->name('dashboard.mahasiswa');
Route::get('/materi/create', function () {

    return view('data.tambah.add-materi');

})->middleware(['auth'])->name('materi.create');
/*
|--------------------------------------------------------------------------
| TAMBAH KUIS
|--------------------------------------------------------------------------
*/
Route::get('/dosen/tambah-kuis', function () {
    return view('dosen.tambah-kuis');
})->middleware(['auth'])->name('dosen.kuis.create');
Route::get('/kuis/create', function () {
    return view('data.tambah.add-kuis');
})->middleware(['auth'])->name('kuis.create');

/*
|--------------------------------------------------------------------------
| SIMPAN KUIS + UPLOAD PDF
|--------------------------------------------------------------------------
*/

Route::post('/kuis', function (Request $request) {

    $request->validate([
        'judul_kuis' => 'required',
        'jumlah_soal' => 'required|integer|min:1',
        'file_pdf' => 'required|mimes:pdf|max:2048',
    ]);

    $file = $request->file('file_pdf');
    $path = $file->store('kuis', 'public');

    $kesulitanAcak = collect([
        'mudah',
        'sedang',
        'sulit'
    ])->random();

    Kuis::create([
        'judul_kuis' => $request->judul_kuis,
        'dosen' => auth()->user()->name,
        'jumlah_soal' => $request->jumlah_soal,
        'tingkat_kesulitan' => $kesulitanAcak,
        'file_pdf' => $path,
    ]);

    Aktivitas::create([
        'icon' => '📝',
        'aktivitas' => 'Kuis Baru Ditambahkan',
        'waktu' => now()->format('H:i')
    ]);

    return redirect()->route('kuis.index')
        ->with('success', 'Kuis berhasil ditambahkan');

})->middleware(['auth'])->name('kuis.store');

Route::post('/kuis', function (Request $request) {

    $request->validate([
        'judul_kuis' => 'required',
        'jumlah_soal' => 'required|integer|min:1',
        'file_pdf' => 'required|mimes:pdf|max:2048',
    ]);

    $file = $request->file('file_pdf');
    $path = $file->store('kuis', 'public');

    $kesulitanAcak = collect([
        'mudah',
        'sedang',
        'sulit'
    ])->random();

    Kuis::create([
        'judul_kuis' => $request->judul_kuis,
        'dosen' => auth()->user()->name,
        'jumlah_soal' => $request->jumlah_soal,
        'tingkat_kesulitan' => $kesulitanAcak,
        'file_pdf' => $path,
    ]);

    Aktivitas::create([
        'icon' => '📝',
        'aktivitas' => 'Kuis Baru Ditambahkan',
        'waktu' => now()->format('H:i')
    ]);

    return redirect()->route('dosen.kuis-saya')
        ->with('success', 'Kuis berhasil ditambahkan');

})->middleware(['auth'])->name('dosen.kuis.store');
/*
|--------------------------------------------------------------------------
| GENERATE SOAL DARI PDF
|--------------------------------------------------------------------------
*/

Route::get('/kuis/generate/{id}', function ($id) {

    $kuis = Kuis::findOrFail($id);

    if (!$kuis->file_pdf) {
        return back()->with('error', 'File PDF kosong');
    }

    $filePath = storage_path('app/public/' . $kuis->file_pdf);

    if (!file_exists($filePath)) {
        return back()->with('error', 'File PDF tidak ditemukan');
    }

    $response = Http::timeout(300)
        ->attach(
            'pdf',
            file_get_contents($filePath),
            'materi.pdf'
        )
        ->post('http://127.0.0.1:5000/generate', [
            'jumlah_soal' => $kuis->jumlah_soal,
        ]);

    $soals = $response->json();

    foreach ($soals as $soal) {
       Soal::create([
    'kuis_id' => $kuis->id,
    'matkul' => $kuis->judul_kuis,
    'pertanyaan' => $soal['pertanyaan'],
    'pilihan_a' => $soal['pilihan_a'],
    'pilihan_b' => $soal['pilihan_b'],
    'pilihan_c' => $soal['pilihan_c'],
    'pilihan_d' => $soal['pilihan_d'],
    'jawaban_benar' => $soal['jawaban_benar'],
    'kesulitan' => $soal['kesulitan'],
]);
    }

    return back()->with('success', 'Soal berhasil digenerate');

})->middleware(['auth'])->name('kuis.generate');
Route::post('/materi', function (\Illuminate\Http\Request $request) {

    $request->validate([
        'judul' => 'required',
        'kategori' => 'required',
        'dosen' => 'required',
        'semester' => 'required',
        'file_pdf' => 'required|mimes:pdf|max:2048',
    ]);

    $file = $request->file('file_pdf');
    $path = $file->store('materi', 'public');

    \App\Models\Materi::create([
        'judul' => $request->judul,
        'kategori' => $request->kategori,
        'dosen' => $request->dosen,
        'semester' => $request->semester,
        'ukuran_file' => round($file->getSize() / 1024, 2) . ' KB',
        'file_pdf' => $path,
    ]);

    return redirect()->route('materi.index');

})->middleware(['auth'])->name('materi.store');
Route::get('/mahasiswa/create', function () {
    return view('data.tambah.add-mahasiswa');
})->middleware(['auth'])->name('mahasiswa.create');

Route::post('/mahasiswa', function (\Illuminate\Http\Request $request) {
    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'mahasiswa',
        'status' => $request->status,
    ]);

    return redirect()->route('mahasiswa.index');
})->middleware(['auth'])->name('mahasiswa.store');

Route::get('/dosen/create', function () {

    return view('data.tambah.add-dosen');

})->middleware(['auth'])->name('dosen.create');


Route::post('/dosen', function (\Illuminate\Http\Request $request) {

    \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => 'dosen',
        'status' => $request->status,
    ]);

    return redirect()->route('dosen.index');

})->middleware(['auth'])->name('dosen.store');

Route::get('/users/create', function () {

    return view('data.tambah.add-user');

})->middleware(['auth'])->name('users.create');

Route::post('/users', function (Request $request) {

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required',
        'role' => 'required',
        'status' => 'required',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
        'status' => $request->status,
    ]);

    \App\Models\Aktivitas::create([
        'icon' => '👥',
        'aktivitas' => 'User Baru Ditambahkan',
        'waktu' => now()->format('H:i')
    ]);

    return redirect()->route('users.index');

})->middleware(['auth'])->name('users.store');
Route::delete('/dosen/kuis/{id}', function ($id) {

    $kuis = \App\Models\Kuis::findOrFail($id);

    $kuis->delete();

    return back();

})->name('dosen.kuis.delete');
Route::get('/dosen', fn () => view('data.dosen'))->middleware(['auth'])->name('dosen.index');
Route::get('/mahasiswa', fn () => view('data.mahasiswa'))->middleware(['auth'])->name('mahasiswa.index');
Route::get('/materi', fn () => view('data.materi'))->middleware(['auth'])->name('materi.index');
Route::get('/kuis', fn () => view('data.kuis'))->middleware(['auth'])->name('kuis.index');
Route::get('/hasilkuis', fn () => view('data.hasilkuis'))->middleware(['auth'])->name('hasilkuis.index');
Route::get('/users', function () {

    $users = \App\Models\User::latest()->get();

    return view('data.user', compact('users'));

})->middleware(['auth'])->name('users.index');
Route::delete('/users/{id}', function ($id) {

    $user = User::findOrFail($id);

    $user->delete();

    return redirect('/dashboard');

})->name('users.delete');
Route::get('/users/{id}/edit', function ($id) {

    $user = User::findOrFail($id);

    return view('users.edit', compact('user'));

})->name('users.edit');


Route::put('/users/{id}', function (Request $request, $id) {

    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required',
        'status' => 'required',
    ], [
        'email.unique' => 'Email sudah digunakan user lain.',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'status' => $request->status,
    ]);

    return redirect()->route('users.index')
        ->with('success', 'User berhasil diupdate');

})->middleware(['auth'])->name('users.update');

Route::get('/', function () {
    return view('welcome');
});


Route::get('/', function () {
    return view('welcome');
});

   

require __DIR__.'/auth.php';