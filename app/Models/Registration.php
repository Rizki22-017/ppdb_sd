<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Specify the fields that are mass assignable
    protected $fillable = [
        'user_id', // Track the user who submits the registration

        'form_id',

        // Step 1: Data Siswa
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'tinggi',
        'berat',
        'anak_ke',
        'jumlah_saudara_kandung',
        'jumlah_saudara_tiri',
        'jumlah_saudara_angkat',
        'bahasa',
        'alamat_anak',
        'nik',
        'nomor_kk',
        'no_regis_akta',
        'jarak',
        'tempat_tinggal',
        'transportasi',

        // Step 2: Data Orang Tua
        'nama_lengkap_ayah',
        'nik_ayah',
        'nama_lengkap_ibu',
        'nik_ibu',
        'status_ayah',
        'status_ibu',
        'tempat_lahir_ayah',
        'tanggal_lahir_ayah',
        'tempat_lahir_ibu',
        'tanggal_lahir_ibu',
        'alamat_ortu',
        'kode_pos_ortu',
        'no_telp_ortu',
        'kantor_ayah',
        'kantor_ibu',
        'no_hp_ayah',
        'no_hp_ibu',
        'kawasan_tinggal',
        'status_tempat_tinggal',
        'pendidikan_ayah',
        'pendidikan_ayah_lain',
        'pendidikan_ibu',
        'pendidikan_ibu_lain',
        'pekerjaan_ayah',
        'pekerjaan_ayah_detail',
        'pekerjaan_ibu',
        'pekerjaan_ibu_detail',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'jumlah_tanggungan',
        'nama_lengkap_tanggungan',
        'sekolah_tanggungan',
        'kelas_tanggungan',
        'uang_sekolah_tanggungan',
        'keterangan_tanggungan',

        // Step 3: Data Wali
        'nama_wali',
        'tempat_lahir_wali',
        'tanggal_lahir_wali',
        'pendidikan_wali',
        'hubungan_murid_wali',
        'tanggungan_wali',
        'alamat_wali',
        'kodepos_wali',
        'telepon_wali',
        'alamat_kantor_wali',
        'bukti_pembayaran',
        'status',
    ];

    // Cast the 'transportasi' field to an array
    protected $casts = [
        'transportasi' => 'array',
        'nama_lengkap_tanggungan' => 'array',
        'sekolah_tanggungan' => 'array',
        'kelas_tanggungan' => 'array',
        'uang_sekolah_tanggungan' => 'array',
        'keterangan_tanggungan' => 'array',
    ];

    // Define the relationship to the user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
