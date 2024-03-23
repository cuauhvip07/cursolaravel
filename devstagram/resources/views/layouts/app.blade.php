<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - @yield('titulo')</title>

        
    </head>
    <body >
        <nav>
            <a href="/">Inicio</a>
            <a href="/informacion">Informacion</a>
        </nav>
        <h1>@yield('body')</h1>
    </body>
</html>
