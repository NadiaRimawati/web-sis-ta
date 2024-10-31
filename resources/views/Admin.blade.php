<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
    <style>
        .body-bg {
            background-color: #e63946;
            background-image: linear-gradient(315deg, #e63946 0%, #f1faee 74%);
        }
    </style>
</head>
<body class="body-bg min-h-screen flex flex-col justify-center items-center pt-10 pb-6 px-6" style="font-family:'Lato',sans-serif;">
    <header class="text-center mb-8">
        <h1 class="text-4xl font-bold text-red-900">GIS-UP</h1>
    </header>

    <main class="bg-white max-w-md w-full p-8 rounded-lg shadow-md">
        <section class="mb-6">
            <h3 class="text-red-900 font-bold text-2xl">Selamat Datang di GIS-UP</h3>
            <p class="text-red-900 pt-2 text-sm">Masuk ke akun Anda.</p>
        </section>

        @if ($errors->any())
            <div class="mb-4">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <span class="block sm:inline">{{ $errors->first('login') }}</span>
                </div>
            </div>
        @endif

        <section>
            <form class="flex flex-col" method="POST" action="{{ route('admin') }}">
            @csrf
                <div class="mb-5 rounded bg-white">
                    <label class="block text-red-900 text-sm font-bold mb-2 ml-3" for="nip">NIP</label>
                    <input type="text" id="nip" name="nip" class="bg-white rounded w-full text-gray-700 focus:outline-none border-b-2 border-gray-300 focus:border-red-900 transition duration-300 px-3 py-1.5 text-sm" required>
                </div>
                <div class="mb-5 rounded bg-white">
                    <label class="block text-red-900 text-sm font-bold mb-2 ml-3" for="password">Kata Sandi</label>
                    <input type="password" id="password" name="password" class="bg-white rounded w-full text-gray-700 focus:outline-none border-b-2 border-gray-300 focus:border-red-900 transition duration-300 px-3 py-1.5 text-sm" required>
                </div>
                <button class="bg-red-900 hover:bg-red-800 text-white font-bold py-2 rounded shadow-md hover:shadow-lg transition duration-200 w-full" type="submit">Masuk</button>
            </form>
        </section>
    </main>
</body>
</html>
