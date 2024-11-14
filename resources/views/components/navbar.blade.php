<nav class="navbar bg-white p-4 shadow-md relative z-50"> <!-- Tambahkan relative z-50 di sini -->
    <div class="flex justify-between items-center">
        <div class="text-gray-900 text-lg font-bold">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-20 w-20 object-cover">
        </div>
        <div class="flex space-x-4 relative">
            <a href="{{ route('beranda') }}"
                class="text-gray-900 px-4 py-2 hover:bg-red-900 hover:text-white rounded transition duration-300">Beranda</a>
            <a href="{{ route('informasi') }}"
                class="text-gray-900 px-4 py-2 hover:bg-red-900 hover:text-white rounded transition duration-300">Informasi</a>
            <a href="{{ route('chart') }}"
                class="text-gray-900 px-4 py-2 hover:bg-red-900 hover:text-white rounded transition duration-300">Grafik</a>
            <!-- Menu Peta dengan Dropdown -->
            <div class="relative group">
                <button
                    class="text-gray-900 px-4 py-2 hover:bg-red-900 hover:text-white rounded transition duration-300 focus:outline-none">
                    Peta
                </button>
                <div class="absolute left-0 mt-2 w-48 bg-white rounded-md shadow-lg hidden group-hover:block z-50"
                    id="dropdownMenu"> <!-- Tambahkan z-50 -->
                    <a href="{{ route('peta_1') }}"
                        class="block px-4 py-2 text-gray-800 hover:bg-red-900 hover:text-white">Peta CT dan CCT</a>
                    <a href="{{ route('peta_2') }}"
                        class="block px-4 py-2 text-gray-800 hover:bg-red-900 hover:text-white">Peta jenis tahapan
                        CC</a>
                    <a href="{{ route('peta_3') }}"
                        class="block px-4 py-2 text-gray-800 hover:bg-red-900 hover:text-white">Peta jenis kejahatan</a>
                </div>
            </div>

            <a href="{{ route('tentang_kami') }}"
                class="text-gray-900 px-4 py-2 hover:bg-red-900 hover:text-white rounded transition duration-300">Tentang
                Kami</a>
        </div>
    </div>
</nav>

<style>
    .navbar {
        position: relative;
        z-index: 10;
    }

    #dropdownMenu {
        z-index: 50;
        /* Pastikan z-index dropdown lebih tinggi dari peta */
    }

    #map {
        z-index: 0;
        /* Pastikan z-index peta lebih rendah */
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const dropdownButton = document.querySelector('.relative button');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', (event) => {
            event.stopPropagation();
            dropdownMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', () => {
            dropdownMenu.classList.add('hidden');
        });
    });
</script>
