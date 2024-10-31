<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Kejahatan</title>
    <!-- Tambahkan Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto mt-10">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="px-6 py-4">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead>
                        <tr class="bg-red-900 text-white">
                            <th class="px-6 py-3 border-b text-center" colspan="2">Detail Informasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-6 py-4 border-b bg-white text-left">Crime Total (CT)</td>
                            <td class="px-6 py-4 border-b">{{ $crimeTotal }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b bg-white text-left">Crime Clearance (CC)</td>
                            <td class="px-6 py-4 border-b">{{ $crimeClearance }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 border-b bg-white text-left">Jumlah Jenis Kejahatan</td>
                            <td class="px-6 py-4 border-b">{{ $crimeTypes }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
