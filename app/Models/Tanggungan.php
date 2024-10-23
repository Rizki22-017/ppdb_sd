<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggungan extends Model
{
    use HasFactory;

    protected $fillable = ['registration_id', 'namaLengkap', 'sekolah', 'kelas', 'uangSekolah', 'keterangan'];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }
}
