<?php

namespace App\Imports;

use App\Models\CrimeIncident;
use Maatwebsite\Excel\Concerns\ToModel;

class CrimeImport implements ToModel
{
    public function model(array $row)
    {
        return new CrimeIncident([
            'regency' => $row[0],
            'CT' => $row[1],
            'totalP21' => $row[2],
            'years' => "2023",
            'totalTahap2' => $row[3],
            'totalRJ' => $row[4],
            'totalSP3' => $row[5],
            'totalSP2LID' => $row[6],
        ]);
    }
}
