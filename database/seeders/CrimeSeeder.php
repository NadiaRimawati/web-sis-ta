<?php

namespace Database\Seeders;

use App\Imports\CrimeImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class CrimeSeeder extends Seeder
{
    public function run()
    {
        Excel::import(new CrimeImport, storage_path('app/public/DATA.xlsx'));
    }
}
