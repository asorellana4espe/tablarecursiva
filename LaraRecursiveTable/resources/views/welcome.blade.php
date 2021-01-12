<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
        <h1>{{ $arbol->titulo }}</h1>
        @foreach ($hijos as $hijo)
            <a href="{{ route('arbol.detail', $hijo->id) }}">{{ $hijo->titulo }}</a><br>
        @endforeach
        <br><br>
        <form action="{{ route('arbol.store') }}" method="POST">
            @csrf
            <input name="parent_id" type="hidden" value="{{ $arbol->id }}">
            <input name="titulo" type="text">
            <button type="submit" >Crear</button>
        </form><br>
        <form action="{{ route('arbol.update', $arbol->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input name="titulo" type="text" value="{{ $arbol->titulo }}">
            <button type="submit" >Actualizar</button>
        </form><br>
        <form action="{{ route('arbol.delete', $arbol->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" >BORRAR!</button>
        </form><br><br>
        <h3><a href="{{ route('arbol.consumo') }}">Consumo de Api :)</a></h3>
        
    </body>
</html>
