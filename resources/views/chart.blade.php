@extends('layouts.app')

@section('content')

   <!-- Grafik CT -->

   <div class="w-full max-w-6xl mb-6 mt-4 mx-auto">
<div class="text-center mb-12">
    <h3 class="text-3xl font-bold mb-4">Grafik Crime Total (CT) Aceh</h3>
    <canvas id="ctChart" width="800" height="400" class="mx-auto"></canvas> <!-- Ukuran diperbesar dan diratakan -->
</div>

<!-- Grafik TotalCCT -->
<div class="text-center mb-12">
    <h3 class="text-3xl font-bold mb-4">Grafik Crime Clearance Total (CCT) Aceh</h3>
    <canvas id="totalCCTChart" width="800" height="400" class="mx-auto"></canvas> <!-- Ukuran diperbesar dan diratakan -->
</div>


    <script>
        // Data untuk daerah (x-axis)
        var regencies = @json($regencies);

        // Data tahun
        var years = @json($years);

        // Data CT berdasarkan tahun
        var ctData = @json($ctData);

        // Data TotalCCT berdasarkan tahun
        var totalCCTData = @json($totalCCTData);

        // Grafik CT
        var ctx1 = document.getElementById('ctChart').getContext('2d');
        var ctDatasets = years.map((year) => {
            return {
                label: year, // Label tahun pada legend
                data: ctData[year],
                borderColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`,
                backgroundColor: 'rgba(0, 0, 0, 0)',
                fill: false
            };
        });

        var ctChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: regencies, // Daerah sebagai label x-axis
                datasets: ctDatasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Daerah'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'CT'
                        }
                    }
                }
            }
        });

        // Grafik TotalCCT
        var ctx2 = document.getElementById('totalCCTChart').getContext('2d');
        var totalCCTDatasets = years.map((year) => {
            return {
                label: year, // Label tahun pada legend
                data: totalCCTData[year],
                borderColor: `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 1)`,
                backgroundColor: 'rgba(0, 0, 0, 0)',
                fill: false
            };
        });

        var totalCCTChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: regencies, // Daerah sebagai label x-axis
                datasets: totalCCTDatasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Daerah'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'CCT'
                        }
                    }
                }
            }
        });
    </script>

@endsection
