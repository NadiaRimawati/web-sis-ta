<?php

namespace App\Http\Controllers;

use App\Exports\CrimeIncidentExport;
use App\Models\CrimeIncident; 
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelType;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;

class KriminalitasController extends Controller
{
    // Metode untuk mendapatkan semua data kriminalitas
    public function getall()
    {
        $kriminalitas = CrimeIncident::all()->map(function($crime) {
            // Menghitung totalCCT untuk setiap baris data
            $crime->totalCCT = $crime->totalP21 + 
                               $crime->totalTahap2 + 
                               $crime->totalRJ + 
                               $crime->totalSP3 + 
                               $crime->totalSP2LID;
            return $crime;
        });
        // Mengirimkan data ke view 'kriminalitas'
        return view('kriminalitas', ['kriminalitas' => $kriminalitas]);
    }

    // Metode untuk menampilkan form edit
    public function edit($id)
    {

        $crimeIncident = CrimeIncident::findOrFail($id);
        return view('edit_kriminalitas', ['crimeIncident' => $crimeIncident]);
    }

    // Metode untuk memperbarui data kriminalitas
   public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'totalP21' => 'required|integer',
        'totalTahap2' => 'required|integer',
        'totalRJ' => 'required|integer',
        'totalSP3' => 'required|integer',
        'totalSP2LID' => 'required|integer',
    ]);

    // Mencari record CrimeIncident berdasarkan ID
    $crimeIncident = CrimeIncident::findOrFail($id);

    // Melakukan update hanya untuk field yang diperlukan
    $crimeIncident->update($request->only([
        'totalP21',
        'totalTahap2',
        'totalRJ',
        'totalSP3',
        'totalSP2LID'
    ]));

    // Redirect atau response setelah data diperbarui
    return redirect()->route('kriminalitas')->with('success', 'Data kriminalitas berhasil diperbarui');
}


    // Metode untuk menghapus data kriminalitas
    public function destroy($id)
    {

        $crimeIncident = CrimeIncident::findOrFail($id);
        $crimeIncident->delete();

        // Hapus cache agar data yang dihapus tidak muncul lagi
        Cache::forget('crime_incidents_all');
        session()->flash('success', 'Data berhasil dihapus!');


        // Menggunakan SweetAlert untuk pesan sukses
        return redirect()->route('kriminalitas');
        
    }

    // Menampilkan form untuk tambah data baru
    public function create()
    {

        return view('create_kriminalitas');
    }

    // Menyimpan data kriminalitas baru
    public function post(Request $request)
    {
        $request->validate([
            'regency' => 'required|in:Gayo Lues,Pidie Jaya,Kota Subulussalam,Kota Lhokseumawe,Pidie,Nagan Raya,Simeulue,Kota Sabang,Aceh Barat,Bener Meriah,Aceh Besar,Aceh Singkil,Aceh Tamiang,Aceh Barat Daya,Aceh Utara,Aceh Jaya,Aceh Tengah,Kota Langsa,Aceh Tenggara,Aceh Timur,Bireuen,Kota Banda Aceh,Aceh Selatan',
            'years' => 'required|string|min:4|max:4',
            'totalP21' => 'required|integer|min:0',
            'CT' => 'required|integer|min:0',
            'totalTahap2' => 'required|integer|min:0',
            'totalRJ' => 'required|integer|min:0',
            'totalSP3' => 'required|integer|min:0',
            'totalSP2LID' => 'required|integer|min:0',
        ]);

        // Mengecek apakah data dengan kombinasi regency dan tahun sudah ada
        $existingData = CrimeIncident::where('regency', $request->regency)
                                     ->where('years', $request->years)
                                     ->first();

        if ($existingData) {
            return redirect()->back()->withErrors(['msg' => 'Data untuk daerah dan tahun ini sudah ada!']);
        }

        // Menambahkan data kriminalitas baru
        CrimeIncident::create([
            'regency' => $request->regency,
            'years' => $request->years,
            'CT' => $request->CT,
            'totalP21' => $request->totalP21,
            'totalTahap2' => $request->totalTahap2,
            'totalRJ' => $request->totalRJ,
            'totalSP3' => $request->totalSP3,
            'totalSP2LID' => $request->totalSP2LID,
        ]);

        session()->flash('success', 'Data berhasil diperbarui!');

        // Menggunakan SweetAlert untuk pesan sukses
        return redirect()->route('kriminalitas');
        
        
        
    }

    // Download data dalam format Excel
    public function download(ExcelType $excel)
    {
        return $excel->download(new CrimeIncidentExport(), 'data_kriminalitas_' . date('Y-m-d') . '.xlsx');
    }
}
