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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pendaftaran')->references('id')->on('pendaftaran_pasien');
            $table->text('gejala');
            $table->text('diagnosis');
            $table->text('terapi');
            $table->foreignId('id_pasien')->nullable()->constrained('users');
            $table->foreignId('id_dokter')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
