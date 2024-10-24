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
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('tinggi');
            $table->string('berat');
            $table->string('anak_ke')->nullable();
            $table->string('jumlah_saudara_kandung')->nullable();
            $table->string('jumlah_saudara_tiri')->nullable();
            $table->string('jumlah_saudara_angkat')->nullable();
            $table->string('bahasa');
            $table->string('alamat_anak');
            $table->string('nik', 16);
            $table->string('nomor_kk', 16);
            $table->string('no_regis_akta');
            $table->string('jarak');
            $table->string('tempat_tinggal');
            $table->json('transportasi'); // Store multiple transport options as JSON

            // Step 2: Data Orang Tua
            $table->string('nama_lengkap_ayah');
            $table->string('nik_ayah', 16);
            $table->string('nama_lengkap_ibu');
            $table->string('nik_ibu', 16);
            $table->string('status_ayah');
            $table->string('status_ibu');
            $table->string('tempat_lahir_ayah');
            $table->date('tanggal_lahir_ayah');
            $table->string('tempat_lahir_ibu');
            $table->date('tanggal_lahir_ibu');
            $table->string('alamat_ortu');
            $table->string('kode_pos_ortu');
            $table->string('no_telp_ortu');
            $table->string('kantor_ayah');
            $table->string('kantor_ibu');
            $table->string('no_hp_ayah');
            $table->string('no_hp_ibu');
            $table->string('kawasan_tinggal');
            $table->string('status_tempat_tinggal');
            $table->string('pendidikan_ayah');
            $table->string('pendidikan_ayah_lain')->nullable();
            $table->string('pendidikan_ibu');
            $table->string('pendidikan_ibu_lain')->nullable();
            $table->string('pekerjaan_ayah');
            $table->string('pekerjaan_ayah_detail')->nullable();
            $table->string('pekerjaan_ibu');
            $table->string('pekerjaan_ibu_detail')->nullable();
            $table->string('penghasilan_ayah');
            $table->string('penghasilan_ibu');
            $table->string('jumlah_tanggungan');
            $table->string('nama_lengkap_tanggungan')->nullable(false);
            $table->string('sekolah_tanggungan')->nullable();
            $table->string('kelas_tanggungan')->nullable();
            $table->string('uang_sekolah_tanggungan')->nullable();
            $table->string('keterangan_tanggungan')->nullable();


            // Step 3: Data Wali
            $table->string('nama_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('hubungan_murid_wali')->nullable();
            $table->string('tanggungan_wali')->nullable();
            $table->string('alamat_wali')->nullable();
            $table->string('kodepos_wali')->nullable();
            $table->string('telepon_wali')->nullable();
            $table->string('alamat_kantor_wali')->nullable();

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
