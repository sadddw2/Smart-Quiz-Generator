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
    Schema::create('soals', function (Blueprint $table) {

        $table->id();

        $table->foreignId('kuis_id')
            ->constrained('kuis')
            ->onDelete('cascade');

        $table->text('pertanyaan');

        $table->text('pilihan_a');
        $table->text('pilihan_b');
        $table->text('pilihan_c');
        $table->text('pilihan_d');

        $table->string('jawaban_benar');

        $table->enum('kesulitan', [
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
        Schema::dropIfExists('soals');
    }
};
