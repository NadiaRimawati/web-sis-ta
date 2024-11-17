@extends('layouts.app')

@section('content')
<style>
    .navbar { display: none; }
    footer { display: none; }
</style>

<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Tambah Data jenis kriminalitas</h1>
    
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('jenis_kriminalitas.create') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        
        <div class="mb-4">
            <label for="regency" class="block text-gray-700 font-medium">Kabupaten/Kota</label>
            <select name="regency" id="regency" class="mt-1 p-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="" disabled selected>Pilih Kabupaten/Kota</option>
                <option value="Gayo Lues">Gayo Lues</option>
                <option value="Pidie Jaya">Pidie Jaya</option>
                <option value="Kota Subulussalam">Kota Subulussalam</option>
                <option value="Kota Lhokseumawe">Kota Lhokseumawe</option>
                <option value="Pidie">Pidie</option>
                <option value="Nagan Raya">Nagan Raya</option>
                <option value="Simeulue">Simeulue</option>
                <option value="Kota Sabang">Kota Sabang</option>
                <option value="Aceh Barat">Aceh Barat</option>
                <option value="Bener Meriah">Bener Meriah</option>
                <option value="Aceh Besar">Aceh Besar</option>
                <option value="Aceh Singkil">Aceh Singkil</option>
                <option value="Aceh Tamiang">Aceh Tamiang</option>
                <option value="Aceh Barat Daya">Aceh Barat Daya</option>
                <option value="Aceh Utara">Aceh Utara</option>
                <option value="Aceh Jaya">Aceh Jaya</option>
                <option value="Aceh Tengah">Aceh Tengah</option>
                <option value="Kota Langsa">Kota Langsa</option>
                <option value="Aceh Tenggara">Aceh Tenggara</option>
                <option value="Aceh Timur">Aceh Timur</option>
                <option value="Bireuen">Bireuen</option>
                <option value="Kota Banda Aceh">Kota Banda Aceh</option>
                <option value="Aceh Selatan">Aceh Selatan</option>
            </select>
            @error('regency')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="years" class="block text-gray-700 font-medium">Tahun</label>
            <input type="text" name="years" id="years" class="mt-1 p-2 border rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            @error('years')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Field khusus untuk setiap jenis kejahatan -->
        @foreach(['pencurian', 'penipuan', 'penggelapan', 'perjudian', 'pemerkosaan', 'pembakaran', 'pemeresan', 'pembunuhan'] as $crime)
            <div class="mb-4">
                <label for="{{ $crime }}" class="block text-gray-700 font-medium">{{ ucfirst($crime) }}</label>
                <select name="{{ $crime }}" id="{{ $crime }}" class="mt-1 p-2 border rounded w-full" required>
                    <option value="1">Ada</option>
                    <option value="0">Tidak Ada</option>
                </select>
            </div>
        @endforeach

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Simpan</button>
        </div>
    </form>
</div>

@endsection
