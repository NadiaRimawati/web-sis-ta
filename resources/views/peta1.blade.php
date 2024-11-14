@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peta GeoJSON dengan Leaflet</title>
    <!-- Tambahkan Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <!-- Tambahkan Leaflet Search CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-search/dist/leaflet-search.min.css" />
</head>

<body class="bg-gray-100">
    <div class="flex flex-col md:flex-row m-2 space-y-2 md:space-y-0">
        <!-- Sidebar -->
        <div class="w-2/12 bg-red-900 text-white rounded-md p-4 md:p-2">
            <ul class="space-y-2">
                <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('ct')">Crime Total</li>
                <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('cct')">Crime Clearance
                    Total</li>
            </ul>
        </div>
        <!-- Content Area (Peta) -->
        <div class="w-11/12 bg-gray-100 rounded-md p-4 relative ml-0 md:ml-2" id="content-area">
            <!-- Div untuk menampilkan peta -->
            <div id="ct" class="content hidden">
                <h2 class="text-xl font-semibold mb-2">Peta Crime Total Provinsi Aceh</h2>
                <!-- Filter Tahun untuk Crime Total -->
                <div class="absolute top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-4">
                    <label for="year-filter-ct" class="block text-sm font-semibold">Pilih Tahun</label>
                    <select id="year-filter-ct" class="w-full p-2 bg-red-700 text-white rounded-md"
                        onchange="filterByYear('ct')">
                        <!-- Daftar tahun akan diisi oleh JavaScript -->
                    </select>
                </div>
            </div>
            <div id="cct" class="content hidden">
                <h2 class="text-xl font-semibold mb-2">Peta Crime Clearance Total Provinsi Aceh</h2>
                <!-- Filter Tahun untuk Crime Clearance Total -->
                <div class="absolute top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-4">
                    <label for="year-filter-cct" class="block text-sm font-semibold">Pilih Tahun</label>
                    <select id="year-filter-cct" class="w-full p-2 bg-red-700 text-white rounded-md"
                        onchange="filterByYear('cct')">
                        <!-- Daftar tahun akan diisi oleh JavaScript -->
                    </select>
                </div>
            </div>

            <!-- Map div dengan margin-top untuk memberi jarak antara filter dan peta -->
            <div id="map" class="h-screen w-full rounded-md mt-32"></div>

            <id="legend" class="absolute top-64 left-6 bg-white border border-gray-300 rounded-md p-2 z-10">
                <h4 class="font-bold">Legenda</h4>
                <div><span
                        style="background-color: #FF0000; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span>
                    Tingkat 5 (Tertinggi)</div>
                <div><span
                        style="background-color: #ffa500; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span>
                    Tingkat 4</div>
                <div><span
                        style="background-color: #FFFF00; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span>
                    Tingkat 3</div>
                <div><span
                        style="background-color: #5CE65C; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span>
                    Tingkat 2</div>
                <div><span
                        style="background-color: #008000; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span>
                    Tingkat 1 (Terendah)</div>
            <div><span
                        style="background-color: #fff; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span>
                    Tidak Ada Data</div>

            </div>


        </div>
    </div>

    <!-- Tambahkan Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <!-- Tambahkan Leaflet Search JavaScript -->
    <script src="https://unpkg.com/leaflet-search/dist/leaflet-search.min.js"></script>

    <script>
        // Function to show content based on menu clicked
        let geojsonLayer; // Simpan referensi ke layer GeoJSON
        let crimeData = [];
        let availableYears = []; // Menyimpan tahun yang tersedia
        let geojsonDatas
        let filteredCrimeData = []

        function showContent(contentId) {
            var contents = document.querySelectorAll('.content');
            contents.forEach(content => content.classList.add('hidden'));
            document.getElementById(contentId).classList.remove('hidden');
            getData(contentId); // Ambil data baru
        }

        const map = L.map('map').setView([4.5559, 96.8299], 7); // Mengatur posisi peta awal (Aceh)
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function getColor(rank) {
            if (rank == 5) return '#FF0000';
            else if (rank == 4) return '#ffa500';
            else if (rank == 3) return '#FFFF00';
            else if (rank == 2) return '#5CE65C';
            else if (rank == 1) return '#008000';
        }

        function style(feature) {
            const regencyData = filteredCrimeData.find(item => item.regency === feature.properties.Kab_Kota);
            const total = regencyData ? regencyData.total : 0;

            let color = "#fff"
            if (regencyData) { 
                color = getColor(regencyData.class);
            }

            return {
                fillColor: color,
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        function onEachFeature(feature, layer) {
            console.log(crimeData)
            const regencyData = filteredCrimeData.find(item => item.regency === feature.properties.Kab_Kota);
            const total = regencyData ? regencyData.total : 'Data Tidak Tersedia';

            if (regencyData) {
                const areaName = feature.properties.Kab_Kota || 'Nama Wilayah Tidak Tersedia';
                const popupContent = ` 
                    <h3 class="text-sm">Kab/Kota: ${areaName}</h3>
                    <h3 class="text-sm">Tahun: ${regencyData.years}</h3>
                    <h3 class="font-bold text-lg">Total: ${total}</h3>
                `;
                layer.bindPopup(popupContent);
            } else {
                    const areaName = feature.properties.Kab_Kota || 'Nama Wilayah Tidak Tersedia';
                    const popupContent = `
                    <h3 class="text-sm ">Kab/Kota: ${areaName}</h3>
                    <h3 class="text-sm">Tahun: ${filteredCrimeData[0].years}</h3>
                    <h3 class="text-sm">Tidak ada data</h3>
                    `;
                    layer.bindPopup(popupContent);
                }
             }

        function getData(endpoint) {
            fetch(`/kriminalitas/${endpoint}`)
                .then(response => response.json())
                .then(data => {
                    crimeData = data;
                    filteredCrimeData = data
                    // Menentukan tahun yang tersedia
                    availableYears = [...new Set(data.map(item => item.years))];
                    updateYearFilter(endpoint);

                    if (geojsonLayer) {
                        map.removeLayer(geojsonLayer);
                    }

                    fetch('/map/PETA_KABUPATEN_ACEH.geojson')
                        .then(response => response.json())
                        .then(geojsonData => {

                            geojsonDatas = geojsonData

                            geojsonLayer = L.geoJSON(geojsonData, {
                                style: style,
                                onEachFeature: onEachFeature
                            }).addTo(map);
                        });

                })
                .catch(error => console.error('Error loading data:', error));
        }


        // Mengupdate dropdown tahun
        function updateYearFilter(endpoint) {
            const yearFilter = document.getElementById(`year-filter-${endpoint}`);
            yearFilter.innerHTML = ''; // Menghapus opsi sebelumnya

            // Menambahkan opsi untuk setiap tahun yang tersedia
            availableYears.forEach(years => {
                const option = document.createElement('option');
                option.value = years;
                option.textContent = years;
                yearFilter.appendChild(option);
            });
        }

        function filterByYear(endpoint) {
            const selectedYear = document.getElementById(`year-filter-${endpoint}`).value;
            filteredCrimeData = crimeData.filter(item => item.years == selectedYear);

            if (geojsonLayer) {
                map.removeLayer(geojsonLayer);
            }

            geojsonLayer = L.geoJSON(geojsonDatas, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        }


        // Inisialisasi tampilan awal
        showContent('ct');
    </script>
</body>

</html>
@endsection