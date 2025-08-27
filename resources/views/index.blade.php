<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <h1 class="font-bold">Inicio</h1>
    <p>Bienvenido a la página de inicio.</p>
    <a href="{{ route('pruebas') }}" class="text-blue-500">Ir a Pruebas</a>
    <form method="GET" action="{{ route('getTarjeta')}}">
        
    </form>
</body>
</html>