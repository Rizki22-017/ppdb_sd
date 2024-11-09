<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class RegistrationExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    /**
     * @return \Illuminate\Support\Collection
     */

    private $counter = 1;
    public function collection()
    {
        return Registration::all();
    }

    public function headings(): array
    {
        return [
            'No',
            'ID Formulir',
            'No. Hp',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Asal Sekolah',
            'Alamat',
            'NIK'
        ];
    }

    public function map($registrations): array
    {
        return [
            $this->counter++,
            $registrations->form_id,
            $registrations->user->no_hp ?? 'N/A',
            $registrations->nama_lengkap,
            $registrations->jenis_kelamin,
            $registrations->nama_sekolah_dulu,
            $registrations->alamat_anak,
            "'" . $registrations->nik,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_TEXT,
        ];
    }
}