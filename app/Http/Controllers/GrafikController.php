<?php

namespace App\Http\Controllers;
use App\Models\CrimeIncident;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function showChart()
    {
        $data = CrimeIncident::select('years', 'regency', 'CT', 'totalP21', 'totalTahap2', 'totalRJ', 'totalSP3', 'totalSP2LID')
            ->get();

        // Data unuk daftar daerah
        $regencies = $data->pluck('regency')->unique()->toArray();

        // Memisahkan data berdasarkan tahun
        $groupedData = $data->groupBy('years');
        $years = $groupedData->keys()->toArray();

        // Memasukkan data `CT` dan `TotalCCT` per tahun untuk tiap daerah
        $ctData = [];
        $totalCCTData = [];
        foreach ($years as $year) {
            $ctData[$year] = [];
            $totalCCTData[$year] = [];
            foreach ($regencies as $regency) {
                $entry = $groupedData[$year]->firstWhere('regency', $regency);
                $ctData[$year][] = $entry ? $entry->CT : 0;
                $totalCCTData[$year][] = $entry ? $entry->totalP21 + $entry->totalTahap2 + $entry->totalRJ + $entry->totalSP3 + $entry->totalSP2LID : 0;
            }
        }

        return view('chart', compact('years', 'regencies', 'ctData', 'totalCCTData'));
    }
}
