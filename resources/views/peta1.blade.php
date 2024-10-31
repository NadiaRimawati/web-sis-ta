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
                <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('cct')">Crime Clearance Total</li>
            </ul>
        </div>
        <!-- Content Area (Peta) -->
        <div class="w-11/12 bg-gray-100 rounded-md p-4 relative ml-0 md:ml-2" id="content-area">
            <!-- Div untuk menampilkan peta -->
            <div id="ct" class="content hidden">Peta Crime Total Provinsi Aceh</div>
            <div id="cct" class="content hidden">Peta Crime Clearance Total Provinsi Aceh</div>

            <div id="map" class="h-screen w-full rounded-md"></div>

            <div id="legend" class="absolute top-32 left-6 bg-white border border-gray-300 rounded-md p-2">
                <h4 class="font-bold">Legenda</h4>
                <div><span style="background-color: #FF0000; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Tingkat 5 (Tertinggi)</div>
                <div><span style="background-color: #ffa500; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Tingkat 4</div>
                <div><span style="background-color: #FFFF00; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Tingkat 3</div>
                <div><span style="background-color: #5CE65C; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Tingkat 2</div>
                <div><span style="background-color: #008000; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Tingkat 1 (Terendah)</d>
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
            if (rank == 5) { // Tingkat pertama
                return '#FF0000'; // Warna untuk tingkat pertama
            } else if (rank == 4) { // Tingkat kedua
                return '#ffa500'; // Warna untuk tingkat kedua
            } else if (rank == 3) { // Tingkat ketiga
                return '#FFFF00'; // Warna untuk tingkat ketiga
            } else if (rank == 2) { // Tingkat kedua
                return '#5CE65C'; // Warna untuk tingkat kedua
            } else if (rank == 1) { // Tingkat satu
                return '#008000'; // Warna untuk tingkat satu
            } 
        }

        function style(feature) {
            const regencyData = crimeData.find(item => item.regency === feature.properties.Kab_Kota);
            const total = regencyData ? regencyData.total : 0;

            const color = getColor(regencyData.class);
            
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
            const regencyData = crimeData.find(item => item.regency === feature.properties.Kab_Kota);
            const total = regencyData ? regencyData.total : 'Data Tidak Tersedia';

            if (feature.properties) {
                const areaName = feature.properties.Kab_Kota || 'Nama Wilayah Tidak Tersedia';
                const popupContent = `
                    <h3 class="text-sm">Kab/Kota: ${areaName}</h3>
                    <h3 class="text-sm">Tahun: ${regencyData.years}</h3>
                    <h3 class="font-bold text-lg">Total: ${total}</h3>
                `;
                layer.bindPopup(popupContent);
            }
        }

        let crimeData = [];

        function getData(endpoint) {
            fetch(`/kriminalitas/${endpoint}`)
                .then(response => response.json())
                .then(data => {
                    crimeData = data;

                    if (geojsonLayer) {
                        map.removeLayer(geojsonLayer);
                    }

                    fetch('/map/PETA_KABUPATEN_ACEH.geojson')
                        .then(response => response.json())
                        .then(geojsonData => {
                            geojsonLayer = L.geoJSON(geojsonData, {
                                style: style,
                                onEachFeature: onEachFeature
                            }).addTo(map);
                        });
                })
                .catch(error => console.error('Error loading data:', error));
        }
    </script>
</body>
</html>
@endsection
