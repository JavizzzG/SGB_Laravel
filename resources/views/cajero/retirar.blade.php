<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retirar</title>
    @vite(['resources/css/app.css'])
</head>
<body class = "flex flex-col justify-center items-center h-screen w-full bg-global">
    <header class="w-full">
        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full text-center" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @elseif (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full text-center" role="alert">
            <strong class="font-bold">Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
    </header>
    <h1 class="text-7xl mb-10">Retirar</h1>
    <form method="POST" action="{{ route('retirar')}}" class="flex flex-col items-center">
        @csrf
        <h2 class="text-3xl mb-10 font-bold">Por favor seleccione la cantidad a retirar</h2>
        <input type="hidden" name="accion_registro" value="1">
        <select name="valor_registro" id="valor_registro" size="8" class="overflow-hidden border-0 outline-none">
            <option value="10000" class="option-select-retiro">10.000</option>
            <option value="50000" class="option-select-retiro">50.000</option>
            <option value="100000" class="option-select-retiro">100.000</option>
            <option value="250000" class="option-select-retiro">250.000</option>
            <option value="500000" class="option-select-retiro">500.000</option>
            <option value="1000000" class="option-select-retiro">1.000.000</option>
        </select>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded w-50 hover:bg-blue-600">Retirar</button>
</body>
</html>