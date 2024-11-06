<?php

namespace App\Exports;

use App\Models\CrimeIncident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths; // Menambahkan trait ini

class CrimeIncidentExport implements FromCollection, WithHeadings, WithMapping, WithColumnWidths
{
    public function collection()
    {
        // Mengambil data yang ingin diekspor
        return CrimeIncident::select('regency', 'years', 'CT', 'totalP21', 'totalTahap2', 'totalRJ', 'totalSP3', 'totalSP2LID')->get();
    }

    public function headings(): array
    {
        return [
            'Kabupaten/Kota',
            'Tahun',
            'CT',
            'Total P21',
            'Total Tahap 2',
            'Total RJ',
            'Total SP3',
            'Total SP2LID',
            'Total CCT',
        ];
    }

    public function map($crimeIncident): array
    {
        return [
            $crimeIncident->regency,
            $crimeIncident->years,
            $crimeIncident->CT,
            $crimeIncident->totalP21,
            $crimeIncident->totalTahap2,
            $crimeIncident->totalRJ,
            $crimeIncident->totalSP3,
            $crimeIncident->totalSP2LID,
            $crimeIncident->totalP21 + $crimeIncident->totalTahap2 + $crimeIncident->totalRJ + $crimeIncident->totalSP3 + $crimeIncident->totalSP2LID,
        ];
    }

    // Mengatur lebar kolom sesuai dengan panjang data
    public function columnWidths(): array
    {
        return [
            'A' => 20, // Kolom 'Kabupaten/Kota'
            'B' => 10, // Kolom 'Tahun'
            'C' => 10, // Kolom 'CT'
            'D' => 15, // Kolom 'Total P21'
            'E' => 15, // Kolom 'Total Tahap 2'
            'F' => 15, // Kolom 'Total RJ'
            'G' => 15, // Kolom 'Total SP3'
            'H' => 15, // Kolom 'Total SP2LID'
            'I' => 20, // Kolom 'Total CCT'
        ];
    }
}
