<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilKuis extends Model
{
    protected $fillable = [
    'user_id',
    'nama_mahasiswa',
    'kuis_id',
    'mata_kuliah',
    'jumlah_benar',
    'jumlah_salah',
    'nilai',
    'status',
];
}
