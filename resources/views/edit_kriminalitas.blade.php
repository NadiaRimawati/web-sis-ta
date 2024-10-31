@extends('layouts.app') <!-- Sesuaikan dengan layout Anda -->

@section('content')
<div class="container mx-auto mt-5">
    <h1 class="text-2xl font-bold mb-4">Edit Data Kriminalitas</h1>
    
    @if (session('success'))
        <div class="bg-green-500 text-white p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('kriminalitas.update', $crimeIncident->id) }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="totalP21" class="block text-gray-700">Total P21</label>
            <input type="number" name="totalP21" id="totalP21" value="{{ old('totalP21', $crimeIncident->totalP21) }}" class="mt-1 p-2 border rounded w-full" required>
            @error('totalP21')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="totalTahap2" class="block text-gray-700">Total Tahap II</label>
            <input type="number" name="totalTahap2" id="totalTahap2" value="{{ old('totalTahap2', $crimeIncident->totalTahap2) }}" class="mt-1 p-2 border rounded w-full" required>
            @error('totalTahap2')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="totalRJ" class="block text-gray-700">Total RJ</label>
            <input type="number" name="totalRJ" id="totalRJ" value="{{ old('totalRJ', $crimeIncident->totalRJ) }}" class="mt-1 p-2 border rounded w-full" required>
            @error('totalRJ')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="totalSP3" class="block text-gray-700">Total SP3</label>
            <input type="number" name="totalSP3" id="totalSP3" value="{{ old('totalSP3', $crimeIncident->totalSP3) }}" class="mt-1 p-2 border rounded w-full" required>
            @error('totalSP3')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="totalSP2LID" class="block text-gray-700">Total SP2LID</label>
            <input type="number" name="totalSP2LID" id="totalSP2LID" value="{{ old('totalSP2LID', $crimeIncident->totalSP2LID) }}" class="mt-1 p-2 border rounded w-full" required>
            @error('totalSP2LID')
                <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update</button>
        </div>
    </form>
</div>
@endsection
