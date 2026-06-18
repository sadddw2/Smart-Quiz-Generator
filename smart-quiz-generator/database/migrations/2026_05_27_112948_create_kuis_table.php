<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('kuis', function (Blueprint $table) {

        $table->id();

        $table->string('judul_kuis');

        $table->string('dosen');

        $table->foreignId('materi_id')
            ->constrained('materis')
            ->onDelete('cascade');

        $table->integer('jumlah_soal');

        $table->enum('tingkat_kesulitan', [
            'mudah',
            'sedang',
            'sulit'
        ]);



        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuis');
    }
};
