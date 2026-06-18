# Smart Quiz Generator

## Deskripsi

Smart Quiz Generator merupakan aplikasi berbasis web yang dikembangkan untuk membantu proses pembuatan dan pengelolaan kuis secara digital. Sistem memungkinkan dosen mengunggah materi pembelajaran dalam format PDF, menghasilkan soal secara otomatis, mengelola bank soal, membuat kuis, serta memantau hasil evaluasi mahasiswa.

## Fitur Utama

* Manajemen User (Admin, Dosen, Mahasiswa)
* Upload Materi PDF
* Generate Soal Otomatis
* Manajemen Bank Soal
* Manajemen Kuis
* Pengerjaan Kuis Online
* Hasil dan Nilai Kuis
* Dashboard Berdasarkan Role

## Teknologi yang Digunakan

* Laravel 12
* PHP 8.x
* MySQL
* Python Flask
* Tailwind CSS
* JavaScript

## Getting Started

### 1. Clone Repository

```bash
git clone https://github.com/sadddw2/smart-quiz-generator.git
cd smart-quiz-generator
```

### 2. Install Dependency Laravel

```bash
composer install
```

### 3. Install Dependency Frontend

```bash
npm install
```

### 4. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`

```bash
cp .env.example .env
```

Generate application key:

```bash
php artisan key:generate
```

### 5. Konfigurasi Database

Buat database baru pada MySQL, kemudian sesuaikan konfigurasi database pada file `.env`.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart_quiz_generator
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Migrasi Database

```bash
php artisan migrate
```

### 7. Jalankan Laravel

```bash
php artisan serve
```

Aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

### 8. Jalankan Python Flask

Masuk ke folder Python:

```bash
cd python-ai
```

Install dependency:

```bash
pip install flask pypdf
```

Jalankan server:

```bash
python app.py
```

Server Flask berjalan pada:

```text
http://127.0.0.1:5000
```

### 9. Jalankan Frontend

```bash
npm run dev
```

## Struktur Pengguna

### Admin

* Kelola User
* Kelola Dosen
* Kelola Mahasiswa
* Kelola Materi
* Kelola Kuis
* Kelola Bank Soal

### Dosen

* Upload Materi
* Generate Soal
* Kelola Kuis
* Kelola Bank Soal

### Mahasiswa

* Melihat Materi
* Mengerjakan Kuis
* Melihat Hasil Kuis

## Author

Muhammad Ismail Ardhafillah

Program Studi Informatika

UBHINUS
