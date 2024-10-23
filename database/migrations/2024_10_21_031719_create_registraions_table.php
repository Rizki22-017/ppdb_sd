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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // Step 1: Data Siswa
            $table->string('namaLengkap');
            $table->string('jenisKelamin');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->string('tinggi');
            $table->string('berat');
            $table->string('anakke')->nullable();
            $table->string('jumlahSaudaraKandung')->nullable();
            $table->string('jumlahSaudaraTiri')->nullable();
            $table->string('jumlahSaudaraAngkat')->nullable();
            $table->string('bahasa');
            $table->string('alamatAnak');
            $table->string('nik', 16)->unique(); // Added unique constraint for NIK
            $table->string('nomorKK', 16)->unique(); // Added unique constraint for Family Card Number
            $table->string('noRegisAkta');
            $table->string('jarak');
            $table->string('tempatTinggal');
            $table->json('transportasi'); // Store multiple transport options as JSON

            // Step 2: Data Orang Tua
            $table->string('namaLengkapAyah');
            $table->string('nikAyah', 16)->unique(); // Added unique constraint for NIK Ayah
            $table->string('namaLengkapIbu');
            $table->string('nikIbu', 16)->unique(); // Added unique constraint for NIK Ibu
            $table->string('tempatLahirA'); // Field name corrected
            $table->date('tanggalLahirA');  // Field name corrected
            $table->string('tempatLahirI'); // Field name corrected
            $table->date('tanggalLahirI');  // Field name corrected
            $table->string('alamatOrtu');
            $table->string('kodeposOrtu');
            $table->string('notelpOrtu');
            $table->string('kantorAyah');
            $table->string('kantorIbu');
            $table->string('nohpAyah');
            $table->string('nohpIbu');
            $table->string('statusAyah');
            $table->string('statusIbu');
            $table->string('pendidikanAyah');
            $table->string('pendidikanIbu');
            $table->string('pekerjaanAyah');
            $table->string('pekerjaanIbu');
            $table->string('penghasilanAyah');
            $table->string('penghasilanIbu');
            $table->string('jumlahtanggungan');
            $table->string('namaLengkapTg')->nullable(); // Nullable since there may be no tanggungan
            $table->string('sekolahTg')->nullable();
            $table->string('kelasTg')->nullable();
            $table->string('uangSekolahTg')->nullable();
            $table->string('keteranganTg')->nullable();

            // Step 3: Data Wali
            $table->string('namaWali')->nullable();
            $table->string('tempatLahirWali')->nullable();
            $table->date('tanggalLahirWali')->nullable();
            $table->string('pendidikanWali')->nullable();
            $table->string('hubunganMuridWali')->nullable();
            $table->string('tanggunganWali')->nullable();
            $table->string('alamatWali')->nullable();
            $table->string('kodeposWali')->nullable();
            $table->string('teleponWali')->nullable();
            $table->string('alamatKantorWali')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations'); // Fixed the typo in the table name
    }
};
