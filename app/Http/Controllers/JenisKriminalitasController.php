<?php

// Contoh controller
namespace App\Http\Controllers;

use App\Models\CrimeExist;
use Illuminate\Http\Request;

class JenisKriminalitasController extends Controller
{
    public function getCrimeDataByType($crimeType)
    {
        // Daftar jenis kejahatan yang valid
        $validCrimeTypes = ['pencurian', 'penipuan', 'penggelapan', 'perjudian', 'pemerkosaan', 'pembakaran', 'pemeresan', 'pembunuhan'];
        
        // Validasi apakah jenis kejahatan yang diminta ada dalam daftar jenis kejahatan yang valid
        if (!in_array($crimeType, $validCrimeTypes)) {
            return response()->json(['error' => 'Invalid crime type specified'], 400);
        }
        
        // Ambil data dari CrimeExist berdasarkan jenis kejahatan yang diminta
        $crimeData = CrimeExist::selectRaw("regency, years, $crimeType as selected_crime")->get();

        // Menambahkan atribut jenis kejahatan yang dipilih pada hasil
        $crimeData->transform(function ($crime) use ($crimeType) {
            $crime->selected_crime_type = $crimeType;
            return $crime;
        });

        return response()->json($crimeData);
    }

    public function index()
    {
        $jenis_kriminalitas = CrimeExist::all();
        return view("jenis_kriminalitas", ['jenis_kriminalitas' => $jenis_kriminalitas]);
    }
}
  
