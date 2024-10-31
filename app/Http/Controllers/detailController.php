<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class detailController extends Controller
{
    public function index($id)
    {
        // Contoh data dinamis
        $crimeData = [
            'crime_total' => 100,      // Ganti dengan data dinamis
            'crime_clearing' => 80,    // Ganti dengan data dinamis
            'crime_types' => 5         // Ganti dengan data dinamis
        ];

        // Kirim data ke view detail
        return view('detail', [
            'id' => $id,
            'crimeTotal' => $crimeData['crime_total'],
            'crimeClearance' => $crimeData['crime_clearing'],
            'crimeTypes' => $crimeData['crime_types'],
        ]);
    }
}
