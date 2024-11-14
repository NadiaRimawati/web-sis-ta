@extends('layouts.dashboard')

@section('content')

<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/js-file-download@0.4.12/dist/js-file-download.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Tambahkan SweetAlert2 -->

<div class="flex min-h-screen w-full top-0">
  <!-- Konten utama (tabel) -->
  <main class="flex-grow p-4">
    <div class="px-3 py-4">
      <!-- Tombol unduh dan tambah -->
      <div class="flex space-x-4 mb-4">
        <a href="{{ route('jenis_kriminalitas.download') }}"
          class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline"
          id="downloadBtn">
          Unduh Data
        </a>
        <a href="{{ route('jenis_kriminalitas.create') }}"
          class=" bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Tambah Data
        </a>
      </div>

      <table class="min-w-full text-xs bg-white shadow-md rounded mb-4" id="myTable">
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
              <span>{{ $data->pemerasan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-1">
              <span>{{ $data->pembunuhan == 1 ? 'Ada' : 'Tidak Ada'}}</span>
            </td>
            <td class="text-center p-3 px-5 flex justify-center space-x-2">
              <a href="{{ route('jenis_kriminalitas.edit', $data->id) }}"
                class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('jenis_kriminalitas.destroy', $data->id) }}" method="POST" id="delete-form-{{ $data->id }}">
                @csrf
                @method('DELETE')
                <button type="button"
                  class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                  onclick="deleteData({{ $data->id }})">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </main>
</div>

<script>
  // SweetAlert untuk konfirmasi penghapusan data
  function deleteData(id) {
    Swal.fire({
      title: 'Apakah Anda yakin?',
      text: "Data ini akan dihapus!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Ya, hapus!',
      cancelButtonText: 'Batal',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        // Jika konfirmasi, kirim form untuk menghapus data
        document.getElementById('delete-form-' + id).submit();
      }
    });
  }

  // SweetAlert untuk menambahkan data
  document.getElementById('addDataBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Data berhasil ditambahkan!',
      icon: 'success',
      showConfirmButton: false,
      timer: 1500
    }).then(() => {
      location.reload(); // Refresh halaman untuk melihat data terbaru
    });
  });

  // SweetAlert untuk tombol unduh data
  document.getElementById('downloadBtn').addEventListener('click', function () {
    Swal.fire({
      title: 'Data sedang diunduh!',
      icon: 'info',
      showConfirmButton: false,
      timer: 1500
    }).then(() => {
      const table = document.getElementById('myTable');
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
  });
</script>

@endsection
