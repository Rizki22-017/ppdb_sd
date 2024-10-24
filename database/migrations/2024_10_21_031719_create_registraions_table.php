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
            $table->string('nik', 16);
            $table->string('nomorKK', 16);
            $table->string('noRegisAkta');
            $table->string('jarak');
            $table->string('tempatTinggal');
            $table->json('transportasi'); // Store multiple transport options as JSON

            // Step 2: Data Orang Tua
            $table->string('namaLengkapAyah');
            $table->string('nikAyah', 16);
            $table->string('namaLengkapIbu');
            $table->string('nikIbu', 16);
            $table->string('tempatLahirA');
            $table->date('tanggalLahirA');
            $table->string('tempatLahirI');
            $table->date('tanggalLahirI');
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
            $table->string('pekerjaanAyahDetail')->nullable();
            $table->string('pekerjaanIbu');
            $table->string('pekerjaanIbuDetail')->nullable();
            $table->string('penghasilanAyah');
            $table->string('penghasilanIbu');
            $table->string('jumlahtanggungan');
            $table->string('namaLengkapTg')->nullable();
            $table->string('sekolahTg')->nullable();
            $table->string('kelasTg')->nullable();
            $table->string('uangSekolahTg')->nullable();
            $table->string('keteranganTg')->nullable();

            // New fields for "Kawasan Tinggal" and "Status Tempat Tinggal"
            $table->string('kawasanTinggal'); // To store "Perumahan/Komplek", "Ruko", or "Perkampungan"
            $table->string('statusTempatTinggal'); // To store "Milik Pribadi", "Sewa", or "Tumpangan"



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