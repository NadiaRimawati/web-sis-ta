<?php

namespace Database\Seeders;

use App\Imports\CrimeExistImport;
use App\Imports\CrimeImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class crimeExist extends Seeder
{
    public function run()
    {
        Excel::import(new CrimeExistImport, storage_path('app/public/data-crime-exist.xlsx'));
    }
}
