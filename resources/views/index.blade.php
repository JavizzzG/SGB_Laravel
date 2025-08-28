<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
        <div class= "">
            <h1 class="font-bold text-6xl mb-30 mt-10 text-center">Bienvenido a la página de inicio.</h1>
            <form method="POST" action="{{ route('getInfo')}}" class="flex flex-col items-center" >
                @csrf
                <h2 class="text-center text-3xl mb-20 font-bold">Por favor ingrese la tarjeta</h2>
                <input type="text" name="numero_tarjeta" placeholder="Numero de la tarjeta" class="border p-2 rounded mb-5 w-100">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded w-50 hover:bg-blue-600">Ingresar</button>
            </form>
        </div>
</body>
</html>