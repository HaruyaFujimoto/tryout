<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @if (app('env') == 'production' || app('env') == 'test')
            <link rel="stylesheet" href="{{ secure_asset('/css/main.css') }}">
        @else
            <link rel="stylesheet" href="{{ asset('/css/main.css') }}">
        @endif
        @yield('css')
    </head>
<body>
<div class="white">
@include('templates.header')
<div class="wrapper">
    @yield('main')
    @include('templates.footer')
</div>
</div>
</body>
</html>
