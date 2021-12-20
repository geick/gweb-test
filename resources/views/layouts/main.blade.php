<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gweb-Probeaufgabe</title>

        <link href="/styles/main.css" rel="stylesheet" type="text/css"/>
        <script src="/js/main.js" defer></script>
    </head>
    <body>
            @yield('content')
    </body>
</html>
