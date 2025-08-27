<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-4xl font-bold">Pruebas de billetes</h1>
    <ul>
        @foreach ($billetes as $billete)
            <li>Id: {{ $billete->id }} -> Valor: {{ $billete->valor_billete }} -> Cantidad: {{ $billete->cantidad_billete }}
                <form method="POST" action="{{ route('update', $billete->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="text" name="valor_billete" placeholder="Valor del billete">
                    <input type="text" name="cantidad_billete" placeholder="Cantidad del billete">
                    <button type="submit">Actualizar</button>
                </form>
            </li>
        @endforeach
    </ul>
    
</body>
</html>