<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.tailwindcss.min.css"></body>
</head>
<body class="bg-white text-gray-900">
    <main class="mx-auto ">
        @include('components.sidebar')
        @yield('content')
    </main>
    {{-- DataTable --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js" defer></script>

<script defer>
    $(document).ready(function () {
        var table = $('#myTable').DataTable();
    });
</script>

<div class="flex min-h-screen w-full top-0">

</div>

</body>
</html>
