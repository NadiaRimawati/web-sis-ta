@extends('layouts.app')

@section('content')
<main>
    <div class="flex items-center justify-around">
        <div class="items-center mb-12 ml-4">
            <h2 class="text-5xl font-extrabold mb-4">GIS-UP</h2>
            <h2 class="text-3xl font-bold mb-2">platform WebGIS inovatif yang dirancang</h2>
            <h2 class="text-3xl font-bold mb-2">untuk memetakan dan menganalisis persebaran</h2>
            <h2 class="text-3xl font-bold mb-2">daerah rawan kriminalitas di Aceh.</h2>
        </div>
        <div class="static ml-8 mb-28">
            <img src="{{ asset('images/b1.jpg') }}" alt="Direktorat Logo" class="w-64 h-42 mt-2 rounded-t-[60px] rounded-br-xl">
            <div class="absolute -bottom-5 right-80 mb-28">
                <img src="{{ asset('images/b2.jpg') }}" alt="Direktorat Logo" class="w-52 h-52 rounded-full"> 
            </div>
        </div>
    </div>

    <!-- Menambah margin atas pada section FAQ -->
    <div class="flex flex-col items-center justify-center mt-16 mb-16">
    <!-- Menambahkan mb-16 untuk jarak antara FAQ dan footer -->
        <!-- Judul FAQ -->
        <div class="text-center mb-4">
            <h2 class="text-3xl font-bold mb-4">Kamu punya pertanyaan?</h2>
            <p class="text-gray-600 mt-4">Simak beberapa pertanyaan-pertanyaan berikut, siapa tahu salah satunya adalah <br> pertanyaan yang ingin kamu tanyakan.</p>
        </div>

        <!-- Komponen FAQ Start -->
        <div class="w-full max-w-screen-sm space-y-8"> <!-- space-y-8 menambahkan jarak antar item -->
            <button class="w-full border-b-2 border-gray-300 pb-8 text-left group focus:outline-none">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-semibold">P: Apa yang dimaksud dengan Crime Total (CT)?</div>
                    <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200 group-focus:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="mt-4 hidden text-gray-700 group-focus:flex">
                    <p>Crime Total (CT) adalah jumlah total semua jenis kejahatan yang tercatat di suatu wilayah tanpa memisahkan berdasarkan jenis kejahatannya. 
                    Contoh:
                    Jika di Kota Banda Aceh terdapat 5 kasus pencurian, 3 kasus perampokan, dan 2 kasus penipuan, maka Crime Total (CT) untuk Banda Aceh adalah 10.</p>
                </div>
            </button>

            <button class="w-full border-b-2 border-gray-300 pb-8 text-left group focus:outline-none">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-semibold">P: Apa yang dimaksud dengan Crime Clearance (CC)?</div>
                    <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200 group-focus:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="mt-4 hidden text-gray-700 group-focus:flex">
                    <p>Crime Clearance (CC) adalah jumlah kasus kriminal yang berhasil diselesaikan oleh pihak kepolisian dalam periode tertentu. Ini menunjukkan efektivitas penanganan kasus.
                    Contoh: Jika pada tahun 2024 terdapat 100 kasus pencurian di Banda Aceh dan 80 di antaranya berhasil diidentifikasi dan ditangani, maka Crime Clearance (CC) untuk kasus pencurian tersebut adalah 80.</p>
                </div>
            </button>

            <button class="w-full border-b-2 border-gray-300 pb-8 text-left group focus:outline-none">
                <div class="flex justify-between items-center">
                    <div class="text-lg font-semibold">P: Apa jenis data yang tersedia di GIS-UP?</div>
                    <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200 group-focus:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
                <div class="mt-4 hidden text-gray-700 group-focus:flex">
                    <p>GIS-UP menyediakan data tentang berbagai jenis kejahatan, termasuk pencurian dan tindak kekerasan lainnya serta informasi mengenai distribusi kejahatan di berbagai wilayah Aceh.</p>
                </div>
            </button>
        </div>
    </div>
</main>
@endsection
