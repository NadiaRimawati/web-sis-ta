@extends('layouts.app')

@section('content')
<main>
    <div class="flex items-center justify-around">
        <div class="text-left">
            <h2 class="text-4xl font-extrabold mb-4">GIS-UP</h2>
            <h2 class="text-2xl font-bold mb-2">platform WebGIS inovatif yang dirancang</h2>
            <h2 class="text-2xl font-bold mb-2">untuk memetakan dan menganalisis persebaran</h2>
            <h2 class="text-2xl font-bold mb-2">daerah rawan kriminalitas di Aceh.</h2>
        </div>
        <div class="static ml-8 mb-20">
            <img src="{{ asset('images/b1.jpg') }}" alt="Direktorat Logo" class="w-64 h-42 mt-2 rounded-t-[60px] rounded-br-xl">
            <div class="absolute -bottom-5 right-80">
                <img src="{{ asset('images/b2.jpg') }}" alt="Direktorat Logo" class="w-52 h-52 rounded-full"> 
            </div>
        </div>
    </div>

  <!-- Grafik Gabungan CT dan CC per Kabupaten -->
<div class="container mx-auto mt-20">
    <h3 class="text-3xl font-bold mb-4 text-center">Grafik Crime Total (CT) & Crime Clearance Total (CCT) Aceh </h3>
    <div class="w-full max-w-4xl mx-auto">
        <canvas id="combinedLineChart" width="400" height="200"></canvas>
    </div>
</div>

<!-- Script untuk Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const combinedLineCtx = document.getElementById('combinedLineChart').getContext('2d');

        // Data jumlah kasus per kabupaten untuk CT dan CC di tahun 2023 dan 2024
        const ctData2023 = [352, 503, 436, 48, 256, 268, 19, 97, 149, 113, 116, 179, 106, 103, 132, 689, 114, 119, 72, 144, 381, 115, 261, 158];
        const ccData2023 = [113, 960, 229, 65, 441, 98, 55, 266, 352, 188, 190, 230, 113, 93, 112, 519, 85, 87, 47, 78, 176, 106, 39];
        const ctData2024 = [300, 490, 420, 70, 260, 280, 25, 120, 140, 110, 118, 170, 100, 105, 130, 700, 115, 122, 75, 150, 390, 120, 255, 165];
        const ccData2024 = [100, 950, 210, 75, 450, 105, 60, 270, 360, 195, 185, 225, 115, 95, 110, 530, 90, 85, 50, 80, 180, 100, 45];

        // Menentukan warna untuk setiap garis
        const ctLineColor2023 = 'rgba(255, 99, 132, 1)';
        const ccLineColor2023 = 'rgba(54, 162, 235, 1)';
        const ctLineColor2024 = 'rgba(255, 159, 64, 1)';
        const ccLineColor2024 = 'rgba(75, 192, 192, 1)';

        new Chart(combinedLineCtx, {
            type: 'line',
            data: {
                labels: ['Banda Aceh', 'Lhokseumawe', 'Langsa', 'Sabang', 'Pidie', 'Bireuen', 'Gayo Lues', 'Pidie Jaya', 'Subulussalam', 'Nagan Raya', 'Simeulue', 'Aceh Barat', 'Bener Meriah', 'Aceh Besar', 'Aceh Singkil', 'Aceh Tamiang', 'Aceh Barat Daya', 'Aceh Utara', 'Aceh Jaya', 'Aceh Tengah', 'Aceh Tenggara', 'Aceh Timur', 'Aceh Selatan'],
                datasets: [
                    {
                        label: 'CT - 2023',
                        data: ctData2023,
                        borderColor: ctLineColor2023,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'CCT - 2023',
                        data: ccData2023,
                        borderColor: ccLineColor2023,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'CT - 2024',
                        data: ctData2024,
                        borderColor: ctLineColor2024,
                        backgroundColor: 'rgba(255, 159, 64, 0.2)',
                        borderWidth: 2,
                        fill: true
                    },
                    {
                        label: 'CCT -2024',
                        data: ccData2024,
                        borderColor: ccLineColor2024,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        enabled: true,
                    },
                    legend: {
                        position: 'right', // Memindahkan legenda ke samping kanan
                        labels: {
                            color: 'gray',
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)',
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.2)',
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Kasus'
                        }
                    }
                }
            }
        });
    });
</script>

    </script>
<div class="flex flex-col ml-36 mt-10  h-screen">

<!-- Judul -->
<div class=" items-center mb-8">
    <h2 class="text-2xl font-bold">Kamu punya pertanyaan?</h2>
    <p class="text-gray-600 mt-2">Simak beberapa pertanyaan-pertanyaan berikut, siapa tahu salah satunya adalah <br> pertanyaan yang ingin kamu tanyakan.</p>
</div>

<!-- Component Start -->
<div class="w-full max-w-screen-sm ">
    <button class="w-full border-b-2 border-gray-300 pb-6 text-left group mt-6 focus:outline-none">
        <div class="flex justify-between items-center">
            <div class="text-lg font-semibold">P: Apa yang dimaksud dengan Crime Total (CT)?</div>
            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200 group-focus:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div class="mt-3 hidden text-gray-700 group-focus:flex">
        <p>Crime Total (CT) adalah jumlah total semua jenis kejahatan yang tercatat di suatu wilayah tanpa memisahkan berdasarkan jenis kejahatannya. 
            Contoh:
            Jika di Kota Banda Aceh terdapat 5 kasus pencurian, 3 kasus perampokan, dan 2 kasus penipuan, maka Crime Total (CT) untuk Banda Aceh adalah 10.</p>
        </div>

    <button class="w-full border-b-2 border-gray-300 pb-6 text-left group mt-6 focus:outline-none">
        <div class="flex justify-between items-center">
            <div class="text-lg font-semibold">P: Apa yang dimaksud dengan Crime Clearance (CC)?</div>
            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200 group-focus:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div class="mt-3 hidden text-gray-700 group-focus:flex">
            <p>Crime Clearance (CC) adalah jumlah kasus kriminal yang berhasil diselesaikan oleh pihak kepolisian dalam periode tertentu. Ini menunjukkan efektivitas penanganan kasus.
            Contoh: Jika pada tahun 2024 terdapat 100 kasus pencurian di Banda Aceh dan 80 di antaranya berhasil diidentifikasi dan ditangani, maka Crime Clearance (CC) untuk kasus pencurian tersebut adalah 80.</p>
        </div>
    </button>

    <button class="w-full border-b-2 border-gray-300 pb-6 text-left group mt-6 focus:outline-none">
        <div class="flex justify-between items-center">
            <div class="text-lg font-semibold">P: Apa jenis data yang tersedia di GIS-UP?</div>
            <svg class="w-6 h-6 text-gray-500 transform transition-transform duration-200 group-focus:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
        </div>
        <div class="mt-3 hidden text-gray-700 group-focus:flex">
            <p>GIS-UP menyediakan data tentang berbagai jenis kejahatan, termasuk pencurian dan tindak kekerasan lainnya serta informasi mengenai distribusi kejahatan di berbagai wilayah Aceh.</p>
        </div>
    </button>
</div>

</div>


</main>
@endsection
