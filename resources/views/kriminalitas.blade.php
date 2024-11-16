@extends('layouts.dashboard')

@section('content')

<!-- component -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/js-file-download@0.4.12/dist/js-file-download.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="flex min-h-screen w-full top-0">

  @if($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
      @endforeach
    </div>
  @endif

  <!-- Konten utama (tabel) -->
  <main class="flex-grow p-4">
    <div class="px-3 py-4">
      <!-- Tombol unduh dan tambah -->
      <div class="flex space-x-4 mb-4">
        <a href="{{ route('kriminalitas.download') }}"
          class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Unduh Data
        </a>
        <a href="{{ route('kriminalitas.create') }}"
          class=" bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
          Tambah Data
        </a>
      </div>

      <table class="w-full text-md bg-white shadow-md rounded mb-4" id="myTable">
        <thead>
          <tr class="border-b">
            <th class="text-center p-1 align-middle">No</th>
            <th class="text-center p-1 align-middle">Tahun</th>
            <th class="text-center p-1 align-middle">Kabupaten/Kota</th>
            <th class="text-center p-1 align-middle">CT</th>
            <th class="text-center p-1 align-middle">P21</th>
            <th class="text-center p-1 align-middle">Tahap II</th>
            <th class="text-center p-1 align-middle">RJ</th>
            <th class="text-center p-1 align-middle">SP3</th>
            <th class="text-center p-1 align-middle">SP2LID</th>
            <th class="text-center p-1 align-middle">Total CCT</th>
            <th class="text-center p-1 align-middle">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($kriminalitas as $index => $data)
          <tr class="border-b hover:bg-orange-100 {{ $index % 2 == 0 ? 'bg-gray-100' : '' }}">
            <td class="text-center p-3 px-5">{{ $index + 1 }}</td>
            <td class="text-center p-3 px-5">{{ $data->years }}</td>
            <td class="text-center p-3 px-5">{{ $data->regency }}</td>
            <td class="text-center p-3 px-5">{{ $data->CT }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalP21 }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalTahap2 }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalRJ }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalSP3 }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalSP2LID }}</td>
            <td class="text-center p-3 px-5">{{ $data->totalCCT }}</td>
            <td class="text-center p-3 px-5 flex justify-center space-x-2">
              <a href="{{ route('kriminalitas.edit', $data->id) }}"
                class="text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('kriminalitas.destroy', $data->id) }}" method="POST" id="delete-form-{{ $data->id }}">
                @csrf
                @method('DELETE')
                <button type="button"
                  class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline"
                  onclick="confirmDelete({{ $data->id }})">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

    </main>
  </div>

  @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = "{{ route('jenis_kriminalitas.index') }}"; // Redirect ke halaman yang diinginkan
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Kesalahan',
            text: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = "{{ route('jenis_kriminalitas.index') }}"; // Redirect ke halaman yang diinginkan
        });
    </script>
@endif


  <script>
    // SweetAlert confirmation for delete
    function confirmDelete(id) {
      Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data ini akan dihapus secara permanen!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
        }
      });
    }
  </script>

@endsection
