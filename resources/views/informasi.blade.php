@extends('layouts.app')

@section('content')


<div class="w-full max-w-6xl mb-6 mt-4 mx-auto">
    <h3 class="text-3xl font-bold text-center mx-auto">Definisi Crime Total (CT) & Crime Clearance Total (CCT)</h3>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
    <!-- Kotak Crime Total (CT) -->
    <div class="flex bg-red-900 rounded-lg shadow-lg overflow-hidden w-4/5 mx-auto">
        <div class="p-4 flex-1">
            <p class="font-bold text-center text-white"">Crime Total (CT)</p>
            <p class="text-white text-sm text-center mt-2">
            Crime Total (CT) merupakan total jumlah semua jenis kejahatan yang dilaporkan dalam suatu periode waktu tertentu. Pengukuran ini mencakup berbagai kategori kejahatan, seperti pembunuhan, pencurian, penipuan, dan kekerasan.
            </p>
        </div>
    </div>

    <!-- Kotak Crime Clearance Total (CCT) -->
    <div class="flex bg-red-900 rounded-lg shadow-lg overflow-hidden w-4/5 mx-auto">
        <div class="p-4 flex-1">
            <p class="font-bold text-center text-white">Crime Clearance Total (CCT)</p>
            <p class="text-white text-sm text-center mt-2">
                Crime Clearance Total (CCT) merupakan jumlah kasus kejahatan yang telah diselesaikan atau ditutup oleh pihak berwenang. Ini termasuk kasus yang telah berhasil dipecahkan, di mana pelaku ditangkap dan kasus ditindaklanjuti, serta kasus yang dihentikan karena alasan tertentu (misalnya, tidak cukup bukti).
            </p>
        </div>
    </div>
</div>

<!-- Judul Jenis Kejahatan -->

<div class="w-full max-w-6xl mb-6 mt-4 mx-auto"> <!-- Tambahkan pt-8 untuk padding atas -->
    <h3 class="text-3xl font-bold text-center">Jenis-jenis Kejahatan</h3>
</div>


  <!-- Kotak-Kotak dengan Gambar dan Teks -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-12">
    <!-- Kotak Pembunuhan -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/i1.jpg') }}" alt="Shape Image 1" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Pembunuhan</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Pembunuhan adalah tindakan yang menyebabkan kematian orang lain secara sengaja atau tidak sengaja. Ini termasuk berbagai bentuk kekerasan yang mengakibatkan hilangnya nyawa.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Pencurian -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/u.jpg') }}" alt="Shape Image 2" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Pencurian</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Pencurian adalah tindakan mengambil barang milik orang lain tanpa izin dengan maksud untuk memiliki barang tersebut secara permanen. Ini bisa termasuk pencurian rumah, kendaraan, atau barang-barang pribadi lainnya.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Penipuan -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/c.jpg') }}" alt="Shape Image 3" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Penipuan</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Penipuan adalah tindakan menipu orang lain dengan menggunakan informasi yang salah atau menyesatkan untuk keuntungan pribadi, seperti penipuan investasi atau penipuan identitas.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Penggelapan -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/k.jpg') }}" alt="Shape Image 4" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Penggelapan</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Penggelapan adalah tindakan mencuri atau mengambil barang milik orang lain secara tidak sah dengan cara yang tidak langsung terlihat, sering kali dilakukan oleh orang yang memiliki kepercayaan dari korban.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Perjudian -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/w.jpg') }}" alt="Shape Image 5" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Perjudian</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Perjudian adalah aktivitas yang melibatkan taruhan atau pertaruhan uang atau barang berharga pada hasil dari suatu permainan atau peristiwa yang tidak pasti, sering kali dianggap ilegal dalam beberapa yurisdiksi.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Pemerkosaan -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/n.jpg') }}" alt="Shape Image 6" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Pemerkosaan</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Pemerkosaan adalah tindakan kekerasan seksual yang melibatkan hubungan seksual tanpa persetujuan dari korban. Ini merupakan pelanggaran serius terhadap hak-hak individu dan sering kali diikuti dengan dampak psikologis.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Pembakaran -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/b.jpg') }}" alt="Shape Image 7" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Pembakaran</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Pembakaran adalah tindakan sengaja membakar atau merusak properti milik orang lain dengan api. Ini dapat melibatkan pembakaran rumah, kendaraan, atau properti lainnya dengan tujuan merusak atau menghancurkan.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Pemerasan -->
    <div class="relative bg-gray-200 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto">
        <img src="{{ asset('images/m.jpg') }}" alt="Shape Image 8" class="w-full h-32 object-cover">
        <div class="p-2 text-center">
            <p class="font-semibold">Pemerasan</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Pemerasan adalah tindakan mengancam seseorang agar menyerahkan uang atau barang berharga dengan ancaman kekerasan atau intimidasi. Biasanya dilakukan untuk keuntungan paksa.</p>
            </div>
        </div>
    </div>
