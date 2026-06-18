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
    Schema::create('hasil_kuis', function (Blueprint $table) {

        $table->id();

        $table->unsignedBigInteger('user_id');
        $table->unsignedBigInteger('kuis_id');

        $table->string('mata_kuliah');

        $table->integer('jumlah_benar')->default(0);
        $table->integer('jumlah_salah')->default(0);

        $table->integer('nilai')->default(0);

        $table->enum('status', [
            'lulus',
            'tidak_lulus'
        ])->default('tidak_lulus');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_kuis');
    }
};
