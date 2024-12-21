@extends("layouts.app")

@section("content")
    <!-- Tentang Kami Section -->
    <div class="container mx-auto p-4 mt-12">
   <!-- Kotak Direktorat dengan Teks dan Gambar Bersebelahan -->
<div class="w-full max-w-6xl bg-gray-200 rounded-md shadow-lg flex items-center justify-center mb-12 relative ml-12"> <!-- Menambahkan ml-16 untuk margin kiri lebih besar -->
    <!-- Kotak Teks di Samping Kiri -->
    <div class="w-1/2 h-48 p-6 bg-gray-200 rounded-l-md flex items-center justify-center">
        <p class="text-black text-center text-1xl">
            Direktorat Reserse Kriminal Umum Polda Aceh<br>
            Bertanggung jawab atas penyelidikan kasus kriminal umum guna menjaga keamanan dan ketertiban di Aceh.
        </p>
    </div>
    <!-- Kotak Gambar di Samping Kanan -->
    <div class="w-1/2 h-48 flex justify-center items-center bg-gray-300 rounded-r-md overflow-hidden">
        <img src="{{ asset('images/a.jpg') }}" alt="Direktorat Reserse Kriminal Umum Polda Aceh" class="w-full h-full object-cover">
    </div>
</div>

        <!-- Kotak WebGIS dengan Teks dan Gambar Bersebelahan -->
        <div class="w-full max-w-6xl bg-gray-200 rounded-md shadow-lg flex items-center justify-center mb-12 relative ml-12">
            <!-- Kotak Teks di Samping Kiri -->
            <div class="w-1/2 h-48 p-6 bg-gray-200 rounded-l-md flex items-center justify-center">
                <p class="text-black text-center text-1xl">
                    WebGIS Persebaran Kriminalitas di Aceh<br>
                    Bertujuan memberikan informasi mengenai tingkat kriminalitas di setiap kabupaten di Aceh.
                </p>
            </div>
            <!-- Kotak Gambar di Samping Kanan -->
            <div class="w-1/2 h-48 flex justify-center items-center bg-gray-300 rounded-r-md overflow-hidden">
                <img src="{{ asset('images/e.png') }}" alt="WebGIS Persebaran Kriminalitas di Aceh" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
@endsection
