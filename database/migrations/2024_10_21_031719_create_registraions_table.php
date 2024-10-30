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

            // Foreign key for user tracking
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Custom Form ID for each registration
            $table->string('form_id')->unique()->nullable();

            // Step 1: Data Siswa (cannot be nullable as it's filled first)
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
            $table->string('nik', 16)->unique();
            $table->string('nomor_kk', 16);
            $table->string('no_regis_akta');
            $table->string('jarak');
            $table->string('tempat_tinggal');
            $table->json('transportasi'); // Store multiple transport options as JSON
            $table->string('nama_sekolah_dulu')->nullable();
            $table->string('nspn_sekolah')->nullable();
            $table->string('alamat_sekolah_dulu')->nullable();
            $table->string('desa_sekolah')->nullable();
            $table->string('kabupaten_sekolah')->nullable();
            $table->string('nisn')->nullable();
            $table->date('tanggal_sktb')->nullable();
            $table->string('lama_tk')->nullable();

            // Step 2: Data Orang Tua (make nullable, filled in later step)
            $table->string('nama_lengkap_ayah')->nullable();
            $table->string('nik_ayah', 16)->nullable();
            $table->string('nama_lengkap_ibu')->nullable();
            $table->string('nik_ibu', 16)->nullable();
            $table->string('status_ayah')->nullable();
            $table->string('status_ibu')->nullable();
            $table->string('tempat_lahir_ayah')->nullable();
            $table->date('tanggal_lahir_ayah')->nullable();
            $table->string('tempat_lahir_ibu')->nullable();
            $table->date('tanggal_lahir_ibu')->nullable();
            $table->string('alamat_ortu')->nullable();
            $table->string('kode_pos_ortu')->nullable();
            $table->string('no_telp_ortu')->nullable();
            $table->string('kantor_ayah')->nullable();
            $table->string('kantor_ibu')->nullable();
            $table->string('no_hp_ayah')->nullable();
            $table->string('no_hp_ibu')->nullable();
            $table->string('kawasan_tinggal')->nullable();
            $table->string('status_tempat_tinggal')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pendidikan_ayah_lain')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pendidikan_ibu_lain')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ayah_detail')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pekerjaan_ibu_detail')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('jumlah_tanggungan')->nullable();
            $table->json('nama_lengkap_tanggungan')->nullable();
            $table->json('sekolah_tanggungan')->nullable();
            $table->json('kelas_tanggungan')->nullable();
            $table->json('uang_sekolah_tanggungan')->nullable();
            $table->json('keterangan_tanggungan')->nullable();

            // Step 3: Data Wali (make nullable, filled in later step)
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

            // File path for proof of payment
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status')->default('pending');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
