<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soals';

    protected $fillable = [
    'kuis_id',
    'matkul',
    'pertanyaan',
    'pilihan_a',
    'pilihan_b',
    'pilihan_c',
    'pilihan_d',
    'jawaban_benar',
    'kesulitan',
];

    public function kuis()
    {
        return $this->belongsTo(Kuis::class);
    }
}