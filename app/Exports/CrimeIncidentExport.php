<?php

namespace App\Exports;

use App\Models\CrimeIncident;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CrimeIncidentExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        // Mengambil data yang ingin diekspor
        return CrimeIncident::select('regency', 'years', 'CT','totalP21', 'totalTahap2', 'totalRJ', 'totalSP3', 'totalSP2LID')->get();
    }

    public function headings(): array
    {
        return [
            'Regency',
            'Year',
            'CT',
            'Total P21',
            'Total Tahap 2',
            'Total RJ',
            'Total SP3',
            'Total SP2LID',
            'Total CCT'
        ];
    }

    public function map($crimeIncident): array
    {
        return [
            $crimeIncident->regency,
            $crimeIncident->year,
            $crimeIncident->CT,
            $crimeIncident->totalP21,
            $crimeIncident->totalTahap2,
            $crimeIncident->totalRJ,
            $crimeIncident->totalSP3,
            $crimeIncident->totalSP2LID,
            $crimeIncident->totalP21 + $crimeIncident->totalTahap2 + $crimeIncident->totalRJ + $crimeIncident->totalSP3 + $crimeIncident->totalSP2LID,
        ];
    }
}
