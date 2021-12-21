<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gweb-Probeaufgabe</title>

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css"/>
        <link href="/css/datepicker.min.css" rel="stylesheet" type="text/css"/>

        <script src="/js/jquery.min.js" defer></script>
        <script src="/js/datepicker.min.js" defer></script>
        <script src="/js/app.js" defer></script>
    </head>
    <body>
        @yield('content')
    </body>
</html>
