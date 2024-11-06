<?php

namespace App\Exports;

use App\Models\CrimeExist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths; // Menambahkan trait ini

class CrimeExistExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths
{
    public function collection()
    {
        // Mengambil data yang ingin diekspor
        return CrimeExist::select('regency', 'years', 'pencurian', 'penipuan', 'penggelapan', 'perjudian', 'pemerkosaan', 'pembakaran', 'pemeresan', 'pembunuhan')->get();
    }

    public function headings(): array
    {
        return [
            'Kabupaten/Kota',
            'Tahun',
            'Pencurian',
            'Penipuan',
            'Penggelapan',
            'Perjudian',
            'Pemerkosaan',
            'Pembakaran',
            'Pemerasan',
            'Pembunuhan',
        ];
    }

    public function map($crimeExist): array
    {
        return [
            $crimeExist->regency,
            $crimeExist->years,
            $crimeExist->pencurian ? 'Ada' : 'Tidak Ada',  // Memetakan boolean ke 'Ada' atau 'Tidak Ada'
            $crimeExist->penipuan ? 'Ada' : 'Tidak Ada',    // Sama untuk kolom lainnya
            $crimeExist->penggelapan ? 'Ada' : 'Tidak Ada',
            $crimeExist->perjudian ? 'Ada' : 'Tidak Ada',
            $crimeExist->pemerkosaan ? 'Ada' : 'Tidak Ada',
            $crimeExist->pembakaran ? 'Ada' : 'Tidak Ada',
            $crimeExist->pemeresan ? 'Ada' : 'Tidak Ada',
            $crimeExist->pembunuhan ? 'Ada' : 'Tidak Ada',
        ];
    }

    // Mengatur lebar kolom sesuai dengan panjang data
    public function columnWidths(): array
    {
        return [
            'A' => 20, // Kolom 'Kabupaten/Kota'
            'B' => 10, // Kolom 'Tahun'
            'C' => 10, // Kolom 'Pencurian'
            'D' => 10, // Kolom 'Penipuan'
            'E' => 15, // Kolom 'Penggelapan'
            'F' => 15, // Kolom 'Perjudian'
            'G' => 15, // Kolom 'Pemerkosaan'
            'H' => 15, // Kolom 'Pembakaran'
            'I' => 15, // Kolom 'Pemerasan'
            'J' => 15, // Kolom 'Pembunuhan'
        ];
    }
}
