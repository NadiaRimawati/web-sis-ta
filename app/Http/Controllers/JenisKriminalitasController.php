<?php

namespace App\Http\Controllers;

use App\Exports\CrimeExistExport;
use App\Models\CrimeExist;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel as ExcelType;

class JenisKriminalitasController extends Controller
{
    public function index()
    {
        $jenis_kriminalitas = CrimeExist::all();
        return view("jenis_kriminalitas", ['jenis_kriminalitas' => $jenis_kriminalitas]);
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

        $existingData = CrimeExist::where('regency', $request->regency)->where('years', $request->years)->first();

        if ($existingData) {
            return redirect()->back()->withErrors(['msg' => 'Data untuk daerah dan tahun ini sudah ada!']);
        }

        CrimeExist::create($request->only([
            'regency', 'years', 'pencurian', 'penipuan', 'penggelapan', 'perjudian', 'pemerkosaan', 'pembakaran', 'pemeresan', 'pembunuhan'
        ]));

        return redirect()->route('jenis_kriminalitas.index')->with('success', 'Data berhasil ditambahkan!'); // Success message
    }

    public function edit($id)
    {
        $crimeExist = CrimeExist::findOrFail($id);
        return view('edit_jenis_kriminalitas', ['crimeExist' => $crimeExist]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pencurian' => 'required|in:0,1',
            'penipuan' => 'required|in:0,1',
            'penggelapan' => 'required|in:0,1',
            'perjudian' => 'required|in:0,1',
            'pemerkosaan' => 'required|in:0,1',
            'pembakaran' => 'required|in:0,1',
            'pemeresan' => 'required|in:0,1',
            'pembunuhan' => 'required|in:0,1',
        ]);

        $crimeExist = CrimeExist::findOrFail($id);
        $crimeExist->update($request->only([
            'pencurian', 'penipuan', 'penggelapan', 'perjudian', 'pemerkosaan', 'pembakaran', 'pemeresan', 'pembunuhan'
        ]));

        return redirect()->route('jenis_kriminalitas.index')->with('success', 'Data berhasil diperbarui!'); // Success message
    }

    public function destroy($id)
    {
        $crimeExist = CrimeExist::findOrFail($id);
        $crimeExist->delete();

        return redirect()->route('jenis_kriminalitas.index')->with('success', 'Data berhasil dihapus!'); // Success message
    }

    public function download(ExcelType $excel)
    {
        return $excel->download(new CrimeExistExport(), 'data_jenis_kriminalitas_' . date('Y-m-d') . '.xlsx');
    }

    public function getCrimeDataByType($crimeType)
    {
        $validCrimeTypes = ['pencurian', 'penipuan', 'penggelapan', 'perjudian', 'pemerkosaan', 'pembakaran', 'pemeresan', 'pembunuhan'];

        if (!in_array($crimeType, $validCrimeTypes)) {
            return response()->json(['error' => 'Invalid crime type specified'], 400);
        }

        $crimeData = CrimeExist::selectRaw("regency, years, $crimeType as selected_crime")->get();

        $crimeData->transform(function ($crime) use ($crimeType) {
            $crime->selected_crime_type = $crimeType;
            return $crime;
        });

        return response()->json($crimeData);
    }
}
