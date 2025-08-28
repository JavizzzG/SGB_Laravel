<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo</title>
    @vite(['resources/css/app.css'])
</head>
<body class= "bg-global w-full">
    <header>
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
    <div class="flex flex-col justify-center items-center h-screen">
        <h1 class="font-bold text-6xl mb-10">Consultar Saldo</h1>
        <p class="text-2xl">Su saldo actual es: <strong>{{ $tarjeta->monto_tarjeta }}</strong></p>
    </div>
</body>
</html>