<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrf: '{{ csrf_token() }}' }</script>

        <title>Dareebatech</title>

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="bg-grey-light" id="app">
            <app-calculator></app-calculator>
        </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
