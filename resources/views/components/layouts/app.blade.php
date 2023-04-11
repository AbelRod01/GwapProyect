<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title>
        <meta name="{{$title}}" content="{{$metaDescription ?? '' }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <title>Document</title>

    </head>
    <body style="font-family: 'Roboto Condensed', sans-serif;">
    <x-layouts.navigation/>
        <div class="container">

             @if (session('status'))
                <div class="alert alert-success">
                    {{session('status');}}
                </div>
            @endif
            @if (session('badstatus'))
                <div class="alert alert-danger">
                    {{session('badstatus');}}
                </div>
            @endif

        </div>

        <div class="container-fluid">
            <br/>
            {{ $slot }}
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
