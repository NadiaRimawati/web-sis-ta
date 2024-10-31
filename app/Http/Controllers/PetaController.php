<?php

namespace App\Http\Controllers;

use App\Models\CrimeExist;
use App\Models\CrimeIncident;
use Illuminate\Http\Request;

class PetaController extends Controller
{
    public function index()
    {
        return view('peta'); // Pastikan ada file 'tentang_kami.blade.php' di folder resources/views
    }

    public function getTotalP21()
    {
        $crime = CrimeIncident::selectRaw('years, regency, totalP21 as total')->orderBy('total', 'desc')->get();
        return $this->assignClassesToCrimeData($crime);
    }

    public function getTotalRJ()
    {
        $crime = CrimeIncident::selectRaw('years, regency, totalRJ as total')->orderBy('total', 'desc')->get();
        return $this->assignClassesToCrimeData($crime);
    }

    public function getTotalSP2LID()
    {
        $crime = CrimeIncident::selectRaw('years, regency, totalSP2LID as total')->orderBy('total', 'desc')->get();
        return $this->assignClassesToCrimeData($crime);
    }

    public function getTotalTahap2()
    {
        $crime = CrimeIncident::selectRaw('years, regency, totalTahap2 as total')->orderBy('total', 'desc')->get();
        return $this->assignClassesToCrimeData($crime);
    }

    public function getTotalsp3()
    {
        $crime = CrimeIncident::selectRaw('years, regency, totalSP3 as total')->orderBy('total', 'desc')->get();
        return $this->assignClassesToCrimeData($crime);
    }

    public function getct()
    {
        $crime = CrimeIncident::selectRaw('years, regency, CT as total')->orderBy('total', 'desc')->get();
        return $this->assignClassesToCrimeData($crime);
    }



    public function getCCT()
    {
        $crime = CrimeIncident::all()->map(function($crime) {
            $crime->total = $crime->totalP21 + 
                              $crime->totalTahap2 + 
                              $crime->totalRJ + 
                              $crime->totalSP3 + 
                              $crime->totalSP2LID;
            return $crime;
        });

        return $this->assignClassesToCrimeData($crime);
    }

    // Tambahkan metode showPeta1 di sini
    public function showPeta1()
    {
        // Ambil data yang diperlukan untuk peta 1
        return view('peta1'); // Pastikan ada file 'peta1.blade.php' di folder resources/views
    }

    public function showPeta2()
    {
        // Ambil data yang diperlukan untuk peta 3
        $data = CrimeIncident::select('years', 'regency', 'totalP21')->get(); // Sesuaikan sesuai kebutuhan
        return view('peta2', compact('data')); // Pastikan ada file 'peta1.blade.php' di folder resources/views
    }

    public function showPeta3()
    {
        // Ambil data yang diperlukan untuk peta 3
        $data = CrimeIncident::select('years', 'regency', 'totalP21')->get(); // Sesuaikan sesuai kebutuhan
        return view('peta3', compact('data')); // Pastikan ada file 'peta1.blade.php' di folder resources/views
    }

    private function assignClassesToCrimeData($crime)
    {
        $totalCount = $crime->count();
        
        if ($totalCount === 0) {
            return response()->json($crime);
        }
    
        $maxTotal = $crime->max('total');
        $minTotal = $crime->min('total');
    
        $interval = ($maxTotal - $minTotal) / 5;
    
        $crime->transform(function ($item) use ($minTotal, $interval) {
            if ($item->total <= $minTotal + $interval) {
                $item->class = 1; 
            } elseif ($item->total <= $minTotal + (2 * $interval)) {
                $item->class = 2;
            } elseif ($item->total <= $minTotal + (3 * $interval)) {
                $item->class = 3;
            } elseif ($item->total <= $minTotal + (4 * $interval)) {
                $item->class = 4;
            } else {
                $item->class = 5;
            }
            return $item;
        });
    
        return response()->json($crime);
    }    
}
