<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kuis extends Model
{
    protected $table = 'kuis';

    protected $fillable = [
    'judul_kuis',
    'dosen',
    'jumlah_soal',
    'tingkat_kesulitan',
    'file_pdf',
];

    public function soal()
    {
        return $this->hasMany(Soal::class);
    }

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}