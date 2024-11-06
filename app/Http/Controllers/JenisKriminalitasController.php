<?php

// Contoh controller
namespace App\Http\Controllers;

use App\Exports\CrimeExistExport;
use App\Models\CrimeExist;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelType; // Mengganti alias

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

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima
        $request->validate([
        'pencurian' => 'required|in:0,1',
        'penipuan' => 'required|in:0,1',
        'penggelapan' => 'required|in:0,1',
        'perjudian' => 'required|in:0,1',
        'pemerkosaan' => 'required|in:0,1',
        'pembakaran' => 'required|in:0,1',
        'pemerasan' => 'required|in:0,1',
        'pembunuhan' => 'required|in:0,1',
    ]);
      // Cari data CrimeExist berdasarkan ID
      $crimeExist = CrimeExist::findOrFail($id);

      // Update data berdasarkan input form
      $crimeExist->update([
          'pencurian' => $request->input('pencurian'),
          'penipuan' => $request->input('penipuan'),
          'penggelapan' => $request->input('penggelapan'),
          'perjudian' => $request->input('perjudian'),
          'pemerkosaan' => $request->input('pemerkosaan'),
          'pembakaran' => $request->input('pembakaran'),
          'pemeresan' => $request->input('pemerasan'),
          'pembunuhan' => $request->input('pembunuhan'),
      ]);
      
  
      // Redirect dengan pesan sukses
      return redirect()->route('jenis_kriminalitas.index')->with('success', 'Data berhasil diperbarui!');
  }
  public function destroy($id)
  {
      // Mencari data kriminalitas berdasarkan ID
      $crimeExist = CrimeExist::findOrFail($id);

      // Menghapus data kriminalitas
      $crimeExist->delete();

      // Redirect ke halaman yang diinginkan dengan pesan sukses
      return redirect()->route('jenis_kriminalitas.index')-> with('success', 'Data berhasil dihapus!');
  }

  public function create()
    {
        return view('create_jenis_kriminalitas');
    }
    public function store(Request $request)
    {
        $request->validate([
            'regency' => 'required|in:Gayo Lues,Pidie Jaya,Kota Subulussalam,Kota Lhokseumawe,Pidie,Nagan Raya,Simeulue,Kota Sabang,Aceh Barat,Bener Meriah,Aceh Besar,Aceh Singkil,Aceh Tamiang,Aceh Barat Daya,Aceh Utara,Aceh Jaya,Aceh Tengah,Kota Langsa,Aceh Tenggara,Aceh Timur,Bireuen,Kota Banda Aceh,Aceh Selatan',
            'years' => 'required|string',
            'pencurian' => 'required|in:0,1',
            'penipuan' => 'required|in:0,1',
            'penggelapan' => 'required|in:0,1',
            'perjudian' => 'required|in:0,1',
            'pemerkosaan' => 'required|in:0,1',
            'pembakaran' => 'required|in:0,1',
            'pemeresan' => 'required|in:0,1',
            'pembunuhan' => 'required|in:0,1',
        ]);

        CrimeExist::create([
            'regency' => $request->input('regency'),
            'years' => $request->input('years'),
            'pencurian' => $request->input('pencurian'),
            'penipuan' => $request->input('penipuan'),
            'penggelapan' => $request->input('penggelapan'),
            'perjudian' => $request->input('perjudian'),
            'pemerkosaan' => $request->input('pemerkosaan'),
            'pembakaran' => $request->input('pembakaran'),
            'pemeresan' => $request->input('pemeresan'),
            'pembunuhan' => $request->input('pembunuhan'),
        ]);

        return redirect()->route('jenis_kriminalitas.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function download(ExcelType $excel) // Menambahkan parameter untuk dependency injection
    {
        return $excel->download(new CrimeExistExport(), 'data_jenis_kriminalitas_' . date('Y-m-d') . '.xlsx');
    }
    public function edit($id)
    {
        // Mencari data kriminalitas berdasarkan ID
        $crimeExist = CrimeExist::findOrFail($id);

        // Mengembalikan view edit dengan data kriminalitas yang dipilih
        return view('edit_jenis_kriminalitas', ['crimeExist' => $crimeExist]);
    }
}

