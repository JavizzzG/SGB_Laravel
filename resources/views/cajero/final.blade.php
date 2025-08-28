<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FInal</title>
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
            <h1 class="font-bold text-6xl mb-30 mt-10 text-center">¡Retiro Exitoso!</h1>
                <h2 class="text-center text-3xl mb-20 font-bold">Por favor recoja su dinero</h2>
                <h3 class="text-center text-2xl mb-10 font-bold">Detalle del retiro:</h3>
                <ul class="text-center text-2xl mb-10 font-bold">
                    @foreach($informacion as $b => $cantidad)
                        <li>Fueron entregados {{ $cantidad }} billetes de {{ $b}}</li>
                    @endforeach
                </ul>
                <div class="w-12/12 flex flex-row justify-between">
                    <a href="{{ route('index')}}" class="text-3xl underline">Volver al inicio</a>
                    <a href="{{ route('cajero.retirar')}}" class="text-3xl underline">Hacer otro retiro</a>
                </div>
                    
        </div>
</body>
</html>