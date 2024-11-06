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
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('pencurian')">Pencurian</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('penipuan')">Penipuan</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('penggelapan')">Penggelapan</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('perjudian')">Perjudian</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('pemerkosaan')">Pemerkosaan</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('pembakaran')">Pembakaran</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('pemeresan')">Pemerasan</li>
                    <li class="cursor-pointer hover:bg-red-700 p-2 rounded" onclick="showContent('pembunuhan')">Pembunuhan</li>
                </ul>
            </div>

            <!-- Content Area (Peta) -->
            <div class="w-11/12 bg-gray-100 rounded-md p-4 relative ml-0 md:ml-2" id="content-area">
                <div id="pencurian" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Pencurian Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-pencurian" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-pencurian" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('pencurian')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="penipuan" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Penipuan Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-penipuan" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-penipuan" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('penipuan')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="penggelapan" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Penggelapan Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-penggelapan" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-penggelapan" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('penggelapan')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="perjudian" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Perjudian Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-perjudian" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-perjudian" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('perjudian')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="pemerkosaan" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Pemerkosaan Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-pemerkosaan" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-pemerkosaan" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('pemerkosaan')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="pembakaran" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Pembakaran Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-pembakaran" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-pembakaran" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('pembakaran')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="pemeresan" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Pemerasan Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-pemeresan" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-pemeresan" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('pemeresan')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>
                <div id="pembunuhan" class="content hidden">
                    <h2 class="text-xl font-semibold mb-2">Peta Crime Pembunuhan Provinsi Aceh</h2>
                    <!-- Filter Tahun untuk Crime Clearance Total -->
                    <div class=" top-12 left-4 bg-white p-2 rounded-md shadow-md z-20 w-48 mb-[50px]">
                        <label for="year-filter-pembunuhan" class="block text-sm font-semibold">Pilih Tahun</label>
                        <select id="year-filter-pembunuhan" class="w-full p-2 bg-red-700 text-white rounded-md"
                            onchange="filterByYear('pembunuhan')">
                            <!-- Daftar tahun akan diisi oleh JavaScript -->
                        </select>
                    </div>
                </div>

                <!-- <div id="pencurian" class="content hidden">Peta Pencurian Provinsi Aceh</div>
                <div id="penipuan" class="content hidden">Peta Penipuan Provinsi Aceh</div>
                <div id="penggelapan" class="content hidden">Peta Penggelapan Provinsi Aceh</div>
                <div id="perjudian" class="content hidden">Peta Perjudian Provinsi Aceh</div>
                <div id="pemerkosaan" class="content hidden">Peta Pemerkosaan Provinsi Aceh</div>
                <div id="pembakaran" class="content hidden">Peta Pembakaran Provinsi Aceh</div>
                <div id="pemeresan" class="content hidden">Peta Pemerasan Provinsi Aceh</div>
                <div id="pembunuhan" class="content hidden">Peta Pembunuhan Provinsi Aceh</div> -->
                <!-- Div untuk menampilkan peta -->
                <div id="map" class="h-screen w-full rounded-md"></div>
                <div id="legend" class="absolute top-[260px] left-6 bg-white border border-gray-300 rounded-md p-2">
                <h4 class="font-bold">Legenda</h4>
                <div><span style="background-color: #FF0000; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Ada </div>
                <div><span style="background-color: #008000; display: inline-block; width: 20px; height: 20px; border: 1px solid #000;"></span> Tidak </d>
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

            function getColor(exist) {
                if (exist == 1) { // Tingkat pertama
                    return '#FF0000'; // Warna untuk tingkat pertama
                } else { // Tingkat kedua
                    return '#008000'; // Warna untuk tingkat kedua
                }
            }

            function onEachFeature(feature, layer) {
                const regencyData = filteredCrimeData.find(item => item.regency === feature.properties.Kab_Kota);
                if (regencyData) {
                    const areaName = feature.properties.Kab_Kota || 'Nama Wilayah Tidak Tersedia';
                    const popupContent = `
                    <h3 class="text-sm ">Kab/Kota: ${areaName}</h3>
                    <h3 class="text-sm">Tahun: ${regencyData.years}</h3>
                    `;
                    layer.bindPopup(popupContent);
                }
            }

            function style(feature) {
                const regencyData = filteredCrimeData.find(item => item.regency === feature.properties.Kab_Kota);
                let color = "#fff"
                if (regencyData) {
                    color = getColor(regencyData.selected_crime)
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

            let crimeData = [];
            let filteredCrimeData = []
            let jenisKriminal = ""
            let geojsonDatas


            function getData(endpoint) {
                fetch(`/jenis-kriminalitas/${endpoint}`)
                    .then(response => response.json())
                    .then(data => {
                        crimeData = data;
                        filteredCrimeData = data
                        jenisKriminal = endpoint

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
        showContent('pencurian');
        </script>
    </body>
</html>
@endsection