</div>


<!-- Jenis- jenis Tahapan Crime Clearance (CC)  -->

<div class="w-full max-w-6xl mb-6 mt-4 mx-auto">
    <h3 class="text-3xl font-bold text-center">Jenis-jenis Tahapan Crime Clearance (CC)</h3>
</div>


<!-- Kotak-Kotak dengan Background Merah -->
<div class="grid grid-cols-3 md:grid-cols-3 gap-6 mb-12">
    <!-- Baris Atas dengan 3 Kotak -->
    <!-- Kotak P21 -->
    <div class="relative bg-red-900 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto h-32 flex items-center justify-center">
        <div class="p-2 text-center">
            <p class="font-semibold text-white">P21</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>P21 ialah Penuntutan merupakan tahap di mana penyidik merasa cukup bukti untuk menyerahkan kasus ke kejaksaan untuk proses penuntutan.</p>
            </div>
        </div>
    </div>

    <!-- Kotak Restorative Justice (RJ) -->
    <div class="relative bg-red-900 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto h-32 flex items-center justify-center">
        <div class="p-2 text-center">
            <p class="font-semibold text-white">Restorative Justice (RJ)</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Restorative Justice (RJ) merupakan pendekatan penyelesaian perkara yang berfokus pada rehabilitasi pelaku dan pengembalian kepada masyarakat, serta memberikan kesempatan kepada korban untuk terlibat dalam proses.</p>
            </div>
        </div>
    </div>

    <!-- Kotak SP2LID -->
    <div class="relative bg-red-900 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto h-32 flex items-center justify-center">
        <div class="p-2 text-center">
            <p class="font-semibold text-white">SP2LID</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>SP2LID merupakan Surat Perintah Penyelidikan. Ini adalah surat yang dikeluarkan oleh penyidik untuk memulai penyelidikan terhadap suatu perkara.</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-2 gap-6">
    <!-- Baris Bawah dengan 2 Kotak -->
    <!-- Kotak Tahap 2 -->
    <div class="relative bg-red-900 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto h-32 flex items-center justify-center">
        <div class="p-2 text-center">
            <p class="font-semibold text-white">Tahap 2</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>Tahap 2 merujuk pada Tahap Penuntutan, merupakan tahapan setelah P21, di mana perkara telah diajukan ke pengadilan dan dilanjutkan dengan proses hukum di tingkat pengadilan.</p>
            </div>
        </div>
    </div>

    <!-- Kotak SP3 -->
    <div class="relative bg-red-900 rounded-lg shadow-lg overflow-hidden group w-4/5 mx-auto h-32 flex items-center justify-center">
        <div class="p-2 text-center">
            <p class="font-semibold text-white">SP3</p>
        </div>
        <div class="absolute inset-0 bg-black bg-opacity-75 opacity-0 group-hover:opacity-100 flex items-center justify-center p-4">
            <div class="text-white text-sm text-center max-w-xs overflow-auto">
                <p>SP3 merupakan Surat Perintah Penghentian Penyidikan. Ini adalah surat yang dikeluarkan oleh penyidik untuk menghentikan penyidikan suatu perkara, biasanya karena tidak ditemukan cukup bukti untuk melanjutkan kasus.</p>
            </div>
        </div>
    </div>
</div>

<div class="container w-full max-w-6xl mb-8 mt-8"">
@endsection
