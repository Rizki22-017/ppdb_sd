<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
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
        'namaLengkapAyah',
        'nikAyah',
        'namaLengkapIbu',
        'nikIbu',
        'tempatLahirAyah',
        'tanggalLahirAyah',
        'tempatLahirIbu',
        'tanggalLahirIbu',
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
        'pekerjaanIbu',
        'penghasilanAyah',
        'penghasilanIbu',
        'jumlahtanggungan',
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

    protected $casts = [
        'transportasi' => 'array',
    ];
}