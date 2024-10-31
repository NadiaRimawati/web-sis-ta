<?php

namespace App\Imports;

use App\Models\CrimeExist;
use Maatwebsite\Excel\Concerns\ToModel;

class CrimeExistImport implements ToModel
{
    public function model(array $row)
    {
        return new CrimeExist([
            'regency' => $row[0],
            "pencurian" => $row[1] === 'ADA',
            "penipuan" => $row[2] === 'ADA',
            "penggelapan" => $row[3] === 'ADA',
            "perjudian" => $row[4] === 'ADA',
            "pemerkosaan" => $row[5] === 'ADA',
            "pembakaran" => $row[6] === 'ADA',
            "pemeresan" => $row[7] === 'ADA',
            "pembunuhan" => $row[8] === 'ADA',
            "years" => "2023"
        ]);
    }
}
