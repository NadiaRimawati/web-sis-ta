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
        <button id="downloadBtn" type="button" class="text-sm bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Unduh Data
        </button>
        <button id="addDataBtn" type="button" class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Tambah Data
        </button>
      </div>
      
      <table class="min-w-full text-xs bg-white shadow-md rounded mb-4" id="dataTable">
        <thead>
          <tr class="border-b">
            <th class="text-center p-1">No</th>
            <th class="text-center p-1">Tahun</th>
            <th class="text-center p-1">Daerah</th>
            <th class="text-center p-1">Pencurian</th>
            <th class="text-center p-1">Penipuan</th>
            <th class="text-center p-1">Penggelapan</th>
            <th class="text-center p-1">Perjudian</th>
            <th class="text-center p-1">Pemerkosaan</th>
            <th class="text-center p-1">Pembakaran</th>
            <th class="text-center p-1">Pemerasan</th>
            <th class="text-center p-1">Pembunuhan</th>
            <th class="text-center p-1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- Baris Tabel -->
          @foreach ($jenis_kriminalitas as $index => $data)
          <tr class="border-b hover:bg-orange-100 {{ $index % 2 == 0 ? 'bg-gray-100' : '' }}">
            <td class="text-center p-1">{{ $index + 1 }}</td>
            <td class="text-center p-1">
              <span>{{$data->years}}</span>
            </td>
            <td class="text-center p-1">
              <span>{{ $data->regency }}</span>
            </td>
            <td class="text-center p-1">
              <span>{{ $data->pencurian == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->penipuan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->penggelapan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->perjudian == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->pemerkosaan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->pembakaran == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->pemeresan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
            <span>{{ $data->pembunuhan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1 flex justify-center space-x-1">
              <button type="button" class="text-xs bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <i class="fas fa-edit"></i>
              </button>
              <button type="button" class="text-xs bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <i class="fas fa-trash"></i>
              </button>
            </td>
          </tr>
          @endforeach
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
        newCell.innerHTML = `<button type="button" class="text-xs bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                               <i class="fas fa-edit"></i>
                             </button>
                             <button type="button" class="text-xs bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                               <i class="fas fa-trash"></i>
                             </button>
                             <button type="button" class="text-xs bg-green-500 hover:bg-green-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                               <i class="fas fa-plus"></i>
                             </button>`;
      } else {
        newCell.innerHTML = `<span class="bg-transparent text-center w-full"></span>`; // Teks kosong untuk data baru
      }
    }
  });
</script>

@endsection
