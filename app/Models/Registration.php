<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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
        'transportasi', // Array
        'nama_sekolah_dulu',
        'nspn_sekolah',
        'alamat_sekolah_dulu',
        'desa_sekolah',
        'kabupaten_sekolah',
        'nisn',
        'tanggal_sktb',
        'lama_tk',


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
        'keterangan_tanggungan', // Array fields

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
        'status'
    ];

    protected $casts = [
        'transportasi' => 'array',
        'nama_lengkap_tanggungan' => 'array',
        'sekolah_tanggungan' => 'array',
        'kelas_tanggungan' => 'array',
        'uang_sekolah_tanggungan' => 'array',
        'keterangan_tanggungan' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper function to retrieve all registration data as an associative array.
     * Useful for populating PDFs or other structured outputs.
     */
    public function getFormattedData()
    {
        return [
            'nama_lengkap' => $this->nama_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'alamat' => $this->alamat_anak,
            'nik' => $this->nik,
            'status' => $this->status,
            'transportasi' => implode(', ', $this->transportasi ?? []), // Join array values for easy display
            // Add more fields as needed, with custom formatting if required
        ];
    }
}
