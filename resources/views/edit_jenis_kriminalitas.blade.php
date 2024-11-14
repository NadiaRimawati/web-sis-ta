@extends('layouts.app') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<!-- Menyembunyikan navbar dan footer khusus pada halaman ini -->
<style>
    .navbar { display: none; }
    footer { display: none; } /* Menghilangkan footer */
</style>

<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Edit Data Jenis Kriminalitas</h1>
    
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('jenis_kriminalitas.update', $crimeExist->id) }}" method="POST">
        @csrf

        <!-- Kolom Tahun -->
        <div class="mb-4">
            <label for="tahun" class="block text-gray-700">Tahun</label>
            <input type="number" name="tahun" id="tahun" value="{{ old('years', $crimeExist->years) }}" class="mt-1 p-2 border rounded w-full" required>
            @error('years')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Pencurian -->
        <div class="mb-4">
            <label for="pencurian" class="block text-gray-700">Pencurian</label>
            <select name="pencurian" id="pencurian" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->pencurian == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->pencurian == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('pencurian')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Penipuan -->
        <div class="mb-4">
            <label for="penipuan" class="block text-gray-700">Penipuan</label>
            <select name="penipuan" id="penipuan" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->penipuan == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->penipuan == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('penipuan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Penggelapan -->
        <div class="mb-4">
            <label for="penggelapan" class="block text-gray-700">Penggelapan</label>
            <select name="penggelapan" id="penggelapan" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->penggelapan == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->penggelapan == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('penggelapan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Perjudian -->
        <div class="mb-4">
            <label for="perjudian" class="block text-gray-700">Perjudian</label>
            <select name="perjudian" id="perjudian" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->perjudian == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->perjudian == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('perjudian')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Pemerkosaan -->
        <div class="mb-4">
            <label for="pemerkosaan" class="block text-gray-700">Pemerkosaan</label>
            <select name="pemerkosaan" id="pemerkosaan" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->pemerkosaan == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->pemerkosaan == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('pemerkosaan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Pembakaran -->
        <div class="mb-4">
            <label for="pembakaran" class="block text-gray-700">Pembakaran</label>
            <select name="pembakaran" id="pembakaran" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->pembakaran == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->pembakaran == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('pembakaran')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Pemerasan -->
        <div class="mb-4">
            <label for="pemerasan" class="block text-gray-700">Pemerasan</label>
            <select name="pemeresan" id="pemeresan" class="mt-1 p-2 border rounded w-full" required>
     <option value="1" {{ old('pemeresan') == 1 ? 'selected' : '' }}>Ada</option>
    <option value="0" {{ old('pemeresan') == 0 ? 'selected' : '' }}>Tidak Ada</option>
</select>

            @error('pemerasan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <!-- Kolom Pembunuhan -->
        <div class="mb-4">
            <label for="pembunuhan" class="block text-gray-700">Pembunuhan</label>
            <select name="pembunuhan" id="pembunuhan" class="mt-1 p-2 border rounded w-full" required>
                <option value="1" {{ $crimeExist->pembunuhan == 1 ? 'selected' : '' }}>Ada</option>
                <option value="0" {{ $crimeExist->pembunuhan == 0 ? 'selected' : '' }}>Tidak Ada</option>
            </select>
            @error('pembunuhan')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end mb-12">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
