<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Registration;
use Illuminate\Support\Facades\DB;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('registrations')->insert([
            // Step 1: Data Siswa
            'namaLengkap' => 'John Doe',
            'jenisKelamin' => 'Laki-laki',
            'tempatLahir' => 'Jakarta',
            'tanggalLahir' => '2010-05-20',
            'tinggi' => '150',
            'berat' => '45',
            'anakke' => '1',
            'jumlahSaudaraKandung' => '2',
            'jumlahSaudaraTiri' => '0',
            'jumlahSaudaraAngkat' => '0',
            'bahasa' => 'Indonesia',
            'alamatAnak' => 'Jl. Merdeka No. 1, Jakarta',
            'nik' => '3201234567890123',
            'nomorKK' => '3201234567890123',
            'noRegisAkta' => 'AKT-123456',
            'jarak' => '5 km',
            'tempatTinggal' => 'Orang Tua',
            'transportasi' => json_encode(['Mobil', 'Motor']),

            // Step 2: Data Orang Tua
            'namaLengkapAyah' => 'Dono Santoso',
            'nikAyah' => '3201987654321234',
            'namaLengkapIbu' => 'Lisa Setiawan',
            'nikIbu' => '3201987654321235',
            'tempatLahirA' => 'Bandung',
            'tanggalLahirA' => '1980-07-15',
            'tempatLahirI' => 'Surabaya',
            'tanggalLahirI' => '1983-09-20',
            'alamatOrtu' => 'Jl. Pahlawan No. 5, Jakarta',
            'kodeposOrtu' => '12345',
            'notelpOrtu' => '081234567890',
            'kantorAyah' => 'PT Maju Jaya',
            'kantorIbu' => 'CV Kreatif',
            'nohpAyah' => '081112223333',
            'nohpIbu' => '081112223344',
            'statusAyah' => 'Bekerja',
            'statusIbu' => 'Bekerja',
            'pendidikanAyah' => 'S1',
            'pendidikanIbu' => 'S1',
            'pekerjaanAyah' => 'Karyawan',
            'pekerjaanIbu' => 'Pengusaha',
            'penghasilanAyah' => 'Rp. 10.000.000',
            'penghasilanIbu' => 'Rp. 8.000.000',
            'jumlahtanggungan' => '3',
            'namaLengkapTg' => 'Andi Putra',
            'sekolahTg' => 'SD Negeri 1',
            'kelasTg' => '3',
            'uangSekolahTg' => '500000',
            'keteranganTg' => 'Menerima beasiswa',

            // Step 3: Data Wali
            'namaWali' => 'Budi Santoso',
            'tempatLahirWali' => 'Jakarta',
            'tanggalLahirWali' => '1975-12-05',
            'pendidikanWali' => 'SMA',
            'hubunganMuridWali' => 'Paman',
            'tanggunganWali' => 'Menanggung Uang Sekolah',
            'alamatWali' => 'Jl. Melati No. 2, Jakarta',
            'kodeposWali' => '12345',
            'teleponWali' => '0812233445566',
            'alamatKantorWali' => 'PT Sejahtera',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}