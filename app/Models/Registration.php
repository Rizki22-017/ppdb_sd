<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = [
        // Step 1: Data Siswa
        'namaLengkap',
        'jenisKelamin',
        'tempatLahir',
        'tanggalLahir',
        'tinggi',
        'berat',
        'anakke',
        'jumlahSaudaraKandung',
        'jumlahSaudaraTiri',
        'jumlahSaudaraAngkat',
        'bahasa',
        'alamatAnak',
        'nik',
        'nomorKK',
        'noRegisAkta',
        'jarak',
        'tempatTinggal',
        'transportasi',

        // Step 2: Data Orang Tua
        'namaLengkapAyah',
        'nikAyah',
        'namaLengkapIbu',
        'nikIbu',
        'tempatLahirA',
        'tanggalLahirA',
        'tempatLahirI',
        'tanggalLahirI',
        'alamatOrtu',
        'kodeposOrtu',
        'notelpOrtu',
        'kantorAyah',
        'kantorIbu',
        'nohpAyah',
        'nohpIbu',
        'statusAyah',
        'statusIbu',
        'pendidikanAyah',
        'pendidikanIbu',
        'pekerjaanAyah',
        'pekerjaanAyahDetail', // New field for Ayah's job detail
        'pekerjaanIbu',
        'pekerjaanIbuDetail', // New field for Ibu's job detail
        'penghasilanAyah',
        'penghasilanIbu',
        'jumlahtanggungan',
        'kawasanTinggal', // New field for Kawasan Tinggal
        'statusTempatTinggal', // New field for Status Tempat Tinggal

        // Step 3: Data Wali
        'namaWali',
        'tempatLahirWali',
        'tanggalLahirWali',
        'pendidikanWali',
        'hubunganMuridWali',
        'tanggunganWali',
        'alamatWali',
        'kodeposWali',
        'teleponWali',
        'alamatKantorWali'
    ];

    // Cast the 'transportasi' field to an array
    protected $casts = [
        'transportasi' => 'array',
    ];

    // Define the relationship with Tanggungan model
    public function tanggungan()
    {
        return $this->hasMany(Tanggungan::class);
    }
}