# Smart Quiz Generator

Smart Quiz Generator adalah aplikasi berbasis Laravel yang digunakan untuk membuat dan mengelola kuis secara online bagi dosen dan mahasiswa.

## Features

* Login Multi Role (Admin, Dosen, Mahasiswa)
* Upload Materi PDF
* Manajemen Kuis
* Bank Soal
* Hasil Kuis
* Role-Based Dashboard
* Feature Testing

---

# Requirements

* PHP 8.2+
* Composer
* Node.js
* NPM
* MySQL
* Laravel 12

---

# Getting Started

## 1. Clone Repository

bash
git clone https://github.com/sadddw2/Smart-Quiz-Generator.git
cd Smart-Quiz-Generator


## 2. Install Dependencies

bash
composer install
npm install


## 3. Configure Environment

Copy file .env

bash
cp .env.example .env


Atur konfigurasi database pada file .env

.env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=smart_quiz_generator
DB_USERNAME=root
DB_PASSWORD=


## 4. Generate Application Key

bash
php artisan key:generate


## 5. Run Migration

bash
php artisan migrate


## 6. Create Storage Link

bash
php artisan storage:link


## 7. Run Development Server

bash
php artisan serve


Aplikasi dapat diakses melalui:

txt
http://127.0.0.1:8000


---

# Testing

Menjalankan seluruh test:

bash
php artisan test


Menjalankan test tertentu:

bash
php artisan test tests/Feature/UserAccessTest.php
php artisan test tests/Feature/KuisTest.php
php artisan test tests/Feature/UserCrudTest.php
php artisan test tests/Feature/RoleAccessTest.php


---

# Author

Ardhafillah

Application Project III

