<?php
// app/Http/Controllers/CrimeDataController.php

namespace App\Http\Controllers;

use App\Models\CrimeIncident;
use App\Models\CrimeExist;
use Illuminate\Http\Request;

class CrimeDataController extends Controller
{
    public function getCrimeData()
    {
        // Ambil data untuk Crime Total (CT) dari model CrimeIncident
        $ctData2023 = CrimeIncident::whereYear('created_at', 2023)
                                   ->groupBy('regency')
                                   ->selectRaw('regency, sum(jumlah_kasus) as total')
                                   ->pluck('total', 'regency');

        $ctData2024 = CrimeIncident::whereYear('created_at', 2024)
                                   ->groupBy('regency')
                                   ->selectRaw('regency, sum(jumlah_kasus) as total')
                                   ->pluck('total', 'regency');

        // Ambil data untuk Crime Clearance Total (CCT) dari model CrimeExist
        $ccData2023 = CrimeExist::whereYear('created_at', 2023)
                               ->groupBy('regency')
                               ->selectRaw('regency, sum(jumlah_kasus) as total')
                               ->pluck('total', 'regency');

        $ccData2024 = CrimeExist::whereYear('created_at', 2024)
                               ->groupBy('regency')
                               ->selectRaw('regency, sum(jumlah_kasus) as total')
                               ->pluck('total', 'regency');

        // Ambil nama-nama regency untuk label grafik
        $labels = CrimeIncident::distinct()->pluck('regency');

        // Mengirimkan data ke frontend dalam bentuk JSON
        return response()->json([
            'labels' => $labels,
            'ct_2023' => $ctData2023->toArray(),
            'ct_2024' => $ctData2024->toArray(),
            'cc_2023' => $ccData2023->toArray(),
            'cc_2024' => $ccData2024->toArray(),
        ]);
    }
}
