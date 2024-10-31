<?php

namespace App\Http\Controllers;

use App\Exports\CrimeIncidentExport;
use App\Models\CrimeIncident; 
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelType; // Mengganti alias
use Maatwebsite\Excel\Facades\Excel; //

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
        // Mencari data kriminalitas berdasarkan ID
        $crimeIncident = CrimeIncident::findOrFail($id);
        
        // Mengembalikan view edit dengan data kriminalitas yang dipilih
        return view('edit_kriminalitas', ['crimeIncident' => $crimeIncident]);
    }

    // Metode untuk memperbarui data kriminalitas
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'totalP21' => 'required|integer',
            'totalTahap2' => 'required|integer',
            'totalRJ' => 'required|integer',
            'totalSP3' => 'required|integer',
            'totalSP2LID' => 'required|integer',
        ]);

        // Mencari data kriminalitas berdasarkan ID
        $crimeIncident = CrimeIncident::findOrFail($id);
        
        // Memperbarui atribut dengan data baru
        $crimeIncident->update($request->only([
            'totalP21',
            'totalTahap2',
            'totalRJ',
            'totalSP3',
            'totalSP2LID'
        ]));

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kriminalitas')->with('success', 'Data berhasil diperbarui!');
    }

    // Metode untuk menghapus data kriminalitas
    public function destroy($id)
    {
        // Mencari data kriminalitas berdasarkan ID
        $crimeIncident = CrimeIncident::findOrFail($id);

        // Menghapus data kriminalitas
        $crimeIncident->delete();

        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kriminalitas')->with('success', 'Data berhasil dihapus!');
    }

    public function create()
    {
        return view('create_kriminalitas');
    }

    // Metode untuk memperbarui data kriminalitas
    public function post(Request $request)
    {
        // Validasi input
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

        // Membuat instance CrimeIncident dan mengisi data
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


        // Redirect ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kriminalitas')->with('success', 'Data berhasil diperbarui!');
    }

    public function download(ExcelType $excel) // Menambahkan parameter untuk dependency injection
    {
        return $excel->download(new CrimeIncidentExport(), 'data_kriminalitas_' . date('Y-m-d') . '.xlsx');
    }
}
