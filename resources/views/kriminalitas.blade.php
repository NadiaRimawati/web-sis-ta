@extends('layouts.dashboard')

@section('content')

<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/js-file-download@0.4.12/dist/js-file-download.min.js"></script>

<div class="flex min-h-screen w-full top-0">
  <!-- Konten utama (tabel) -->
  <main class="flex-grow p-4">
    <div class="px-3 py-4">
      <!-- Tombol unduh dan tambah -->
      <div class="flex space-x-4 mb-4">
      <a href="{{ route('kriminalitas.download') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
      Unduh Data
    </a>
    <a href="{{ route('kriminalitas.create') }}" class=" bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        Tambah Data
    </a>
</div>

      
      <table class="w-full text-md bg-white shadow-md rounded mb-4" id="dataTable">
    <thead>
        <tr class="border-b">
            <th class="text-center p-3 px-5">No</th>
            <th class="text-center p-3 px-5">Tahun</th>
            <th class="text-center p-3 px-5">CT</th>
            <th class="text-center p-3 px-5">Daerah</th>
            <th class="text-center p-3 px-5">P21</th>
            <th class="text-center p-3 px-5">Tahap II</th>
            <th class="text-center p-3 px-5">RJ</th>
            <th class="text-center p-3 px-5">SP3</th>
            <th class="text-center p-3 px-5">SP2LID</th>
            <th class="text-center p-3 px-5">Total CCT</th> <!-- Mengganti Total CC dengan Total CCT -->
            <th class="text-center p-3 px-5">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kriminalitas as $index => $data)
        <tr class="border-b hover:bg-orange-100 {{ $index % 2 == 0 ? 'bg-gray-100' : '' }}">
            <td class="text-center p-3 px-5">{{ $index + 1 }}</td>
            <td class="text-center p-3 px-5">{{ $data->years }}</td> <!-- Pastikan ada kolom 'year' -->
            <td class="text-center p-3 px-5">{{ $data->CT }}</td>
            <td class="text-center p-3 px-5">{{ $data->regency }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalP21 }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalTahap2 }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalRJ }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalSP3 }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalSP2LID }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalCCT }}</td> <!-- Menampilkan Total CCT di kolom yang tepat -->
            <td class="text-center p-3 px-5 flex justify-center space-x-2">
            <a href="{{ route('kriminalitas.edit', $data->id) }}" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
        <i class="fas fa-edit"></i>
    </a>
    <form action="{{ route('kriminalitas.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
            <i class="fas fa-trash"></i>
        </button>
    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

        </tbody>
      </table>
    </div>
  </main>
</div>

<script>
  document.getElementById('downloadBtn').addEventListener('click', function() {
    const table = document.getElementById('dataTable');
    const rows = Array.from(table.querySelectorAll('tr')).map(row => 
      Array.from(row.querySelectorAll('td, th')).map(cell => cell.textContent).join(',')
    );
    const csvContent = rows.join('\n');
    const blob = new Blob([csvContent], { type: 'text/csv' });
    const url = URL.createObjectURL(blob);
    const link = document.createElement('a');
    link.href = url;
    link.download = 'data.csv';
    link.click();
    URL.revokeObjectURL(url);
  });

  // Event listener untuk tombol tambah data
  document.getElementById('addDataBtn').addEventListener('click', function() {
    const table = document.getElementById('dataTable').getElementsByTagName('tbody')[0];
    const newRow = table.insertRow(); // Menambahkan baris baru
    const cellCount = table.rows[0].cells.length; // Menghitung jumlah kolom

    for (let i = 0; i < cellCount; i++) {
      const newCell = newRow.insertCell(i);
      if (i === 0) {
        newCell.textContent = table.rows.length; // Nomor baris baru
      } else if (i === cellCount - 1) {
        newCell.innerHTML = `<button type="button" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                               <i class="fas fa-edit"></i>
                             </button>
                             <button type="button" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                               <i class="fas fa-trash"></i>
                             </button>
                             <button type="button" class="text-sm bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                               <i class="fas fa-plus"></i>
                             </button>`;
      } else {
        newCell.innerHTML = `<input type="text" class="bg-transparent text-center w-full">`; // Input kosong untuk data baru
      }
    }
  });
</script>

@endsection
